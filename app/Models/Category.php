<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name'];

    public function mails()
    {
        return $this->belongsToMany(Mail::class, 'mail_category', 'category_id', 'mail_id');
    }
}
