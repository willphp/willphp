<?php
namespace app\home\controller;
class EmptyController {	
	use \willphp\view\Jump;	
	public function _empty() {		
		$this->_404();
	}
}