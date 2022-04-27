<?php
return [
		//设置显示trace的级别
		'trace_level' => [
				'base'  => '基本',				
				//'file'  => '文件', //文件加载栏目
				'sql'   => 'SQL',
				'debug' => '调试',
				'post'  => 'POST',
				'get'   => 'GET',
				//'cookie'=> 'COOKIE',
				//'session'=> 'SESSION',
				'error' => '错误',
		],
		//设置获取错误的方法
		'get_error' => '\willphp\error\Error::all', 
		//设置获取路由信息的方法
		'get_route' => '\willphp\route\Route::getRoute', 
		//设置获取请求变量的方法
		'get_request' => '\willphp\request\Request::all', 
		'request_type' => ['get', 'post', 'cookie', 'session'], //请求变量类型
];