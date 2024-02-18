<?php

namespace App\Providers;

use App\Repositories\EloquentEpisodeRepository;
use App\Repositories\Interfaces\EpisodeRepository as InterfacesEpisodeRepository;
use Illuminate\Support\ServiceProvider;

class EpisodeRepositoryProvider extends ServiceProvider
{
   public array $bindings = [InterfacesEpisodeRepository::class => EloquentEpisodeRepository::class];
}
