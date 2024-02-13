<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Midia extends Model
{
    use HasFactory;
    protected $fillable = ['title','type','categori','description','img','banner'];

    public function seasons(){
        return $this->hasMany(Season::class, 'midia_id');
    }
}
