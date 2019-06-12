<?php

namespace  Xxh\LarLang\Services;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Config\Repository;
class LangService
{


    public function __construct(Repository $config,Filesystem $files)
    {

        $this->config = $config;
        $this->files = $files;
    }


    public function getTable()
    {

        $tables  = \DB::select('show tables;');
        $all = [];
        foreach ($tables as $table) {
            $table = array_values((array)$table);
            $table = $table[0];

            $all[] =$this->replaceTablePrefix($table);
        }
        return $all;
    }


    //替换表前缀
    public function replaceTablePrefix($table)
    {
        $databaseDirvie = $this->config['database']['default'];
        $pre = $this->config['database']['connections'][$databaseDirvie]['prefix'];
        return str_replace($pre,'',$table);
    }


    //获取表前缀
    public function getPre()
    {
        $databaseDirvie = $this->config['database']['default'];
        return $this->config['database']['connections'][$databaseDirvie]['prefix'];
    }



    //获取表字段
    public function getField($table)
    {
        $all = [];
        $table = $this->getPre().$table;
        $fields = \DB::select('desc ' . $table);
        foreach ($fields as $field)
            $all[] = $field->Field;
        return $all;
    }

    //获取表注释
    public function getComment($table)
    {
        $all = [];
        $table = $this->getPre().$table;
        $comments = \DB::select('SELECT COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_NAME ='
            .'"'.$table.'"');
        foreach ($comments as $comment)
              $all[] = $comment->COLUMN_COMMENT;
        return $all;
    }



    public function config()
    {
        return $this->config;
    }


    public function makeDirectory($path)
    {

        if (! $this->files->isDirectory(dirname($path))) {

            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }

        return $path;
    }



    public function putContent($path,$content)
    {
        $this->files->put($path, $content);
    }


    public function forData($content)
    {
       $content =  $this->array2string($content);
        return $content;
    }

    function array2string($arr) {
        $temp=[];
        foreach ($arr as $key=>$value){
            if(is_array($value)){
                $temp[] = array2string($value);
            }
            else{
                $temp[]=PHP_EOL.'  \''.$key.'\' => \''.$value.'\'';
            }
        }
        $temp_str = implode(',', $temp);
        $re=PHP_EOL.'['.$temp_str.PHP_EOL.']';
        $re ='<?php  '.PHP_EOL.PHP_EOL
            .'return'.$re.';';
        return $re;
    }



}
