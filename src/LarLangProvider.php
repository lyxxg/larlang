<?php

namespace Xxh\LarLang;

use Illuminate\Support\ServiceProvider;
use Xxh\LarLang\Command\TableLangMake;
use Xxh\LarModel\Command\TableInitCommand;

class LarLangProvider extends ServiceProvider
{

    public function register()
    {



        $this->mergeConfigFrom(
            __DIR__.'/config/larlang.php', 'larlang'
        );

        //单例绑定
        $this->app->singleton('larlang', function ($app) {
            return new LarLang($app['config']);
        });

    }



    public function boot()
    {


        if ($this->app->runningInConsole()) {
            $this->commands([
                \Xxh\LarLang\Command\TableInitCommand::class,
                TableLangMake::class
            ]);


        }



    }


}
