<?php
namespace app\home\widget;
use willphp\cache\Widget;
class Test extends Widget{	
	protected $expire = 0; //秒 有效时间 0.永久
	public function set($id = '', $options = []) {			
		return date('Y-m-d H:i:s');
	}
}