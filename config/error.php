<?php
return [
	'error_tpl' => WIPHP_URI.'/system/view/error.php', //系统错误自定义页面(关闭debug后)
	//ajax请求时错误后显示的json数据模板
	'error_ajax' => [
			'msg' => '系统错误，请稍候访问', //关闭debug后显示的默认信息
			'code' => 400, 
			'status' => 0, 
			'url' => 'javascript:history.back(-1);'
	],		
	'show_notice' => true, //是否显示提示错误
];