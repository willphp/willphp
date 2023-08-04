## 模板语法

#### 常量输出

| 常量              | 说明      |
|-----------------|---------|
| \_\_VERSION\_\_ | 框架版本    |
| \_\_POWERED\_\_ | 框架名+版本号 |
| \_\_WEB\_\_     | 相对URL   |
| \_\_URL\_\_     | 当前URL   |
| \_\_HISTORY\_\_ | 来源URL   |
| \_\_ROOT\_\_    | 根路径     |
| \_\_STATIC\_\_  | 资源目录    |
| \_\_UPLOAD\_\_  | 上传目录    |
| \_\_THEME\_\_   | 当前主题名   |

以上常量可以在模板中直接输出，如：

```
Powered By __POWERED__ 主题:__THEME__
```

#### 包含文件

```
{include 'public/header.html'}
```

#### 变量赋值

```
{php $hello='hello WillPHP'}
{php $time=time()}
{php $list=db('user')->where('status',1)->select()}
```

#### 变量输出

```
{$hello}
{$arr.id} 
{$arr[0]}
{$arr.0.a.b}
{$arr[$cid]}
{$arr[$vo['cid']]}
```

#### 变量操作

```
{$id|intval}
{$vo.title|substr=0,10}
{$list->links()}
```

#### 函数输出

```
{:date('Y-m-d',$vo['ctime'])} 
{:url('abc/abc')}
{:widget('test')->get()}
```

#### 条件语句

```
{php $id=2}
{if $id==1 or $id==2:} id=1|2 {/if}
{if $id==1:} id=1 {else:} id<>1 {/if}
{if $id==1:} id=1 {elseif $id==2:} id=2 {else:} id<>1|2 {/if}
{php $none=''}
{empty $none:} none {/empty}
```

#### 偱环语句

```
{php $arr=[['id'=>1,'name'=>'a'],['id'=>2,'name'=>'b']]}
{foreach $arr as $v} 
	{$v.id}.{$v.name} |
{/foreach}
{foreach $arr[0] as $k=>$v}
	{$k}.{$v} | 
{/foreach}
```

#### 原样输出

```
{literal}
    {$hello}
{/literal}
__#POWERED#__ //输出：__POWERED__
{#$hello#} //输出：{$hello}
```

## 自定标签

所有标签替换设置在`config/template.php`配置文件中，可自由设置规则替换。

#### 修改标签，如：

```
'regex_literal' => '/{lite}(.*?){\/lite}/s',
```

修改后效果：

```
{php $hi='hello'}
失效：{literal}{$hi}{/literal}
成功：{lite}{$hi}{/lite}
```

#### 添加标签，如：

```
//在regex_replace配置中加入{haha:$变量名}
'/{\s*haha:\$var\s*}/i' => '<?php echo $\\1.' haha'?>',
```

添加后效果：

```
{php $hi='hello'}
{haha:$hi} //显示 hello haha
```

>注意：在regex_replace中 key var { } 是会自动替换成相应配置

## 开发示例

#### 数据分页

```
获取数据：
{php $list=db('site')->where('id','>',0)->order('id DESC')->paginate(2)}
数据为空：
{empty $list->toArray():}none{/empty}
偱环输出：
{foreach $list as $vo}
    {$vo.id}.{$vo.cname}
{/foreach}
分页html：
{$list->links()}
总记录数：
{$list->getAttr('count')} 
当前页码：
{$list->getAttr('page')} 
开始数：
{$list->getAttr('offset')}
每页记录数：
{$list->getAttr('page_size')}
总页数：
{$list->getAttr('page_count')}
```

#### 获取配置

```
{:site('site_title')} 等于 {:config('site.site_title')}
```

#### 生成URL

```
{:url('blog/about')}
```

#### 格式化时间

```
{php $vo['ctime']=time()}
{:date('Y-m-d',$vo['ctime'])} 
```

#### 字符串截取

```
{php $title='hello world'}
{$title|str_substr=0,5}
```

#### 获取IP地址

```
{:get_ip()}
```

#### 验证码图片

```
<img src="{:url('api/captcha')}" style="cursor:pointer;" onclick="this.src='{:url('api/captcha')}?'+Math.random();"/>
```