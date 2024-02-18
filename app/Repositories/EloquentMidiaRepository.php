<?php
namespace App\Repositories;

use App\Http\Requests\MidiaCreateRequest;
use App\Http\Requests\MidiaUpdateRequest;
use App\Models\Episode;
use App\Models\Midia;
use App\Models\Season;
use App\Repositories\Interfaces\MidiaRepository as InterfacesMidiaRepository;
use Illuminate\Support\Facades\DB;

class EloquentMidiaRepository implements InterfacesMidiaRepository{

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
            
            return $midia;

            
        });

    }

    public function edt(MidiaUpdateRequest $reques, Midia $midia){
        return DB::transaction(function()use($reques,$midia){
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
            return $midia;
        });
    }
}