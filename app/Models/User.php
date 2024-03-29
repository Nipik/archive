<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'lastName',
        'email',
        'password',
        'image',
        'role',
        'is_active',
        'last_login',
        'has_unread_notification',
    ];

    protected $hidden = [
        'password',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function updateLastLogin()
    {
        $this->update(['last_login' => now()]);
        logger('Last login updated for user: ' . $this->name);
    }

    public function loginHistory()
    {
        return $this->hasMany(LoginHistory::class);
    }

    public function mails()
    {
        return $this->belongsToMany(Mail::class, 'user_mail', 'user_id', 'mail_id')->withTimestamps();
    }
    public function isAdmin()
    {
        return strtolower($this->role) === 'admin';
    }

    protected $dates = [
        'reception_date',
        'dispatch_date',
    ];

    public function getReceptionDateAttribute($value)
    {
        return $this->attributes['reception_date']->format('Y-m-d');
    }

    public function getDispatchDateAttribute($value)
    {
        return $this->attributes['dispatch_date']->format('Y-m-d');
    }

}
