<?php

namespace App\Providers;

use App\Repositories\EloquentMidiaRepository;
use App\Repositories\Interfaces\MidiaRepository as InterfacesMidiaRepository;
use Illuminate\Support\ServiceProvider;

class MidiaRepositoryProvider extends ServiceProvider
{
    public array $bindings = [InterfacesMidiaRepository::class => EloquentMidiaRepository::class];
    
}