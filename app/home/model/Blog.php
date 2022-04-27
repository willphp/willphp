<?php
/*--------------------------------------------------------------------------
 | Software: [WillPHP framework]
 | Site: www.113344.com
 |--------------------------------------------------------------------------
 | Author: no-mind <24203741@qq.com>
 | WeChat: www113344
 | Copyright (c) 2020-2022, www.113344.com. All Rights Reserved.
 |-------------------------------------------------------------------------*/
namespace app\home\model;
use willphp\model\Model;
/**
 * 模型说明
 */
/*
内置验证规则：
required    字段必须存在且不能为空
isset       不存在字段时验证失败
exists      存在字段时验证失败
captcha     验证码
unique      唯一验证 如:unique:user,id (id为表主键）
user        用户名及长度 如：user:5,20
pwd			密码格式及长度 如：pwd:5,20
len         长度范围(位数) 如 :len:5,20
max     	最大长度 如：max:10
min     	最小长度 如：min:10
between     数字范围 如：between:1,9
regex       正则 如：regex:/^\d{5,20}$/
confirm     字段值比对 如：confirm:repassword
alpha       包含[中文，字母，数字，-_]
number      纯数字(不包含负数和小数点)
float       浮点数
url     	网址
email       电子邮箱
phone       手机号
qq      	QQ号
idcard      身份证号
bankcard    银行卡号

自定义的验证规则：
//$field 字段名 $value 字段值 $params 参数比如 max:10 10就是参数 $data 所有表单数据
public function checkTest($field, $value, $params, $data) {	
	return ($value == 'test');
}
*/
class Blog extends Model {
	protected $name = 'blog'; //表名(不带前缀) 不设置时自动获取类名
	protected $pk = 'id'; //主键
	protected $config = []; //数据库配置(string|array)
	protected $allowFill = ['*']; //允许填充字段'*'所有字段
	protected $denyFill = ['hits']; //禁止填充字段
	protected $autoTimestamp = 'int'; //自动添加时间，关闭：false
	protected $createTime = 'ctime'; //自动创建时间
	protected $updateTime = 'uptime'; //自动更新时间 	
	/*
	 自动验证 (可选)：[字段名,验证方法,错误信息,验证条件,处理时机]
	 self::EXISTS_VALIDATE   值:1     字段存在时
	 self::NO_EMPTY_VALIDATE 值:2    值不为空时
	 self::MUST_VALIDATE     值:3    必须验证
	 self::EMPTY_VALIDATE    值:4    值为空时验证
	 self::NO_EXIST_VALIDATE 值:5    字段不存在时处理
	 
	 处理时机 (可选)：
	 self::MODEL_INSERT      值:1    新增操作
	 self::MODEL_UPDATE      值:2    修改操作
	 self::MODEL_BOTH        值:3    全部操作
	 */
	protected $validate = [
			['title', 'required', '标题必须', 3, 3], //必须处理|全部操作
			['title', 'unique:blog,id', '标题已存在', 3, 3], //必须处理|全部操作
			['content', 'required', '内容必须', 3, 3], //必须处理|全部操作
			['pwd', 'pwd:3,12', '密码3-12位', 2, 3], //值不为空|全部操作
	];
	/*
	自动完成 (可选)：[字段名,处理方法,方法类型,处理条件,处理时机]
	方法类型: string字符(默认) function函数 method方法
	self::EXISTS_AUTO       值:1   有字段时 
	self::NOT_EMPTY_AUTO    值:2   值不为空时
	self::MUST_AUTO         值:3   必须处理 
	self::EMPTY_AUTO        值:4   值为空时
	self::NO_EXIST_AUTO     值:5   不存在字段时
	自定义方法 ：
	['pwd', 'setPwd', 'method', 2, 3], 
	public function setPwd($val,$data) {return md5($val.'willphp');}
	 */
	protected $auto = [
			['pwd', 'md5', 'function', 2, 3], //值不为空时|全部操作			
			['status', 1, 'string', 3, 1], //必须处理|新增操作			
	];
	/*
	自动过滤 (可选): [字段名,过滤条件,处理时机]
	self::EXIST_FILTER		值:1   存在时过滤
	self::NOT_EMPTY_FILTER	值:2   值不为空时过滤
	self::MUST_FILTER		值:3   必须过滤
	self::EMPTY_FILTER		值:4   值为空时过滤
	self::NOT_EXIST_FILTER	值:5   字段不存在时过滤
	*/
	protected $filter= [			
			['pwd', 4, 2], //值是空时|修改操作
	];
	//读取数据： 模型字段处理
	public function getCtimeAtAttribute($val) {
		return date('Y-m-d H:i:s', $val);
	}
}