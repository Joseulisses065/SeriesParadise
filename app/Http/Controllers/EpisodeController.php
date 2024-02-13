<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

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

    
}
