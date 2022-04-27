<?php
/*--------------------------------------------------------------------------
 | Software: [WillPHP framework]
 | Site: www.113344.com
 |--------------------------------------------------------------------------
 | Author: no-mind <24203741@qq.com>
 | WeChat: www113344
 | Copyright (c) 2020-2022, www.113344.com. All Rights Reserved.
 |-------------------------------------------------------------------------*/
namespace system\middleware\web;
use willphp\config\Config;
use willphp\session\Session;
/**
 * 添加Trace输出
 */
class DelCsrf {
	public function run($next, $output = ''){
		if (Config::get('view.csrf_check') && IS_POST) {		
			Session::set('csrf_token', null);		
		}
		$next();
	}
}