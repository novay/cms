<?php

namespace Novay\CMS\Tables\Logs;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Splade;

use Novay\CMS\Models\Logs\Access;

class AccessTable extends AbstractTable
{
    protected $data, $route;

    public function __construct()
    {
        $this->data = new Access;

        $this->route = 'cms::settings.logs.access';
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
        $table->withGlobalSearch(columns: ['ip_address', 'user.name', 'user.email'])
            ->defaultSort('-created_at')
            ->column(key: 'created_at', label: ___('Date & time'), sortable: true, classes: 'w-44')
            ->column(key: 'ip_address', label: ___('IP address'), classes: 'w-44')
            ->column(key: 'user.name', label: ___('Name'))
            ->column(key: 'user.email', label: ___('Email'))
            ->export()
            ->paginate(10);
    }
}
