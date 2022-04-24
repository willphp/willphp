<?php
/*--------------------------------------------------------------------------
 | Software: [WillPHP framework]
 | Site: www.113344.com
 |--------------------------------------------------------------------------
 | Author: no-mind <24203741@qq.com>
 | WeChat: www113344
 | Copyright (c) 2020-2022, www.113344.com. All Rights Reserved.
 |-------------------------------------------------------------------------*/
namespace system\middleware;
use willphp\config\Config;
use willphp\session\Session;
/**
 * 框架启动
 */
class Boot {	
	public function run($next){
		header('X-Powered-By:WillPHP');		
		if (Config::get('view.csrf_check') && ($csrf_token = Session::get('csrf_token', ''))) {
			header('HTTP_X_CSRF_TOKEN:'.$csrf_token); //添加csrf头 
		}	
        $next();
	}
}