## 控制定义

在`app/应用名/controller`中定义控制器类，如：

```php
declare(strict_types=1);
namespace app\index\controller;
class Index
{
	public function index()
	{
	    return 'hello world';
	}
}
```

#### 渲染输出

```php
declare(strict_types=1);
namespace app\index\controller;
class Index
{
	public function index()
	{
	    return view();
	}	
	public function api()
	{
	    return ['code'=>200, 'msg'=>'ok', 'data'=>['id'=>1, 'name'=>'php']];
	}	
}
```

#### 错误处理

在`app/应用名/controller/Error.php`中处理错误，如：

```php
declare(strict_types=1);
namespace app\index\controller;
class Error
{
    use \willphp\core\Jump;
    //默认处理
    public function __call($method, $args)
    {
        $msg = $args[0] ?? '出错了！';
        $code = str_starts_with($method, '_') ? substr($method, 1) : 400;
        $this->error($msg, (int)$code);
    }
    //自定义控制器或方法不存在页面
    public function _404(string $msg, array $args = []) {
        dump($msg, $args);
    }
    //自定义访问非公用方法页面
    public function _405(string $msg, array $args = []) {
        dump($msg, $args);
    }
    //自定义验证失败页面
    public function _406(string $msg, array $args = []) {
        dump($msg, $args);
    }
    //自定义参数不足页面
    public function _416(string $msg, array $args = []) {
        dump($msg, $args);
    }
}
```

## 中间件类

#### 使用示例

```php
declare(strict_types=1);
namespace app\index\controller;
class Index
{
    protected $middleware = [ 
        'common', //所有方法
        'auth' => ['except' => ['login']], //除login外
        'test' => ['only' => ['test']], //只是test 
    ]; 
    public function index() {           
        return 'index';
    }
    public function login() {
        return 'login';
    } 
    public function test() {
        return 'test';
    }  
}
```

#### 配置

控制器中间件在`config/middleware.php`中设置，如：

```php
'controller' => [
    'common' => [
        \middleware\controller\Filter::class, //公共
    ],
    'auth' => [
        \middleware\controller\Auth::class, //验证
    ],
    'test' => [
        \middleware\controller\Test::class, //测试
    ],
],   
```
#### 中间件类

设置中间件类`\middleware\controller\Test.php`，代码如下：

```php
declare(strict_types=1);
namespace middleware\controller;
class Test {	
    public function run($next){	
        trace('执行测试中间件');
        $next();
    }
}
```

## 请求处理

#### 参数绑定

```php
declare(strict_types=1);
namespace app\index\controller;
class Index
{
    public function index(int $id, array $req, string $name = 'abc')
    {
        dump($id, $name, $req);
    }
}
```

#### 必须参数

当参数没有默认值(`$req`除外)时必须用`$_GET`或`$_POST`转参，否则跳转方法：

```
Error::_416() //显示： index/index：id 参数不足
```

正确的`GET`请求：

```
?id=10&name=php
```

自动转换 参数类型，如id是int类型传字符会变成0：

```
?id=abc&name=php //id=0&name=php
```

#### 特定参数

`array $req`为框架特定参数，值为`绑定参数，GET，POST`三者合并。

#### 自动过滤

可在`config/filter.php`中设置`$req`参数的自动过滤处理，如：

```php
'filter_req' => true, //是否开启req过滤
'func_html' => 'remove_xss', //html字段处理函数(多个函数,分隔)
'func_except_html' => 'clear_html', //html除外字段处理函数
//html字段
'html_fields' => ['phtml'], //html字段列表
'html_like' => 'content', //html字段包含
//字段自动处理
'field_auto' => [
    'id,p' => 'intval',
],
'func_out' => 'stripslashes', //模板输出过滤(全部)
'func_out_except_html' => 'htmlspecialchars', //模板输出过滤(html除外)
```

请求示例：

```
?id=aa&name=<b>bbb</b>&p=bb
```

返回结果：

```
int(0) //id
string(10) "<b>bbb</b>"  //name
array(3) {
  ["id"] => int(0)
  ["name"] => string(3) "bbb"
  ["p"] => int(0)
}
```

## 请求获取

>在控制器中推荐使用绑定参数来获取

```php
input('get.'); //获取$_GET
input('post.'); //获取$_POST
input('get.name'); //不存在返回 ''
input('post.cid', 0, 'intval'); //获取intval($_GET['cid'])
input('id', 1, 'intval'); //获取$_POST['id']或$_GET['id']   
input('get.pwd', '1', ['intval','md5']); //获取md5(intval($_GET['pwd']))   
```

## 控制跳转

可挂载`\willphp\core\Jump`模块实现跳转功能：

```php
declare(strict_types=1);
namespace app\index\controller;
class Index
{
    use \willphp\core\Jump;
}
```

#### 模块方法

```php
success($msg = '', string $url = null) //成功提示(自动判断是否返回Json格式)
error($msg = '', string $url = null, int $code = 400) //失败提示(同上)
_jump($info, bool $status = false, string $url = null) //提示整合(同上)
_json(int $code = 200, string $msg = '', array $data = null, array $extend = [])
_url(string $url, int $time = 0) //url跳转
isAjax() //是否ajax提交
isPost() //是否post提交
isGet(): //是否get提交
isPut(): //是否put提交
isDelete(): //是否delete提交
```

> 如果应用在`config/app.php`文件中的`api_list`列表里，提示返回Json格式

#### 使用示例

```php
public function index()
{
    if ($this->isPost()) {
        echo 'isPost';
    }
    return 'isGet';
}
public function msg(int $id = 1)
{
    if ($id == 1) {
        $this->success('成功1', 'index/index');
    } elseif ($id == 2) {
        $this->error('失败1');
    }
    //跳转整合
    $this->_jump(['成功2', '失败2'], ($id == 3), 'index/index');
}
public function json()
{
    $data = ['id'=>1,'name'=>'willphp'];
    $this->_json(200, '', $data, ['debug'=>'test']);
}
```