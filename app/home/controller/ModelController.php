<?php
namespace app\home\controller;
/**
 * 模型示例
 */
class ModelController {
	use \willphp\view\Jump;
	//前置操作
	public function _before($method) {
		if ($method != 'del') {
			view_with('cates', widget('cates')->get());		
		}
	}
	public function _after($method) {}
	//列表
	public function index() {		
		$list = model('blog')->where('status', 1)->order('id DESC')->paginate(10);			
		return view()->with(['list'=>$list]);
	}
	//添加
	public function add($req) {			
		if ($this->isPost()) {			
			$r = model('blog')->save($req); //模型方法	
			$this->_jump(['添加成功', '添加失败'], $r, 'index');
		}
		return view();
	}
	//修改
	public function edit($id, $req) {
		$blog = model('blog')->find($id);		
		if (!$blog) {
			$this->error('记录不存在');
		}		
		if ($this->isPost()) {
			$r = $blog->save($req); //模型方法
			$this->_jump(['修改成功', '修改失败'], $r, 'index');
		}
		return view()->with('vo', $blog->toArray());
	}	
	public function view($id) {
		$vo = model('blog')->find($id);
		if (!$vo) {
			$this->error('记录不存在');
		}
		return view()->with('vo', $vo); //->toArray() //转换成数组
	}	
	//删除
	public function del($id) {
		$r = model('blog')->delete($id); //直接使用Db的方法
		/*
		$blog = model('blog')->find($id);
		$r = $blog->destory(); //模型方法		
		*/
		$this->_jump(['删除成功', '删除失败'], $r, 'index');
	}
}	