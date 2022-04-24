<?php
return [
		'default_controller' => 'index',
		'default_method' => 'index',	
		'url_suffix' => '.html',
		'del_suffix' => [], //路由自动去除后缀列表
		'deny_app_list' => ['common'], //路由禁止访问应用app/common
		'app_dir' => WIPHP_URI.'/app', //应用目录
		'pathinfo_var' => 's', //pathinfo的$_GET变量
		'route_path' => WIPHP_URI.'/route', //路由配置路径
];