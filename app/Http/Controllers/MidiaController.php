<?php

namespace App\Http\Controllers;

use App\Http\Requests\MidiaCreateRequest;
use App\Http\Requests\MidiaUpdateRequest;
use App\Models\Midia;
use App\Repositories\EloquentMidiaRepository;
use App\Repositories\MidiaRepository;

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
        $midias = Midia::all();
        $msg = session('msg');
        return view('midias.create')->with('midias',$midias)->with('msg',$msg);
    }

    public function store(MidiaCreateRequest $request){
        
        $midia = $this->repository->add($request);
        return to_route('seasons.create',$midia->id)->with('msg',"O {$midia->type} {$midia->title} foi adicionado com sucesso");        

    }

    public function edit(Midia $midia){
        return view('midias.edit')->with('midia',$midia);
    }

    
   public function update(MidiaUpdateRequest $reques,Midia $midia){

        $midia = $this->repository->edt($reques, $midia);
        $msg = "O {$midia->type} {$midia->title} foi atualizado com sucesso" ;
        return to_route('midias.create')->with("msg",$msg);

    }


    public function destroy(Midia $midia){

        $midia->delete();

        unlink($midia->banner);
        unlink($midia->img);
      
        
        return to_route('midias.create')
        ->with('msg', "O {$midia->type} {$midia->title} removida com sucesso");    
    }


    

    
    
}