<?php

namespace App\Providers;

use App\Listing;
use App\RexRepository\CRMInterface;
use App\RexRepository\EagleRepository;
use App\RexRepository\RexRepository;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CRMInterface::class, RexRepository::class);
    }
}
