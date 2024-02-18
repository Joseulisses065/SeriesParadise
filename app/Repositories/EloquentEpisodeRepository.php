<?php
namespace App\Repositories;

use App\Http\Requests\EpisodeCreateRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Repositories\Interfaces\EpisodeRepository;
use Illuminate\Support\Facades\DB;

class EloquentEpisodeRepository implements EpisodeRepository{


    public function add(EpisodeCreateRequest $request, Season $season){
        return DB::transaction(function() use($request,$season){
            $episode = $request->All();
            $banner = $request->file('banner');
            $episode['banner'] = 'img/episodeBanner/'.$banner->hashName();
            $banner->move(public_path('img/episodeBanner/'),$episode['banner']);
            $episode['season_id'] = $season->id;
            return Episode::create($episode);
        });
        
    }
}