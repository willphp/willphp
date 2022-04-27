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
use willphp\request\Request;
use willphp\error\Error;
/**
 * 表单令牌验证
 */
class Csrf {
	protected $token; //表单令牌	
	public function run($next){
		$this->setServerToken(); //&& IS_POST
		$status = Config::get('view.csrf_check') && IS_POST && ($_SERVER['HTTP_HOST'] == Request::getHost(__HISTORY__));	
		if ($status && $this->getClientToken() != $this->token) {			
			Error::_403();						
		}
		$next();
	}	
	/**
	 * 设置服务令牌
	 */
	protected function setServerToken() {
		$token = Session::get('csrf_token');
		if (Config::get('view.csrf_check') && !$token) {
			$ip = Request::ip();
			$token = md5($ip.microtime(true));
			Session::set('csrf_token', $token);		
		}
		$this->token = $token;
	}
	/**
	 * 获取前端令牌
	 * @return string
	 */
	protected function getClientToken() {		
		$token = Request::getHeader('X-CSRF-TOKEN');	
		return $token? $token : Request::post('csrf_token');
	}
}