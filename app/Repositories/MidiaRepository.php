<?php
namespace App\Repositories;

use App\Http\Requests\MidiaCreateRequest;
use App\Http\Requests\MidiaUpdateRequest;
use App\Models\Midia;

interface MidiaRepository{
    public function add(MidiaCreateRequest $request);

    public function edt(MidiaUpdateRequest $request, Midia $midia);
}