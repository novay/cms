<?php

namespace Novay\CMS\Models\Logs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Requests extends Model
{
    protected $table = 'log_requests';

    protected $fillable = [
        'status_code', 
        'url', 
        'referer', 
        'count'
    ];

    protected function casts(): array
    {
        return [
            'referer' => 'json'
        ];
    }

    /**
     * Creates a log record
     * 
     * @param int $statusCode
     */
    public static function add($statusCode = 404)
    {
        if (!settings()->group('cms')->get('log_requests', true)) {
            return;
        }

        $record = self::firstOrNew([
            'url' => substr(Request::fullUrl(), 0, 191),
            'status_code' => $statusCode,
        ]);

        if ($referer = Request::header('referer')) {
            $referers = (array) $record->referer ?: [];
            $referers[] = $referer;
            $record->referer = $referers;
        }

        if (!$record->exists) {
            $record->count = 1;
            $record->save();
        }
        else {
            $record->increment('count');
        }

        return $record;
    }
}