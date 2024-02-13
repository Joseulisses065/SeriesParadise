<?php
namespace App\Repositories;

use App\Http\Requests\MidiaCreateRequest;
use App\Models\Episode;
use App\Models\Midia;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

class EloquentMidiaRepository implements MidiaRepository{

    public function add(MidiaCreateRequest $request){

      return DB::transaction(function() use ($request){
            $data = $request->all();

            $banner = $request->file('banner');
            $data['banner'] = 'img/banner/'.$banner->hashName();
            $banner->move(public_path('img/banner/'),$data['banner']);


            $image = $request->file('img');
            $data['img'] = 'img/card/'.$image->hashName();
            $image->move(public_path('img/card/'),$data['img']);

    
            $midia = Midia::create($data);
            $seasons = [];
            for ($i=1; $i <= $request->seasons; $i++) { 
                $seasons[]=[
                    'midia_id' => $midia->id,
                    'number' => $i,
                ];
            }

           
            Season::insert($seasons);
            $episodes = [];


             
            $episodeBanner = $request->file('episodeBanner');
            $episodeBannerPath = 'img/episodeBanner/'.$episodeBanner->hashName();
            $episodeBanner->move(public_path('img/episodeBanner/'),$episodeBannerPath);

            foreach ($midia->seasons as $season) {

                
                for ($j=0; $j <= $data['episodes']; $j++) { 

                    $episodes[]=
                    [
                        'season_id' => $season->id,
                        'number' => $j,
                        'banner' => $episodeBannerPath,
                    ];
                }
            }
            Episode::insert($episodes);

            return $midia;

            
        });

    }

}