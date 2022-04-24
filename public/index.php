<?php
/*--------------------------------------------------------------------------
 | Software: [WillPHP framework]
 | Site: www.113344.com
 |--------------------------------------------------------------------------
 | Author: no-mind <24203741@qq.com>
 | WeChat: www113344
 | Copyright (c) 2020-2022, www.113344.com. All Rights Reserved.
 |-------------------------------------------------------------------------*/
// 应用入口文件 
define('WIPHP_URI', strtr(realpath(__DIR__.'/../'),'\\', '/')); //项目根目录
define('APP_NAME', 'home'); //应用名称(app/应用名称)
//define('THEME_ON', true); //多主题：false=>关闭(默认)，true=>开启
//define('VIEW_PATH', WIPHP_URI.'/template'); //定义模板目录
require WIPHP_URI.'/system/willphp.php'; //载入框架