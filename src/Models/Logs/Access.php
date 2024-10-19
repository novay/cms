<?php

namespace Novay\CMS\Models\Logs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

use Novay\CMS\Models\User;

class Access extends Model
{
    protected $table = 'log_access';

    protected $fillable = [
        'user_id', 
        'ip_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function add($user)
    {
        $record = new self;
        $record->user_id = $user->id;
        $record->ip_address = Request::getClientIp();
        $record->save();

        return $record;
    }

    public static function getRecent($user)
    {
        $records = self::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();

        if (!count($records)) {
            return NULL;
        }

        $first = $records->first();

        return !$first->created_at->isToday() ? $first : $records->pop();
    }
}