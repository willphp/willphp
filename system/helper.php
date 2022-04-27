<?php
if (!function_exists('dd')) {
	/**
	 * 变量输出并结束
	 * @param mixed $vars 要输出的变量
	 * @return void
	 */
	function dd(...$vars) {
		dump(...$vars);
		exit();
	}
}
if (!function_exists('site')) {
	/**
	 * 获取和设置网站配置参数
	 * @param string	$name  参数名
	 * @param mixed		$value 参数值
	 * @return mixed
	 */
	function site($name = '', $value = '') {
		if ($name == '') {
			return \willphp\config\Config::get('site');
		}
		if ($value == '') {
			return (0 === strpos($name, '?'))? \willphp\config\Config::has('site.'.substr($name, 1)) : \willphp\config\Config::get('site.'.$name);
		}
		return \willphp\config\Config::set('site.'.$name, $value);
	}
}
if (!function_exists('model')) {
	/**
	 * 获取数据模型类
	 * @param string $name 要操作的模型名称
	 * @return object 返回数据模型对象
	 */
	function model($name) {
		$name = trim($name, '.');
		$app = APP_NAME;
		if (false !== strpos($name, '.')) {
			list($app, $name) = explode('.', $name);
		}
		$class = '\app\\'.$app.'\\model\\'.ucfirst($name);	
		return app($class, true);
	}
}
if (!function_exists('widget')) {
	/**
	 * 获取数据模型类
	 * @param string $name 要操作的模型名称
	 * @return object 返回数据模型对象
	 */
	function widget($name) {
		$name = trim($name, '.');
		$app = APP_NAME;
		if (false !== strpos($name, '.')) {
			list($app, $name) = explode('.', $name);
		}
		$class = '\app\\'.$app.'\\widget\\'.ucfirst($name);
		return app($class, true);
	}
}