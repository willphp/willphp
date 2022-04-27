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
use willphp\log\Log;
/**
 * 记录sql到log
 */
class LogSql {	
	public function run($next, $sql = ''){
		if (Config::get('app.debug') && Config::get('app.trace')) {				
			Log::record($sql, 'sql');
		}
        $next();
	}
}