<?php

namespace Xxh\LarLang\Command;
use Illuminate\Support\Facades\DB;
use Xxh\LarModel\Services\LarModelService;
use Illuminate\Console\Command;
use Xxh\LarLang\Services\LangService;

class FileLangMakeCommand extends Command
{


    protected $signature = 'lang:file {path}';
    protected $fields,$fileName;
    public function __construct(LangService $instance)
    {

        parent::__construct();
        $this->instance = $instance;

    }

    public function handle()
    {
        $path = $this->argument('path');


        $file = require_once $path;
        $this->fields = array_keys($file);


        $this->fileName = $this->instance->files->basename($path);

        foreach ($this->instance->config()['larlang']['lang'] as $lang) {
            $this->createLang($lang);
            $this->info($this->fileName.'   '.$lang.'  create success.');
        }

    }


    public function createLang($lang)
    {

        
        $path = resource_path().'\\lang\\'.$lang.'\\'. $this->fileName.'.php';
        $this->instance->makeDirectory($path);

        $this->getContent($lang);

        $content = $this->instance->forData($this->content);
        $this->instance->putContent($path,$content);
    }



    protected $content = [];
    public function getContent($lang)
    {

        $this->content = [];

        foreach ($this->fields as $i => $field) {
            $this->content[$field] = resolve('lartran')->tran($field, $lang);
        }



    }







}
