<?php

namespace App\Http\Controllers;

use App\Http\Requests\EpisodeCreateRequest;
use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EpisodeController extends Controller
{
    public function index(Episode $episode){
        return view('episodes.index')->with('episode',$episode);

        
    }
    public function update(Request $request, Episode $episode){
        $episode->watched = true;
        $episode->save();
        return to_route('episodes.index',$episode->id);
    }

    public function create(Season $season){
        return view('episodes.create')->with('episodes',$season->episodes)->with('season',$season);
    }

    public function store(EpisodeCreateRequest $request, Season $season){
        $episode = $request->All();
        $banner = $request->file('banner');
        $episode['banner'] = 'img/episodeBanner/'.$banner->hashName();
        $banner->move(public_path('img/episodeBanner/'),$episode['banner']);
        $episode['season_id'] = $season->id;
        Episode::create($episode);
        return to_route('midias.index');
    }

    
}
