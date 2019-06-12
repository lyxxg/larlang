<?php

return [




    //默认使用百度
    'default' =>'baidu',

    //百度翻译
    'baidu' => [
        //api url
        'url' => 'http://api.fanyi.baidu.com/api/trans/vip/translate',

        'CURL_TIMEOUT' => 10,  //api超时时间
        'APP_ID' => '20190312000276335',   //APPID
        'SEC_KEY' => 'k2rHkYzda4Muvga2Sx5F' //SEC_KEY
    ],

    //有道翻译
    //参数解释： https://ai.youdao.com/docs/doc-trans-api.s#p04
    'youdao' => [

        'url' => 'http://openapi.youdao.com/api',
        'appKey' => '3714eba5469ff7ad',     //应用标识（应用ID）

    ]





];
