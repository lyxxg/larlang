### 前言
依赖[lyxxxh/larmodel](https://github.com/lyxxg/lartran.git)翻译 

    根据表批量创建语言包
### 安装

     composer require lyxxxh/larlang
     添加服务提供者
     Xxh\LarTran\LarLangProvider::class
        
     添加门脸   
     'LarLang' => Xxh\LarTran\Facades\LarLang::class
 
     发布配置
     php artisan vendor:publish --provider="Xxh\LarModel\Xxh\LarLang\LarLangProvider"
        
     
### 使用
     php artisan lang:table:init comment  根据表注释创建语言包(没有注释就用字段)
     
     php artisan lang:table:init   根据表字段创建语言包
     默认使用百度翻译  翻译不是我理想的效果
     例如 id被翻译成 身份证件  所以建议根据表注释创建
     
     
     
      


