<?php
namespace app\home\controller;
class IndexController {	
	//中间件
	protected $middleware = [
			'filter', //过滤中间件(全部方法)
			'auth' => ['except' => ['index','login'] ], //权限验证中间件(除index,login外)
			'test' => ['only' => ['test']], //测试中间件(只test方法)
	];	 
	//前置操作
	public function _before($method) {
		if ($method == 'index') {
			trace($method.'-执行前置操作');
		}		
	}
	//后置操作
	public function _after($method) {
		if ($method == 'test') {
			trace($method.'-执行后置操作');
		}
	}
	//首页
	public function index() {	
		return view();
	}	
	//登录
	public function login() {
		return view();
	}	
	//测试
	public function test() {
		return view();
	}

}