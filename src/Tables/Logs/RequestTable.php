<?php

namespace Novay\CMS\Tables\Logs;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

use Novay\CMS\Models\Logs\Requests;

class RequestTable extends AbstractTable
{
    protected $data, $route;

    public function __construct()
    {
        $this->data = new Requests;

        $this->route = 'cms::settings.logs.requests';
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
        $table->withGlobalSearch(columns: ['status_code', 'url'])
            ->defaultSort('-created_at')
            ->column(key: 'status_code', label: ___('Status'), sortable: true, classes: 'w-20')
            ->column(key: 'url', label: ___('URL'))
            ->column(key: 'count', label: ___('Count'), sortable: true, alignment: 'center', classes: 'w-28')
            ->rowLink(function($item) { 
                return route("{$this->route}.show", $item->id);
            })
            ->export()
            ->paginate(10);
    }
}
