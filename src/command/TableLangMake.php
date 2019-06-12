<?php

namespace Xxh\LarLang\Command;
use Illuminate\Support\Facades\DB;
use Xxh\LarModel\Services\LarModelService;
use Illuminate\Console\Command;
use Xxh\LarLang\Services\LangService;

class TableLangMake extends Command
{


    //根据表字段初始化所有的语言
    protected $signature = 'lang:table {name} {type=field}';
    protected $description = '根据表的字段初始化所有的语言包';
    protected $instance;
    protected $fields = [];
    protected $table;
    protected $samples;
    protected $config;
    public function __construct(LangService $instance)
    {
        parent::__construct();
        $this->instance = $instance;
        $this->config  =$this->instance->config()['larlang'];
    }



    public function handle()
    {



        $type = $this->argument('type');
        $this->tableName = $this->argument('name');

        if( in_array($this->tableName,$this->config['forget_table'])) {
            $this->info($this->tableName.' 创建被忽略');
            return;
        }

        $this->fields = $this->instance->getField($this->tableName);
        $this->samples = $this->fields;
         if($type == 'comment')
        $this->samples = $this->instance->getComment($this->tableName);


        //批量创建语言包
        foreach ($this->instance->config()['larlang']['lang'] as $lang) {
            $this->createLang($lang);
         //   print_r($this->content);
            $this->info($this->tableName.'   '.$lang.'  create success.');
        }

    }






    public function createLang($lang)
    {
        $path = resource_path().'\\lang\\'.$lang.'\\'.$this->tableName.'.php';

        $this->instance->makeDirectory($path);

        $this->getContent($lang);
        $content = $this->instance->forData($this->content);

        $this->instance->putContent($path,$content);

    }



    protected $content = [];
    public function getContent($lang)
    {

        $this->content = [];
        foreach ($this->fields as $i=>$field) {
            if( in_array($this->fields[$i],$this->config['forget_field']))
                continue;

            $text = $this->samples[$i] == ""?
            $this->fields[$i]:$this->samples[$i];
            $this->content[$field] = resolve('lartran')->tran($text,$lang);

        }


    }





}
