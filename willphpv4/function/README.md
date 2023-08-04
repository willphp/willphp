### 助手函数

#### Cookie

```php
//判断
if (!cookie('?time')) {
    cookie('time', time(), 30); //设置
}
$time = cookie('time'); //获取
echo $time;
cookie('time', null); //清除
$all = cookie(); //获取全部
dump($all);
cookie(null); //清空全部
```

#### Session

```php
if (!session('?time')) {
    session('time', time()); //设置
}
$time = session('time'); //获取
echo $time;
session('time', null); //清除
$all = session(); //获取全部
dump($all);
session(null); //清空全部
```

#### 视图

```php
public function index()
{
	//return view('index', ['id'=>1]);
	//return view('home/test');	
	//return view()->with('id', 1); //['id'=>1]
	//return view_with(['id'=>1]); //'id',1
	//return view()->with('time', time())->cache(30);
	return view();
}
```

#### URL生成

```php
echo url('blog/view', ['id'=>1]);
echo url('blog/view?id=1');
echo url('about', [], '.shtml');
echo url('[back]');
echo url('[history]');
```
#### 输入获取

```php
echo input('get.id', 1, 'intval');
echo input('post.id', 2, 'intval');
echo input('id');
echo input('pwd', 'a1', 'intval,md5');
echo input('pwd', 'a1', ['intval','md5']);
dump(input('post.'));
dump(input('get.'));
```

#### 表单验证

```php
//规则:'表单字段', '验证规则[|...]', '错误提示[|...]', '[验证条件]'
$rule = [
    ['email', 'email', '邮箱错误', AT_MUST]
];
$data = ['email' => 'abc@163'];
//参数：'规则设置', '[数据($_POST)]', '[批量验证(false)]'
$v=validate($rule, $data);
$v->show(); //失败时调用控制器Error::_406($err)
$v->getError(); //验证失败返回错误，通过返回空数组
$v->isFail(); //验证失败返回true
```

#### 数据库

格式：

```
db('表名',[数据库配置])->方法(参数)->方法();
```
示例： 

```php
$list = db('blog')->field('id,title')->select();
```

>此函数返回 `Db::connect($config, $table)`，后置为数据库操作方法。

#### 模型

```php
//实例化app/common/model/Blog.php
$blog = model('common.blog');
//实例化app/当前应用/model/BlogCate.php
$cate = model('blog_cate'); 
```
>此函数返回模型类单例，后置为模型或数据库操作方法。

#### 部件

```php
// 实例化app/common/widget/Blog.php
$blog = widget('common.blog'); 
//实例化app/当前应用/widget/BlogCate.php
$cate = widget('blog_cate')->get();
```
>此函数返回部件类单例，后置为部件类方法。

#### 配置

快速获取：

```php
$id = get_config('site.id', 0);//默认0
```

整合函数：

```php
config('site.name', 'php'); //设置
$bool = config('?site.id'); //判断
$all = config(); //全部
$site = config('site'); //获取site
$id = config('site.id'); //获取site.id 
$id = config('?site.id', 1); //获取,默认1
$id = config('?id', 1, 'site'); //同上
$id = site('?id', 1); //简化site,同上
```

#### 缓存

获取并设置：

```php
$id = get_cache('id', fn()=>time(), 10);//10秒有效
```

>有效时间默认为0，永久有效

整合函数：

```php
cache('time', time()); //设置(永久)
cache('id', 1, 30); //设置(30秒)
$bool = cache('?id'); //判断
$id = cache('id'); //获取
cache('name', null); //删除
cache(null); //清空
```

#### 调试

格式化输出：

```php
dump($_SERVER); //变量
dd([1, 2]); //输出并结束
dump_const(); //用户常量
```

调试栏输出：

```php
trace(['id'=>1], 'debug'); //默认debug
trace('error info', 'error'); //错误
trace('query sql', 'sql'); //sql语句
```


