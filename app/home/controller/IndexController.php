<?php
namespace app\home\controller;
class IndexController {	
	public function index() {	
		trace(widget('test')->get());		
		return view();
	}
}