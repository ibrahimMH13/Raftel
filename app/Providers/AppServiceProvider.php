<?php

namespace App\Providers;

use App\Models\Channel;
use Illuminate\Support\Facades\Schema;
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
        //uncode DB
        Schema::defaultStringLength(191);

        //cache the channels in all views
        \View::composer('*',function ($view){

            $channels = \Cache::rememberForever('channels',function (){
                return Channel::all();
            });
            $view->with('channels',$channels);
        });



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
