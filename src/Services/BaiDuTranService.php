<?php
namespace Xxh\LarTran\Services;


use Xxh\LarTran\LarTreeInterface;

class BaiDuTranService implements LarTreeInterface

{

    protected $config,$ser;
    public function __construct($config)
    {

        $this->config = $config;
        $this->ser = new TranService();
    }


    public function tranResult($text,$lang)
    {

        $data = $this->tran($text,$lang);
        $data = json_decode($data);
       return $data->trans_result[0]->dst;
    }


    public function tran($text, $lang)
    {
    return   $this->ser->call($this->config['url'],$this->getParam($text,$lang));
    }


    public function getParam($text,$lang)
    {
        $args =[
                'q' => $text,
                'appid' => $this->config['APP_ID'],
                'salt' => rand(10000,99999),
                'from' => 'auto',
                'to' => $lang
        ];
     $args['sign'] = $this->buildSign($text,$args['salt']);
     return $args;
    }

    //加密
    public function buildSign($query,$salt)
    {

        $str = $this->config['APP_ID'] . $query . $salt . $this->config['SEC_KEY'];
        $ret = md5($str);
        return $ret;
    }






}
