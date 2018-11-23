<?php

namespace App\Providers;

use App\Persistence\Repositories\EloquentPartnerRepository;
use App\Persistence\Repositories\Interfaces\PartnerRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PartnerRepository::class, EloquentPartnerRepository::class);
    }
}
