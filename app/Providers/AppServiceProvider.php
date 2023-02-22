<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< Updated upstream
//use Nette\Utils\Paginator;
=======
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Schema;

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
        //
<<<<<<< Updated upstream
       // Paginator::useBootstrap();
=======
>>>>>>> Stashed changes
        Schema::defaultStringLength(191);
    }
}
