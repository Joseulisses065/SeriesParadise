<?php

namespace App\Http\Controllers;

use App\Http\Requests\MidiaCreateRequest;
use App\Http\Requests\MidiaUpdateRequest;
use App\Models\Episode;
use App\Models\Midia;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MidiaController extends Controller
{
    public function index(){
        $midias = Midia::all();
        $series = [];
        $animes = [];

        foreach ($midias as $midia) {   
            if($midia->type == 'anime'){
                array_push($animes,$midia);

            }else{
                array_push($series,$midia);


            }
        }
        return view('midias.index')->with('animes',$animes)->with('series',$series)->with('midias',$midias);
        
    
    }
    public function create(){
        $midias = Midia::all();
        $msg = session('msg');
        return view('midias.create')->with('midias',$midias)->with('msg',$msg);
    }

    public function store(MidiaCreateRequest $request){

        DB::transaction(function() use ($request){
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



            
        });
        return to_route('midias.create')->with('msg','Salvo com sucesso');

        

    }

    public function edit(Midia $midia){
        return view('midias.edit')->with('midia',$midia);
    }
   public function update(MidiaUpdateRequest $reques,Midia $midia){
        $data = $reques->all();

        
        if($reques->file('banner')){
            $banner = $reques->file('banner');
            $data['banner'] = 'img/banner/'.$banner->hashName();
            $banner->move(public_path('img/banner/'),$data['banner']);
            unlink($midia->banner);

        }else{
            $data['banner'] = $midia->banner;
        }
        if($reques->file('img')){
            $image = $reques->file('img');
            $data['img'] = 'img/card/'.$image->hashName();
            $image->move(public_path('img/card/'),$data['img']);
            unlink($midia->img);
        }else{
            $data['img'] = $midia->img;
        }
    
        $midia->fill($data);
        $midia->save();
        $msg = "ok";
        return to_route('midias.create')->with("msg",$msg);

    }


    public function destroy(Midia $midia){
        $seasons = $midia->seasons()->with('episodes')->get();
        
        $baner = $seasons[0]->episodes[0]->banner;

        $midia->delete();

        unlink($midia->banner);
        unlink($midia->img);
        unlink($baner);
      
        
        return to_route('midias.create')
        ->with('mensagemSucesso', "Série '{$midia->title}' removida com sucesso");    
    
    }
    
}

