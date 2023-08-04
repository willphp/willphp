#### 定义部件

在`app/应用名/widget`中定义部件类，如：

```php
declare(strict_types=1);
namespace app\index\widget;
use willphp\core\Widget;
class Test extends Widget
{
    protected string $table = 'test'; //表名标识(用于自动更新)
    protected int $expire = 0; //缓存时间(秒) 0永久
     //设置部件数据(必须)
    public function set($id = '', array $options = [])
    {
        return $id.'-'.date('Y-m-d H:i:s');
    }
}
```

#### 使用部件

可以在控制器中使用，如：

```php
declare(strict_types=1);
namespace app\index\controller;
class Index
{
    public function index(int $id = 0)
    {  
        $time = widget('test')->get($id);
        echo $time;
        //widget('index.test') //跨应用获取
    }
}
```

#### 模板调用

```php
{:widget('test')->get()
```

#### 更新部件

```php
widget('test')->update();
```

#### 清空缓存

```php
cache(null);
```