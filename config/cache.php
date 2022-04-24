<?php
return [
		'driver' => 'file', //默认缓存驱动
		'file' => [
			'dir' => RUNTIME_PATH.'/cache',
		],
		'memcache' => [
				'host' => '127.0.0.1',
				'port' => 11211,
		],
		'redis'    => [
				'host' => '127.0.0.1',
				'port' => 6379,
				'password' => '',
				'database' => 0,
		],
];