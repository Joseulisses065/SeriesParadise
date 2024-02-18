<?php
namespace App\Repositories;

use App\Http\Requests\SeasonCreateRequest;
use App\Models\Midia;
use App\Models\Season;
use App\Repositories\Interfaces\SeasonRepository;
use Illuminate\Support\Facades\DB;

class EloquentSeasonRepository implements SeasonRepository{


    public function add(SeasonCreateRequest $request, Midia $midia)
    {
         return DB::transaction(function()use($request,$midia){
         
           $season = Season::create([
                'midia_id'=> $midia->id,
                'number' => $request->seasons,
             ]);

             return $season;

        });
    }
}