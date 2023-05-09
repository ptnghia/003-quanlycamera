<?php

namespace App\Providers;

use App\Models\Identified_cates;
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
        $data_nhandien = Identified_cates::all();
        view()->share('nhandien', $data_nhandien);
    }
}
