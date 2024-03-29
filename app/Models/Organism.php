<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organism extends Model
{
    use HasFactory;
    protected $table = 'organisms';
    protected $fillable = ['name', 'address', 'fax', 'tel'];
    public function organisms()
    {
        return $this->hasMany(Organism::class, 'id', 'organism_id');
    }

}
