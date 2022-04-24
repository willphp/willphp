<?php
return [
	'driver' => 'file', //默认驱动
	'name' => 'willphpid', //名称前缀
	'domain' => '', //有效域名
	'expire'=> 86400 * 10, //过期时间
	'file' => [
		'path' => RUNTIME_PATH.'/session', //文件类session保存路径
	],
	'memcache' => [
		'host' => 'localhost',
		'port' => 11211,
	],
	'redis' => [
		'host' => 'localhost',
		'port' => 11211,
		'password' => '',
		'database' => 0,
	],
];