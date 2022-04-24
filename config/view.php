<?php
return [
		'prefix' => '.html', //模板文件后缀
		'compile_dir' => RUNTIME_PATH.'/view/compile', //模板编译路径
		'view_cache' => false, //是否开启模板缓存
		'cache_time' => 0, //缓存时间(0,永久)
		'cache_dir' => RUNTIME_PATH.'/view/cache', //模板缓存路径
		'csrf_check' => true, //是否开启csrf表单令牌验证
];