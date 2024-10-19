<?php

namespace Novay\CMS\Tables\Logs;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Splade;

use Novay\CMS\Models\Logs\Events;

class EventTable extends AbstractTable
{
    protected $data, $route;

    public function __construct()
    {
        $this->data = new Events;

        $this->route = 'cms::settings.logs.events';
    }

    public function authorize(Request $request): bool
    {
        return true;
    }

    public function for(): mixed
    {
        return $this->data->query();
    }

    public function configure(SpladeTable $table): void
    {
        $table->withGlobalSearch(columns: ['id', 'message'])
            ->defaultSort('-created_at')
            ->column(key: 'id', label: ___('ID'), classes: 'w-20 align-top')
            ->column(key: 'created_at', label: ___('Date & time'), sortable: true, classes: 'w-44 align-top')
            ->column(key: 'message', label: ___('Message'))
            ->rowLink(function($item) {
                return route("{$this->route}.show", $item->id);
            })
            ->bulkAction(
                label: ___('Hapus Pilihan'), 
                after: function (array $selectedIds) {
                    $this->data->whereIn('id', $selectedIds)->delete();
                    Splade::toast(___("Beberapa berhasil dihapus."));
                },
                confirm: ___('Hapus Beberapa Data?'),
                confirmText: ___('Apa kamu yakin ingin menghapus data yang dipilih?'),
                confirmButton: ___('Hapus'),
                cancelButton: ___('Batalkan')
            )
            ->export()
            ->paginate(10);
    }
}
