<?php
namespace App\Repositories;

use App\Http\Requests\MidiaCreateRequest;

interface MidiaRepository{
    public function add(MidiaCreateRequest $request);
}