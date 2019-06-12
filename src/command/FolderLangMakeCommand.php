<?php

namespace Xxh\LarLang\Command;
use Illuminate\Support\Facades\DB;
use Xxh\LarModel\Services\LarModelService;
use Illuminate\Console\Command;
use Xxh\LarLang\Services\LangService;

class FolderLangMakeCommand extends Command
{



    protected $signature = 'lang:folder {path}';


    public function __construct(LangService $instance)
    {
        parent::__construct();
        $this->instance = $instance;
    }

    public function handle()
    {
       $path = $this->argument('path');
       $paths = $this->instance->getFoldFiles($path);


        foreach ($paths as $path) {


            $this->call('lang:file', [
                'path'=> $path,
            ]);

        }

    }








}
