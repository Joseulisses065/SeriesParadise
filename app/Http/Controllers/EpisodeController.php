<?php

namespace App\Http\Controllers;

use App\Http\Requests\EpisodeCreateRequest;
use App\Http\Requests\EpisodeUpdateRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Repositories\Interfaces\EpisodeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EpisodeController extends Controller
{
    public function __construct(private EpisodeRepository $repository)
    {
        
    }
    public function index(Episode $episode){

        $msg = session('msg');
        return view('episodes.index')->with('episode',$episode)->with('msg',$msg);

        
    }
    public function update(EpisodeUpdateRequest $request, Episode $episode){
        $data = ($request->all());
        
        if($request->file('banner')){
            $banner = $request->file('banner');
            $data['banner'] = 'img/episodeBanner/'.$banner->hashName();
            $banner->move(public_path('img/episodeBanner/'),$data['banner']);
            unlink($episode->banner);



        }else{
            echo("não subiu");
            $data['banner'] = $episode->banner;
        }       
        $episode->fill($data);
        $episode->save();
        return to_route('episodes.index',$episode->id)->with('msg','Episodio atualizado com sucesso');

       
    }

    public function create(Season $season){
        $msg = session('msg');
        return view('episodes.create')->with('episodes',$season->episodes)->with('season',$season)->with('msg',$msg);
    }

    public function store(EpisodeCreateRequest $request, Season $season){
        $episode = $this->repository->add($request,$season);
        return to_route('seasons.show',$season->midia_id)->with('msg','Episodio criado com sucesso');
    }

    public function destroy(Episode $episode){
    unlink($episode->banner);
    $episode->delete();
    $season = $episode->season;
    return to_route('seasons.show',$season->midia_id)->with('msg','Episodio removido com sucesso');
}

    public function edit(Episode $episode){
        return view('episodes.edit')->with('episode',$episode);
    }

    public function view(Request $request, Episode $episode){
        $episode->watched = true;
        $episode->save();
        return to_route('episodes.index',$episode->id);
    }

    
}
