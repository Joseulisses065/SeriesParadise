<?php

namespace App\Providers;

use App\Repositories\EloquentSeasonRepository;
use App\Repositories\Interfaces\SeasonRepository as InterfacesSeasonRepository;
use Illuminate\Support\ServiceProvider;

class SeasonRepositoryProvider extends ServiceProvider
{
    public array $bindings = [InterfacesSeasonRepository::class => EloquentSeasonRepository::class];
}
