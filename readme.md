### 前言
    未开发完成，但能正常使用百度翻译。
    有道翻译接口正在开发中

### 安装

     composer require lyxxxh/larmodel
     添加服务提供者
     Xxh\LarTran\LarTranProvider::class
        
     添加门脸   
     'LarTran' => Xxh\LarTran\Facades\LarTran::class
 
     发布配置
     php artisan vendor:publish --provider="Xxh\LarModel\Xxh\LarTran\LarTranProvider"
        
     默认使用百度翻译
     appid和key 自行替换（默认是用我的）
     
### 使用
     
### LarTran::tran(要转换的文字,要转换的语言)      
    $res = LarTran::tran('世界','en');    
    echo $res;
    //World
    
    $res = LarTran::tran('tel','zh');
    echo $res;
    //电话    



