<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $table = 'mail';

    protected $fillable = [
        'user_id',
        'organism_id',
        'subject',
        'status',
        'reception_date',
        'dispatch_date',
        'category_id',
    ];

    public function organism()
    {
        return $this->belongsTo(Organism::class, 'organism_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'mail_category', 'mail_id', 'category_id');
    }

    public function actions()
    {
        return $this->hasMany(MailAction::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_mail', 'mail_id', 'user_id')->withTimestamps();
    }
}
