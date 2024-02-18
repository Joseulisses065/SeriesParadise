<?php
namespace App\Repositories\Interfaces;

use App\Http\Requests\EpisodeCreateRequest;
use App\Models\Season;

interface EpisodeRepository{
    public function add(EpisodeCreateRequest $request, Season $season);
}

