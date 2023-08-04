## 使用方法 :id=validate

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

#### 验证条件

```php
const AT_MUST = 1; //必须(默认)
const AT_NOT_NULL = 2; //有值
const AT_NULL = 3; //空值
const AT_SET = 4; //有字段
const AT_NOT_SET = 5; //无字段
```

>验证条件可以填写常量或数字，默认为 AT_MUST

## 验证规则 :id=rule

#### 内置规则

```
unique      唯一验证 格式:unique:表名,主键
required    字段必须且不为空
captcha     验证码验证
exists      必须有字段
notExists   必须无字段
confirm     字段必须相等 如：confirm:password
regex       正则验证 如：regex:/^\d{5,20}$/
url         验证url(filter_var验证)
email       验证邮箱(filter_var验证)
ip          验证ip(filter_var验证)
float       验证浮点数(filter_var验证)
int         验证数字(filter_var验证)
```

#### 特殊规则

```
正则表达式，如：/^\d{5,20}$/    
闭包函数，如：fn($i)=>($i+1)
```

#### 内置函数

可使用自定义函数或PHP内置函数进行验证，如：

```
使用PHP内置函数：is_numeric
```

#### 自定规则

可以在 `config/validate.php` 配置文件中定义自已的正则验证规则，如： 

```
'username' => '/^\w{5,20}$/', //用户名
'password' => '/^\w{6,12}$/', //密码
'string' => '/^\w+$/', //数字字母下划线
'number' => '/^[0-9]*$/', //正数
'chs' => '/^[\x7f-\xff]+$/', //汉字
'mobile' => '/^1[3-9]\d{9}$/', //手机号
'qq' => '/^[1-9][0-9]{4,12}$/', //qq号
'idcard' => '/^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/', //身份证号
'bankcard' => '/^[1-9][0-9]{18}$/', //银行卡号
```

## 验证示例 :id=demo

```php
$rule = [
    ['name', 'required|unique:user,id', '必须|用户已存在', 2], //有值时
    ['pwd', '/^\w{5,12}$/', '密码5~12位', 2], //有值时
    ['mobile', 'mobile', '手机号错误', AT_MUST], //必须
    ['email', 'email', '邮箱错误', 4], //有字段时
    ['age', fn($val)=>($val>=18 && $val<=60), '年龄18~60'],
];
$data = ['name'=>'', 'pwd'=>'123', 'mobile'=>'x12323332333', 'age'=>12];
//$data['email'] = 'aaa';
$errors = validate($rule, $data, true)->getError();
dump($errors);
```