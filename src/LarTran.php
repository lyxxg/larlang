<?php

namespace Xxh\LarTran;

use Illuminate\Config\Repository;
use Xxh\LarTran\Services\BaiDuTranService;

class LarTran implements LarTreeInterface
{



    protected $config;
    protected $instance;
    public function __construct(Repository $config)
    {
        $this->config = $config;
        $this->instance = $this->setInstance();
    }



    //option 1则只要结果  0返回所有
    public function tran($text, $lang,$option=1)
    {
        if($option)
        return
            $this->instance->tranResult($text,$lang);

        else
        return
            $this->instance->tran($text,$lang);

    }


    //设置是那个翻译的
    public function setInstance($sin = null)
    {
        if( is_null($sin))
        $sin = $this->config['lartran']['default'];

        if($sin == 'baidu')
        return new BaiDuTranService($this->config['lartran'][$sin]);

    }





}
