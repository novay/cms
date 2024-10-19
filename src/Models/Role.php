<?php

namespace Novay\CMS\Models;

use Spatie\Permission\Models\Role as SpatieRole;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Role extends SpatieRole
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('cms')
            ->logOnly(['name', 'guard_name', 'description']);
    }
}