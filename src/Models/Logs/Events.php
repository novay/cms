<?php

namespace Novay\CMS\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'log_events';

    protected $fillable = [
        'level',
        'message',
        'details'
    ];

    protected function casts(): array
    {
        return [
            'details' => 'json'
        ];
    }

    /**
     * add a log record
     * 
     * @param string $message Specifies the message text
     * @param string $level Specifies the logging level
     * @param array $details Specifies the error details string
     */
    public static function add($message, $level = 'info', $details = null)
    {
        if (!settings()->group('cms')->get('log_events', true)) {
            return;
        }

        $record = new self;
        $record->message = $message;
        $record->level = $level;

        if ($details !== null) {
            $record->details = (array) $details; // Pastikan details disimpan sebagai array
        }

        try {
            $record->save();
        } catch (\Exception $ex) {
            // Log error untuk debugging
            \Log::error('Failed to save log event: ' . $ex->getMessage());
        }

        return $record;
    }

    /**
     * getLevelAttribute will beautify the "level" value
     * 
     * @param  string $level
     * @return string
     */
    public function getLevelAttribute($level)
    {
        return ucfirst($level);
    }

    /**
     * getSummaryAttribute creates a shorter version of the message attribute,
     * extracts the exception message or limits by 100 characters.
     * 
     * @return string
     */
    public function getSummaryAttribute()
    {
        if (preg_match("/with message '(.+)' in/", $this->message, $match)) {
            return $match[1];
        }

        // Get first line of message
        preg_match('/^([^\n\r]+)/m', $this->message, $matches);

        return \Str::limit($matches[1] ?? '', 500);
    }
}