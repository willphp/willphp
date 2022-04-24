<?php
return [
		//ajax请求时验证失败显示的json数据模板
		'validate_ajax' => [
				'msg' => '验证失败',
				'code' => 400,
				'status' => 0,
				'url' => 'javascript:history.back(-1);'
		],
		/*
		 |--------------------------------------------------------------------------
		 | 验证失败处理方式
		 |--------------------------------------------------------------------------
		 | redirect 直接跳转,会分配$errors到前台
		 | show 直接显示错误信息,使用以下配置的模板文件显示错误处理
		 | default 返回false
		 */
		'dispose'  => 'show',
		//当dispose为show时使用以下定义的模板显示错误信息
		'template' => WIPHP_URI.'/system/view/validate.php',		
];