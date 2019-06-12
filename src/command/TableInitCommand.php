<?php

namespace Xxh\LarLang\Command;
use Illuminate\Support\Facades\DB;
use Xxh\LarModel\Services\LarModelService;
use Illuminate\Console\Command;
use Xxh\LarLang\Services\LangService;

class TableInitCommand extends Command
{


    //根据表字段初始化所有的语言
    protected $signature = 'lang:table:init {type=field}';
    protected $description = '根据表字段初始化所有的语言';
    protected $instance;

    public function __construct(LangService $instance)
    {
        parent::__construct();
        $this->instance = $instance;
    }



    public function handle()
    {
        $type = $this->argument('type');
        $tables = $this->instance->getTable();
        foreach ($tables as $table) {

            $this->call('lang:table', [
                'name'=> $table,
                'type' => $type
            ]);

        }

    }


    public function getParam($table)
    {

    }








}
