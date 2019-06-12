<?php

namespace Xxh\LarLang;

use Illuminate\Support\ServiceProvider;
use Xxh\LarLang\Command\FileLangMakeCommand;
use Xxh\LarLang\Command\FolderLangMakeCommand;
use Xxh\LarLang\Command\TableLangMake;
use Xxh\LarModel\Command\TableInitCommand;

class LarLangProvider extends ServiceProvider
{

    public function register()
    {



        $this->mergeConfigFrom(
            __DIR__.'/config/larlang.php', 'larlang'
        );


        $this->app->singleton('larlang', function ($app) {
            return new LarLang($app['config']);
        });

    }



    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/larlang.php' => config_path('larlang.php'),
        ]);

        if ($this->app->runningInConsole()) {

            $this->commands([
                \Xxh\LarLang\Command\TableInitCommand::class,
                TableLangMake::class,
                FolderLangMakeCommand::class,
                FileLangMakeCommand::class,

            ]);


        }





    }


}
