<?php
return [
	//全局中间件	
	'global' => [			
		\system\middleware\Boot::class, //框架启动中间件			
	],
	//控制器中间件	
	'controller' => [
			'test' => [
					\system\middleware\controller\Test::class, //测试方法					
			],
			'auth' => [					
					\system\middleware\controller\Auth::class, //权限检测
			],
			'filter' => [
					\system\middleware\controller\Filter::class, //参数过滤
			],
	],
	'get_action' => '\willphp\route\Route::getAction', //获取当前的控制器方法
	//应用中间件	
	'web' => [
		'database_query' => [
				\system\middleware\web\TraceSql::class, //记录sql到trace
		],
		'database_execute' => [
				\system\middleware\web\TraceSql::class, //记录sql到trace
				\system\middleware\web\LogSql::class, //记录sql到log
				\system\middleware\web\DelCsrf::class, //重置表单令牌	 
		],
		'controller_start' => [	
				\system\middleware\web\Csrf::class, //表单令牌检测	 
		],
		'response_output' => [
				\system\middleware\web\TraceOutput::class, //添加trace输出
		],			
	],
];