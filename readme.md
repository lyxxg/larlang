[点击查看演示](https://gz.bcebos.com/v1/xxh-download/lang.gif )
### 安装

     composer require lyxxxh/larlang
     
     添加服务提供者
     Xxh\LarTran\LarTranProvider::class  //依赖此服务做翻译
     Xxh\LarLang\LarLangProvider::class  
        
     发布配置
     php artisan vendor:publish --provider="Xxh\LarLang\LarLangProvider"
    
### 配置说明

|  字段  | 说明  | 默认 
|  ---- | ----  | ---   |
| lang   | 要生成的语言包  | ['zh','en','cht']   |
| forget_table  | 忽略生成语言包的表  | 看配置   |
| forget_field | 忽略翻译的字段   | ['id']       |

     
## 使用

### 生成路径
  一切都生成在resource/lang
 
### 初始化所有表字段的语言包
     php artisan lang:table:init comment  根据表注释创建语言包(没有注释就用字段)
     
     php artisan lang:table:init   根据表字段创建语言包
     默认使用百度翻译  翻译不是我理想的效果
     例如 id被翻译成 身份证件  所以建议根据表注释创建
     
### 根据文件夹 (绝对路径)
    php artisan lang:folder E:\hello\tem 
         
### 根据文件 (绝对路径)
    php artisan lang:file E:\hello\tem\hello.php 
      

### 扯淡
    依赖于Xxh\LarTran\LarTranProvider做翻译
    有一个中文语言包，要中 英 繁 多语言等等
    再复制语言包，翻译，复制，翻译，复制。。。。
    蛋疼  用于解决这种蛋疼的情况


