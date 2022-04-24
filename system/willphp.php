<?php
/*--------------------------------------------------------------------------
 | Software: [WillPHP framework]
 | Site: www.113344.com
 |--------------------------------------------------------------------------
 | Author: no-mind <24203741@qq.com>
 | WeChat: www113344
 | Copyright (c) 2020-2022, www.113344.com. All Rights Reserved.
 |-------------------------------------------------------------------------*/
header('Content-type: text/html; charset=utf-8'); //设置编码
date_default_timezone_set('PRC'); //设置时区
version_compare(PHP_VERSION, '5.6.0', '<') and die('WillPHP requires PHP 5.6 or newer.'); //检测PHP版本
defined('WIPHP_URI') or die('Access Denied'); //检测框架常量
define('START_TIME', microtime(true)); //初始运行时间
define('START_MEMORY', memory_get_usage()); //初始内存开销
defined('APP_NAME') or define('APP_NAME', basename($_SERVER['SCRIPT_FILENAME'], '.php')); //应用名称(默认)
defined('THEME_ON') or define('THEME_ON', false); //多主题(默认关闭)
define('APP_PATH', WIPHP_URI.'/app/'.APP_NAME); //当前应用路径
defined('VIEW_PATH') or define('VIEW_PATH', APP_PATH.'/view'); //模板路径
defined('RUNTIME_PATH') or define('RUNTIME_PATH', WIPHP_URI.'/runtime/'.APP_NAME); //运行编译目录
defined('RUN_MODE') or define('RUN_MODE', 'http'); //运行模式(默认)
define('__ROOT__', rtrim(strtr(dirname($_SERVER['SCRIPT_NAME']), '\\', '/'), '/')); //网站根目录
define('__STATIC__', __ROOT__.'/static'); //静态资源目录
define('__UPLOAD__', __ROOT__.'/uploads'); //资源上传目录
require WIPHP_URI.'/system/autoload.php'; //引入自动加载
//require WIPHP_URI.'/system/helper.php'; //引入助手函数
if (file_exists(WIPHP_URI.'/app/common.php')) require WIPHP_URI.'/app/common.php'; //载入用户函数库
\willphp\framework\App::bootstrap(); //启动框架