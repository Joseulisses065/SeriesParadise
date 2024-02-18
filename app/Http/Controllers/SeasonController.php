<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeasonCreateRequest;
use App\Http\Requests\SeasonUpdateRequest;
use App\Models\Midia;
use App\Models\Season;
use App\Repositories\Interfaces\SeasonRepository;
use Illuminate\Support\Facades\DB;

class SeasonController extends Controller
{
    public function __construct(private SeasonRepository $repository)
    {
        
    }
    public function index(Midia $midia){
            $seasons = $midia->seasons()->with('episodes')->get();
            return view('seasons.index')->with('seasons',$seasons)->with('midia',$midia);
        
    }

    public function show(Midia $midia){
        $seasons = $midia->seasons()->with('episodes')->get();
        $msg = session('msg');
        return view('seasons.show')->with('seasons',$seasons)->with('midia',$midia)->with('msg',$msg);
    }

    public function create(Midia $midia){
        $msg = session('msg');
        return view('seasons.create')->with('midia',$midia)->with('msg',$msg);
    }

    public function store(SeasonCreateRequest $request,Midia $midia){

        $season = $this->repository->add($request,$midia);
     /*return DB::transaction(function()use($request,$midia){
         
           $season = Season::create([
                'midia_id'=> $midia->id,
                'number' => $request->seasons,
             ]);


        return to_route('episodes.create',$season->id)->with('msg','Temporada criada com sucesso! adicione um episodio');             
        });*/

        return to_route('episodes.create',$season->id)->with('msg','Temporada criada com sucesso! adicione um episodio');             

        
        

    }

    public function destroy(Season $season){

        $episodes = $season->episodes;

        foreach ($episodes as $episode) {
            unlink($episode->banner);
        }

        $season->delete();
        return to_route('seasons.show',$season->midia_id)->with('msg','A temporada foi removida com sucesso');
    }

    public function edit(Season $season){
        return view('seasons.edit')->with('season',$season);
    }

    public function update(SeasonUpdateRequest $request,Season $season){
        $season->fill($request->all());
        $season->save();
        return to_route('seasons.show',$season->midia_id)->with('msg','Temporada atualizada com sucesso');
    }
}