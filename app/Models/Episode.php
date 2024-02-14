<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['number','title','banner','season_id','episode_link','description'];
   /* protected $casts = ['watched' => 'boolean'];*/

    public function season(){
        return $this->belongsTo(Season::class);
    }
}
