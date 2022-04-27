<?php
namespace app\home\controller;
class EmptyController {	
	use \willphp\view\Jump;	
	public function empty() {		
		$this->_404();
	}
}