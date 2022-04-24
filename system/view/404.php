<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>404无法打开页面</title>
<style type="text/css">
body,code,dd,div,dl,dt,fieldset,form,h1,h2,h3,h4,h5,h6,input,legend,li,ol,p,pre,td,textarea,th,ul{margin:0;padding:0}
body{background:#f0f1f3;font-size:16px;font-family:Tahoma,Arial,sans-serif;color:#111;}
h1,h2,h3,h4,h5,h6,strong{font-weight:700}
a{color:#428bca;text-decoration:none}
a:hover{text-decoration:none}
.blue{color:#4288ce}
.error-page{max-width:680px;padding:10px;margin:60px auto 0;background:#f0f1f3;overflow:hidden;word-break:keep-all;word-wrap:break-word;} 
.error-page-container{position:relative;z-index:1}
.error-page-main{position:relative;background:#f9f9f9;margin:0 auto;-ms-box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:25px 30px 30px 30px}
.error-page-main:before{content:'';display:block;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAmkAAAAHCAIAAADcck2GAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAACFSURBVHja7NWhDgFxHMDxOxNsNGc22aaZKXZZ5KKX8Fye498VgUJDEq6QCDbdI/zu83mDb/rm1XaXNcBkvXl+8vCZnUu63uvwmYtqdXt3w2eOXufD/hg+c1bOH71x+MzBtz6lFD6zGPbb02UTntLKAADvBADvBADvBADvBADvBAD+/QQYAPeEFhyocrThAAAAAElFTkSuQmCC);height:7px;position:absolute;top:-7px;width:100%;left:0} 
.error-page-main h3{font-size:24px;color:#333;font-weight:400;padding-bottom:20px;border-bottom:1px dashed #999}
.error-page-main h3 strong{font-size:54px;font-weight:400;margin-right:20px}
.error-page-head{text-align:right}
.error-page-head a{font-size:14px;color:#999}
.error-page-body{padding-top:10px}
.error-page-body p{font-size:14px;padding:10px 0;color:#666;line-height:25px;}
.error-page-body h4{font-size:18px;padding:5px 0 20px 0;font-weight:400;color:#a94442}
.error-page-foot{padding:15px 0 25px 0;border-top:1px dashed #999}
.error-page-foot a{float:right;height:30px;line-height:30px;padding:0 15px;margin:0;font-size:14px;border:none;margin-left:5px;}
.error-page-foot a.green{background:#89bf43;color:#fff}
.error-page-foot a.blue {background:#4288ce;color:#fff}
.error-page-actions{font-size:0;z-index:100}
.error-page-actions:before{content:'';display:block;position:absolute;z-index:-1;bottom:17px;left:50px;width:200px;height:10px;-moz-box-shadow:4px 5px 31px 11px #999;-webkit-box-shadow:4px 5px 31px 11px #999;box-shadow:4px 5px 31px 11px #999;-moz-transform:rotate(-4deg);-webkit-transform:rotate(-4deg);-ms-transform:rotate(-4deg);-o-transform:rotate(-4deg);transform:rotate(-4deg)}
.error-page-actions:after{content:'';display:block;position:absolute;z-index:-1;bottom:17px;right:50px;width:200px;height:10px;-moz-box-shadow:4px 5px 31px 11px #999;-webkit-box-shadow:4px 5px 31px 11px #999;box-shadow:4px 5px 31px 11px #999;-moz-transform:rotate(4deg);-webkit-transform:rotate(4deg);-ms-transform:rotate(4deg);-o-transform:rotate(4deg);transform:rotate(4deg)}
</style>
</head>
<body>
<div class="error-page">
    <div class="error-page-container">    	
        <div class="error-page-main">
        	<div class="error-page-head" style="display:none;"><a href="http://www.113344.com" title="willphp官网" target="_blank">WillPHP</a></div>
			<h3><strong>404</strong>无法打开页面</h3>			
			<div class="error-page-body">
				<p><span class="blue">可能原因:</span></p>
				<p>1.找不到请求的页面 2.输入的网址不正确 3.网络信号不好</p>
			</div>
			<div class="error-page-foot">
				<a href="<?php echo trim('http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']), '/\\');?>" class="green">返回首页</a>
				<a href="javascript:history.back(-1);" class="blue">返回上一页</a>
			</div>			
		</div>
		<div class="error-page-actions"></div>		
	</div>		
</div>
</body>
</html>