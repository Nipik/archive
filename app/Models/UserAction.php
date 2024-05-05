<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action_type',
        'mail_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mail()
    {
        return $this->belongsTo(Mail::class);
    }
}
