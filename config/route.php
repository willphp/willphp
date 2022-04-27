<?php
return [
		'default_controller' => 'index', //默认控制器
		'default_method' => 'index', //默认方法	
		'url_suffix' => '.html', //url后缀
		'del_suffix' => [], //路由自动去除后缀列表
		'deny_app_list' => ['common'], //路由禁止访问应用app/common
		'app_dir' => WIPHP_URI.'/app', //应用目录
		'pathinfo_var' => 's', //pathinfo的$_GET变量
		'route_path' => WIPHP_URI.'/route', //路由配置路径	
		//过滤处理
		'_html' => 'content', //包含content的表单字段
		'filter_req' => [
			'_' => 'remove_xss', //_html处理
			'*' => 'clear_html', //其他所有字段处理
			'id' => 'intval',
			'p' => 'intval',
		],
];