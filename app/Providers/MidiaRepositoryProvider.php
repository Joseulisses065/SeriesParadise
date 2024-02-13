<?php

namespace App\Providers;

use App\Repositories\EloquentMidiaRepository;
use App\Repositories\MidiaRepository;
use Illuminate\Support\ServiceProvider;

class MidiaRepositoryProvider extends ServiceProvider
{
    public array $bindings = [MidiaRepository::class => EloquentMidiaRepository::class];
    
}