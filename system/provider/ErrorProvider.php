<?php
/*--------------------------------------------------------------------------
 | Software: [WillPHP framework]
 | Site: www.113344.com
 |--------------------------------------------------------------------------
 | Author: no-mind <24203741@qq.com>
 | WeChat: www113344
 | Copyright (c) 2020-2022, www.113344.com. All Rights Reserved.
 |-------------------------------------------------------------------------*/
namespace system\provider;
use willphp\framework\build\Provider;
class ErrorProvider extends Provider {
	public $defer = false; //延迟加载	
	public function boot() {		
		$whoops = new \Whoops\Run;
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
		$whoops->register();
	}
	public function register() {
		$this->app->single('Error', function () {
			return new \Whoops\Run;
		});
	}
}