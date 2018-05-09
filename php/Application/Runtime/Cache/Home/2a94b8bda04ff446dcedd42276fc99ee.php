<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html style="overflow-x:auto;overflow-y:auto;">
<head>
	<title>后台登录</title><!--  - Powered By JeeSite -->
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<meta name="renderer" content="webkit"><meta http-equiv="X-UA-Compatible" content="IE=8,IE=9,IE=10" />
<meta http-equiv="Expires" content="0"><meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Cache-Control" content="no-store">
<link href="/pay2/Public/home/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<meta name="decorator" content="blank"/>
<style type="text/css">
.banner {
	background: #fff url(/pay2/Public/home/images/loginBack.jpg) no-repeat center center;
	height: 410px;
	position: relative;
	overflow: visible;
}
.footer{
	padding-top:15px;
	color:#ccc
}

</style>
<style type="text/css">
  html,body,table{width:100%;text-align:center;}.form-signin-heading{font-family:Helvetica, Georgia, Arial, sans-serif, 黑体;font-size:36px;margin-bottom:20px;color:#0663a2;}
  .form-signin{position:absolute;text-align:left;width:300px;padding:25px 29px 29px;margin:45px 62% 20px;background-color:rgba(	245, 245, 245,0.8);border:1px solid #e5e5e5;
		-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;-webkit-box-shadow:0 1px 2px rgba(0,0,0,.05);-moz-box-shadow:0 1px 2px rgba(0,0,0,.05);box-shadow:0 1px 2px rgba(0,0,0,.05);}
  .form-signin .checkbox{margin-bottom:10px;color:#0663a2;} .form-signin .input-label{font-size:16px;line-height:23px;color:#999;}
  .form-signin .input-block-level{font-size:16px;height:auto;margin-bottom:15px;padding:7px;*width:283px;*padding-bottom:0;_padding:7px 7px 9px 7px;}
  .form-signin .btn.btn-large{font-size:16px;} .form-signin #themeSwitch{position:absolute;right:15px;bottom:10px;}
  .form-signin div.validateCode {padding-bottom:15px;} .mid{vertical-align:middle;}
  .header{height:80px;padding-top:20px;} .alert{position:relative;width:300px;margin:0 auto;*padding-bottom:0px;}
  label.error{background:none;width:270px;font-weight:normal;color:inherit;margin:0;}
</style>
</head>
<body>	
<!--[if lte IE 6]><br/><div class='alert alert-block' style="text-align:left;padding-bottom:10px;"><a class="close" data-dismiss="alert">x</a><h4>温馨提示：</h4><p>你使用的浏览器版本过低。为了获得更好的浏览体验，我们强烈建议您 <a href="http://browsehappy.com" target="_blank">升级</a> 到最新版本的IE浏览器，或者使用较新版本的 Chrome、Firefox、Safari 等。</p></div><![endif]-->
<div class="header"></div>
<h1 class="form-signin-heading" >管理平台</h1>
<div class="banner">
	<form id="defaultForm" class="form-signin">
		<label class="input-label " for="user_name" >用户名</label>
		<input type="text" id="user_name" name="user_name" class="input-block-level required" value="">
		</br>
		<label class="input-label " for="password" >密 码</label>
		<input type="password" id="password" name="password" class="input-block-level required">
		<div>
			<input type="text" id="code" name="code" value="" class="input-block-level required" style="width: 105px; margin: 10px 20px 10px 0px;" />
			<img id="verify" src="<?php echo U('Index/verify');?>" />
		</div>
		</br>
		<input class="btn btn-large btn-primary" type="submit" value="登 录" id="Button1"/>&nbsp;&nbsp;
		
	</form>
</div>
<div class="footer" >
	Copyright &copy; 2017-2017管理平台V1.0.0 
</div>
</body>
<script type="text/javascript" src="/pay2/Public/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/pay2/Public/js/layer/layer.js" charset="utf-8"></script>

<script type="text/javascript">  
	$(function () {  

		$("#verify").click(function(){
			$(this).attr("src",$(this).attr("src")+'?v='+Math.random());
			$("#code").val(""); //清空验证码
		});

		var ajaxurl="<?php echo U('Index/login');?>";
		$("#Button1").click(function () {  
			$.ajax({  
				type: "post",  
				url: ajaxurl,  
				data: $("#defaultForm").serialize(),  
				success: function (result) { 
					if(result.status=='1'){
						//alert(result.info);
						window.location.href = result.url;
					}else{
						layer.alert(result.info, {icon: 2});
						$("#verify").click();
					}

				}  
			});
			return false;  
		});  
	});  
</script>
</html>