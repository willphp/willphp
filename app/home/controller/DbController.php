<?php
namespace app\home\controller;
use willphp\validate\Validate;
//use willphp\db\Db;
//use willphp\page\Page;
/**
 * 数据库示例
 */
class DbController {	
	use \willphp\view\Jump;	 	
	/*
	[字段名,验证方法,错误信息,验证条件]
	验证条件 (可选)：
	1	有字段时
	2	值不为空时
	3	必须处理 (默认)
	4	值为空时
	5       不存在字段时处理
	*/
	protected $rule = [
			['title', 'required', '标题必须', 3], //必须处理
			['title', 'unique:blog,id', '标题已存在', 3], //必须处理
			['content', 'required', '内容必须', 3], //必须处理
			['pwd', 'pwd:3,12', '密码3-12位', 2], //值不为空
			['hits', 'number', '浏览必须是数字', 3], //必须处理
	];	
	//前置操作
	public function _before($method) {
		if ($method != 'del') {
			view_with('cates', widget('cates')->get());
		}
	}
	//列表
	public function index() {	
		//关联查询
		/*
		$list = Db::table('blog a')->field('a.id,a.title,a.cid,a.hits,a.ctime,b.cname')->join('cate b', 'a.cid=b.id', 'left')->order('a.id DESC')->paginate(5);
		trace($list->toArray());		 
		*/
		$fields = 'id,cid,title,ctime,hits'; //查询字段
		//使用传统分页
		/*
		 $count = db('blog')->where('status', 1)->count();
		 $list = [];
		 $phtml = '';
		 if ($count > 0) {
			 Page::make($count);
			 $limit = Page::getLimit();
			 $list = db('blog')->field($fields)->where('status', 1)->limit($limit)->order('id DESC')->select();
			 $phtml = Page::getHtml();
		 }
		 view_with('phtml', $phtml);
		 return view('indexpage')->with(['list'=>$list]);
		*/
		//使用paginate
		$list = db('blog')->field($fields)->where('status', 1)->order('id DESC')->paginate(10);	
		return view()->with(['list'=>$list]);
	}
	//添加
	public function add($req) {
		if ($this->isPost()) {			
			Validate::make($this->rule, $req); //验证数据
			$req['ctime'] = time(); //添加时间
			$req['status'] = 1;
			if (!empty($req['pwd'])) {
				$req['pwd'] = md5($req['pwd']);
			}
			$r = db('blog')->insert($req);
			$this->_jump(['添加成功', '添加失败'], $r, 'index');
		}
		return view();
	}
	//修改
	public function edit($id, $req) {
		if ($this->isPost()) {
			Validate::make($this->rule, $req); //验证数据
			$req['uptime'] = time(); //修改时间
			if (!empty($req['pwd'])) {
				$req['pwd'] = md5($req['pwd']);
			} else {
				unset($req['pwd']);
			}
			$r = db('blog')->where('id', $id)->update($req);
			$this->_jump(['修改成功', '修改失败'], $r, 'index');
		}
		$vo = db('blog')->where('id', $id)->find();
		if (!$vo) {
			$this->error('记录不存在');
		}
		return view()->with('vo', $vo);
	}	
	//查看
	public function view($id, $req) {		
		$vo = db('blog')->where('id', $id)->find();	
		if (!$vo) {
			$this->error('记录不存在');
		}		
		return view()->with('vo', $vo);
	}	
	//删除
	public function del($id) {
		$r = db('blog')->where('id', $id)->delete();		
		$this->_jump(['删除成功', '删除失败'], $r, 'index');
	}
}