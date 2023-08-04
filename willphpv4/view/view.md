## 视图配置

#### 模板路径

可在`config/app.php`中配置应用的视图方式，如：

```php
'view_path' => ['index' => 'view'], //设置index模板路径为根目录view
'theme_on' => ['index'], //设置index为多主题
```
#### 主题切换

应用的默认主题在`config/site.php`中设置：

```php
'theme' => 'default',
```

可通过GET参数切换主题，切换后主题存于cookie中，如：

```php
?t=blue //切换blue主题存于cookie
```

>当主题不存在，则使用`default`主题

## 赋值渲染

可在控制器中对视图变量赋值与渲染，如：

```php
public function index(): object
{
    //return view_with(['id'=>1]);     
    //return view();
    //return view('index/test1', ['id' => 2,'msg' => 'php']);
    //return view()->cache(30);
    return view()->with('id', 3);
}
```