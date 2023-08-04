### 目录结构
```
www  WEB部署目录(或者子目录)
├─app                   应用目录
│  ├─common             公共
│  │  ├─controller      控制器
│  │  ├─model           模型
│  │  └─widget          部件
│  |
│  ├─[app_name]         应用名称
│  │  ├─config          配置
│  │  ├─controller      控制器
│  │  ├─model           模型
│  │  ├─view            视图
│  │  └─widget          部件
│  |
│  └─common.php         公共函数
│
├─config                配置目录
│  ├─app.php            应用
│  ├─cache.php          缓存
│  ├─cookie.php         Cookie
│  ├─database.php       数据库
│  ├─debug.php          调试栏
│  ├─filter.php         自动过滤
│  ├─log.php            日志
│  ├─middleware.php     中间件
│  ├─page.php           分页
│  ├─response.php       响应
│  ├─route.php          路由
│  ├─session.php        Session
│  ├─site.php           网站  
│  ├─template.php       模板引擎
│  ├─validate.php       验证规则
│  └─view.php           视图
│
├─public                WEB目录(对外访问目录)
│  ├─static             网站静态资源目录(css,js,img)
│  ├─uploads            图片上传目录(可写)
│  ├─index.php          入口文件
│  ├─.htaccess          apache重写
│  └─nginx.htaccess     nginx重写
|
├─extend                扩展类库        
├─middleware            中间件
├─route                 路由设置
├─runtime               应用运行时目录(可写)
├─view                  视图模板(可选)
├─willphp               框架目录
├─vendor                composer类库(可选)
|
├─env.example.env       .env示例文件
├─composer.json         composer定义文件
├─.gitignore            git设置
├─LICENSE               授权协议
└─README.md             README文件    
```