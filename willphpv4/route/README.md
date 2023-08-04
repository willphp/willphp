## 路由配置

可以在`config/route.php`中配置路由配置，如：

```php
'default_controller' => 'index', //默认控制器
'default_action' => 'index', //默认方法
'get_var' => 's', //path_info的$_GET变量
'check_regex' => '#^[a-zA-Z0-9\x7f-\xff\%\/\.\-_]+$#', //路由path_info验证正则
'url_suffix' => '.html', //url函数自动添加后缀
'clear_suffix' => ['.html'], //路由解析自动清除后缀
'get_filter_empty' => false, //$_GET变量是否过滤空值和0
//路由设置正则别名
'alias' => [
    ':num' => '[0-9\-]+', //数字
    ':float' => '[0-9\.\-]+', //浮点数
    ':string' => '[a-zA-Z0-9\-_]+', //\w
    ':alpha' => '[a-zA-Z\x7f-\xff0-9-_]+', //包含中文
    ':page' => '[0-9]+', //分页数字
    ':any' => '.*', //任意
],
```

## 应用路由

路由规则在 `route/应用名.php` 中设置，如：

```php  
//格式：'路由(表达式)' => '控制器/方法/[参数/匹配值]'
'index' => 'index/index',
'index_p(:num)' => 'index/index/p/${1}',
'cid(:num)_p(:num)' => 'index/index/cid/${1}p/${2}',
```

## 伪静态

可以在`config/app.php`中开启：

```php
'url_rewrite' => true,
```

apache规则设置`public/.htaccess`文件：

```
<IfModule mod_rewrite.c>
  Options +FollowSymlinks -Multiviews
  RewriteEngine On
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
</IfModule>
```
nginx规则设置`public/nginx.htaccess`文件：

```
location / {
	if (!-e $request_filename) {
		rewrite  ^(.*)$  /index.php/$1  last;
	}
}
```

## URL生成

url函数会根据当前应用路由设置生成对应url链接。格式如下：

```php
url('控制器/方法', [参数], [后缀名]);    
```

示例如下:

```php
echo url('index/index'); //index.html 
//前边加@不经路由
echo url('@index/index'); //index/index.html 
//不设置控制器，默认当前控制器
echo url('test'); //index/test.html 
//test/index
echo url('test/index'); //test/index.html 
//index/index/p/1 
echo url('index?p=1'); //index_p1.html   
//index/index/p/2
echo url('index', ['p'=>2], '.php'); //index_p2.php 
echo url('index',['cid'=>1, 'p'=>2]); //cid1_p2.html
```
     