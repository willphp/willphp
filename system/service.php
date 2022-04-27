<?php
/**
 * 自定义服务
 */
return [
		'providers' => [
			'Error' => \system\provider\ErrorProvider::class,
		],
		'facades' => [				
			'Error' => \system\facede\ErrorFacade::class,				
		],
];