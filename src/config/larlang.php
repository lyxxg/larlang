<?php

return [



    //要翻译的语言包
    //字段解释看 http://api.fanyi.baidu.com/api/trans/product/apidoc
    'lang' =>[
        'zh','en','cht'

    ],

    //要忽略创建语言包的表
    'forget_table' =>[
        'admin_menu','admin_operation_log','admin_permissions','admin_role_menu',
        'admin_role_permissions','admin_role_users','admin_roles','admin_user_permissions',
        'admin_users','migrations','password_resets','password_resets'

    ],

    //要忽略的翻译
    'forget_field' =>[
        'id',

    ],



];
