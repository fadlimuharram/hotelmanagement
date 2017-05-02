<?php

namespace App\Providers;

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
      $datapic = [
        'dirprofile' => 'storage/profilepic/',
        'diricon'    => 'storage/iconpic/'
      ];
      view()->share('datapic',$datapic);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
