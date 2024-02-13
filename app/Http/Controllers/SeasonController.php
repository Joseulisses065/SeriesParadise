<?php

namespace App\Http\Controllers;

use App\Models\Midia;
use Illuminate\Http\Request;

class SeasonController extends Controller
{

    public function index(Midia $midia){
            $seasons = $midia->seasons()->with('episodes')->get();
            return view('seasons.index')->with('seasons',$seasons)->with('midia',$midia);
        
    }
}