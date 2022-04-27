<?php
/*--------------------------------------------------------------------------
 | Software: [WillPHP framework]
 | Site: www.113344.com
 |--------------------------------------------------------------------------
 | Author: no-mind <24203741@qq.com>
 | WeChat: www113344
 | Copyright (c) 2020-2022, www.113344.com. All Rights Reserved.
 |-------------------------------------------------------------------------*/
namespace system\middleware\controller;
/**
 * 权限验证
 */
class Auth {	
	public function run($next){	
		trace('执行权限验证中件间');
        $next();
	}
}