<?php
namespace app\home\widget;
use willphp\cache\Widget;
class Cates extends Widget{	
	protected $expire = 0; //秒 有效时间 0.永久
	public function set($id = '', $options = []) {			
		return db('cate')->getField('id,cname');
	}
}