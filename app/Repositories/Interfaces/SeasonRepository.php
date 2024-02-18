<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\SeasonCreateRequest;
use App\Models\Midia;

interface SeasonRepository{

public function add(SeasonCreateRequest $request, Midia $midia);

}