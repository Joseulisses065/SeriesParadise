<?php

namespace App\Http\Controllers;

use App\Http\Requests\MidiaCreateRequest;
use App\Http\Requests\MidiaUpdateRequest;
use App\Models\Midia;
use App\Repositories\EloquentMidiaRepository;
use App\Repositories\Interfaces\MidiaRepository;

class MidiaController extends Controller
{
    public function __construct(private MidiaRepository $repository)
    {

        
    }
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
        $msg = session('msg');
        return view('midias.create')->with('msg',$msg);
    }

    public function store(MidiaCreateRequest $request){
        
        $midia = $this->repository->add($request);
        return to_route('dashboard')->with('msg',"O {$midia->type} {$midia->title} foi adicionado com sucesso, criem uma temporada");        

    }

    public function edit(Midia $midia){
        return view('midias.edit')->with('midia',$midia);
    }

   
    
   public function update(MidiaUpdateRequest $reques,Midia $midia){

        $midia = $this->repository->edt($reques, $midia);
        return to_route('dashboard')->with("msg","O {$midia->type} {$midia->title} foi atualizado com sucesso");

    }


    public function destroy(Midia $midia){

        
        
        $midia->delete();
        $episodes = $midia->seasons()->with('episodes')->get();
        foreach ($episodes as $epsode) {
            unlink($epsode->episodes[0]['banner']);
        }
        unlink($midia->banner);
        unlink($midia->img);
      
        
        return to_route('dashboard')
        ->with('msg', "O {$midia->type} {$midia->title} removida com sucesso");    
    }


    

    
    
}