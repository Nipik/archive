<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Carbon;

class LoginHistory extends Model
{
    use HasFactory;

    protected $table = 'login_history';

    protected $fillable = [
        'user_id',
        'device_type',
        'connection_id',
        'login_time',
        'ip_address',
        'user_agent',
        'session_token',
        'login_result',
        'login_method',
        'auth_provider',
        'device_os',
        'location',
        'session_duration',
        'security_flag',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $dates = ['login_time'];

    public function getLoginTimeAttribute($value)
    {
        // Vérifier si $value est déjà un objet Carbon ou un objet DateTime
        if ($value instanceof Carbon || $value instanceof \DateTime) {
            return $value->format('Y-m-d H:i:s');
        }

        return $value;
    }
}
