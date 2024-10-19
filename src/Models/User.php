<?php

namespace Novay\CMS\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

use Novay\CMS\Traits\HasProfilePhoto;
use Novay\CMS\Traits\RandomIds;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable # implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use HasApiTokens, Searchable;

    use HasProfilePhoto, RandomIds;
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'photo',
        'name',
        'email',
        'password',
        'phone',
        'plain',
        'address',
        'last_login_ip',
        'last_login_at'
    ];

    protected $hidden = [
        'password',
        'plain',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'email_verified_at' => 'datetime',
            'deleted_at' => 'datetime',
            'last_login_at' => 'datetime',
        ];
    }

    public function toSearchableArray()
    {
        return [
            'id' => (int) $this->id,
            'name' => $this->name, 
            'email' => $this->email
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('cms')
            ->logOnly(['photo', 'name', 'email', 'plain', 'phone']);
    }
}
