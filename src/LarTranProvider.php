<?php

namespace Xxh\LarTran;

use Illuminate\Support\ServiceProvider;

class LarTranProvider extends ServiceProvider
{

    public function register()
    {



        $this->mergeConfigFrom(
            __DIR__.'/config/lartran.php', 'lartran'
        );

        //单例绑定
        $this->app->singleton('lartran', function ($app) {
            return new LarTran($app['config']);
        });


    }



    public function boot()
    {

    }


}
