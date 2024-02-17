<?php

namespace App\Http\Controllers;

use App\Models\Midia;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeasonController extends Controller
{

    public function index(Midia $midia){
            $seasons = $midia->seasons()->with('episodes')->get();
            return view('seasons.index')->with('seasons',$seasons)->with('midia',$midia);
        
    }

    public function show(Midia $midia){
        $seasons = $midia->seasons()->with('episodes')->get();
        return view('seasons.show')->with('seasons',$seasons)->with('midia',$midia);
    }

    public function create(Midia $midia){
        return view('seasons.create')->with('midia',$midia);
    }

    public function store(Request $request,Midia $midia){
      return DB::transaction(function()use($request,$midia){
         
           $season = Season::create([
                'midia_id'=> $midia->id,
                'number' => $request->seasons,
             ]);


        return to_route('episodes.create',$season->id)->with('msg','season criada com sucesso');             
        });
        
        

    }

    public function destroy(Season $season){

        $episodes = $season->episodes;

        foreach ($episodes as $episode) {
            unlink($episode->banner);
        }

        $season->delete();
        return to_route('seasons.show',$season->midia_id);
    }

    public function edit(Season $season){
        return view('seasons.edit')->with('season',$season);
    }

    public function update(Request $request,Season $season){
        $season->fill($request->all());
        $season->save();
        return to_route('seasons.show',$season->midia_id);
    }
}