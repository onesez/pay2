<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台</title>
<meta name="keywords" /><meta name="description" />
<script type="text/javascript" src="/pay2/Public/js/jquery.js"></script>
<script type="text/javascript" src="/pay2/Public/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/pay2/Public/js/layer/layer.js"></script>
<script language="JavaScript" src="/pay2/Public/js/laydate/laydate.js"></script>
<script type="text/javascript" src="/pay2/Public/admin/static/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/pay2/Public/admin/skin/js/jquery.treeview.js"></script>
<script type="text/javascript" src="/pay2/Public/admin/skin/user/js/menu.js"></script>
<link href="/pay2/Public/admin/skin/css/common.css" rel="stylesheet" type="text/css" media="screen,projection" />
<link href="/pay2/Public/admin/skin/user/user.css" rel="stylesheet" type="text/css" media="screen,projection" />
<link href="/pay2/Public/admin/skin/css/page.css" rel="stylesheet" type="text/css" />
<link href="/pay2/Public/admin/skin/user/Css/style.css" rel="stylesheet" type="text/css" />
<link href="/pay2/Public/admin/skin/user/Css/Index.css" rel="stylesheet" type="text/css" />
<!--改动 引用样式 结束-->
    
</head>
<body scroll="no">
<table class="tab" width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td height="64" colspan="2">
				
				<div class="head">
					<a class="logo" href="<?php echo U('Main/index');?>" onfocus="this.blur();">支付平台</a>
					<ul class="nav">
						<li><a href="<?php echo U('Main/index');?>">商户首页</a></li>
						<?php if(($_SESSION['user_name'] == 'admin')): ?><li><a href="http://106.14.206.106/logs.txt" target="_blank">请求日志</a></li><?php endif; ?>
						<li>上次登录时间：<?php echo (date('Y-m-d H:i:s',(isset($lastData[0]['log_time']) && ($lastData[0]['log_time'] !== ""))?($lastData[0]['log_time']):time())); ?> 上次登录IP：<?php echo ((isset($lastData[0]['log_ip']) && ($lastData[0]['log_ip'] !== ""))?($lastData[0]['log_ip']):"首次登录"); ?> </li>
						<li>欢迎您，<?php echo ($_SESSION['user_name']); ?></li>
						<li><a class="mess1">可提现余额：<?php echo ($userData["balance"]); ?>元</a><a id= "money"></a>&nbsp;</li>
						<li><a class="messHov" href="<?php echo U('Gonggao/lst');?>">站内公告</a></li>
						<li><a href="javascript:;" id="ctl00_logout" class="mess2">退 出</a></li>
					</ul>
				</div>
			
		</td>
	</tr>
	<tr>
		<td class="l" width="180" valign="top">	
			
								<div class="menu">
					<h2><a href="<?php echo U('Main/index');?>" id="ctl00_banner" onfocus="this.blur();">会员首页</a></h2>
					<ul class="menuList" id="tree">
						<?php if(is_array($menu_list)): foreach($menu_list as $k=>$v): if(!empty($v["child"])): ?><li id="ctl00_jiaoyi">
								<span class="l1"><?php echo ($v["title"]); ?></span>
								<ul class="menuList2" style="display:none">
									<?php if(is_array($v["child"])): foreach($v["child"] as $kk=>$vv): ?><li><a href="<?php echo U("$vv[name]");?>" onfocus="this.blur();"><?php echo ($vv["title"]); ?></a></li><?php endforeach; endif; ?>
								</ul>
							</li><?php endif; endforeach; endif; ?>
					</ul>
				</div>
			
		</td>
		<td valign="top" class="r">
			<!--改动-->
			<script type="text/javascript" src="/pay2/Public/js/myAjax.js"></script>
<!--改动-->
<style>
.ipList .td1 td {
    color: #545454;
    line-height: 22px;
    padding: 10px;
    border: 1px solid #E7E7E7;
    text-align: center;
}
</style>
<table class="Index_card" style="display:block;">
	<tr>
		<td valign="top">
				<table class="Index_card" style="float:left;">
						<tr>
							  <td width="32%">
								  <dl class="dl_2">
									  <dt>
										  <div class="Dt_1">系统公告</div>
										  <div class="Dt_3"><a href="<?php echo U('Gonggao/lst');?>" class="color_tiann">更多</a></div>
									  </dt>
									  <dd>
										  <div class="Dt_0">
													  <?php if(is_array($Gongaolist)): foreach($Gongaolist as $key=>$vo): ?><div class="Bpwen1"><a href="<?php echo U('Gonggao/detail',array('id'=>$vo['id']));?>">
															  <?php echo ($vo["title"]); ?></a>
															  <span><?php echo (date('Y-m-d',$vo['create_date']?$vo['create_date']:'')); ?></span>
														  </div><?php endforeach; endif; ?>
										  </div>
									  </dd>
									  <dd class="Dd">
										  <div class="Dd_1"></div>
										  <div class="Dd_2"></div>
										  <div class="Dd_3"></div>
									  </dd>
								  </dl>
							  </td>
					  
						</tr>
						<tr>
						  <td colspan="8" style=" height:25px;">&nbsp;</td>
						</tr>
						<tr>
							  <td width="32%">
								  <dl class="dl_2">
									  <dt>
										  <div class="Dt_1">交易统计</div>
										  <div class="Dt_3"></div>
									  </dt>
									  <form id="search_form" action="<?php echo U('Main/index');?>" method="POST">
									  <table id="dbTable" class="ipList" width="100%" border="0" cellspacing="0" cellpadding="0">
										   <tbody>
											  <tr class="td1" >
												  <td colspan="2" style="text-align: left;">
												  日期从:
												  <input name="start" value="<?php echo ($start); ?>" type="text" class="V_input1" style="width:128px;" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" />至
												  <input name="end" value="<?php echo ($end); ?>" type="text" class="V_input1" style="width:128px;" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" />							
												  <input type="submit" name="" value="搜索" class="Annkeld1">
												  <input type="button" onclick="searchqk()" value="清空条件" class="Annkeld1"/>
												  </td>
											  </tr>
											  <tr class="td1" >
												  <td>产品类型</td>
												  <td>交易金额(元)</td>
											  </tr>
											  <?php if(is_array($productData)): foreach($productData as $k=>$vo): ?><tr class="td1" >
												  <td><?php echo ($vo["product_name"]); ?></td>
												  <td><?php echo ((isset($vo["total"]) && ($vo["total"] !== ""))?($vo["total"]):'0'); ?></td>
											  </tr><?php endforeach; endif; ?>	
										   </tbody>
									  </table>
									  </form>
								  </dl>			
							  </td>
						</tr>
						
					  </table>
		</td>
		<td>&nbsp;</td>
		<td valign="top">
			<table class="Index_card">
					<tr>
							<td style="width:65px;"><div class="em Money"></div></td>
							<td width="225" align="left">
									<div class="Contact">
										<dl class="overflow-visible">
											<dt class="overflow-visible">
												<div id="ctl00_ContentPlaceHolder1_nameclass" class="Ti auth-state-pass-personal">
													<span class="abbr">
														<span class="color_fei">Hi, </span>
														<span class="color_shenn"><?php echo ($userData["truename"]); ?></span>
						
														<span class="auth-show">
														  <span class="auth-icon auth-icon-v">
															<span class="auth-tip">
															  <span class="auth-tip-content">
																<span class="auth-tip-ok"><a href="/user/verify/" title="您还没有进行实名认证">立即认证！</a></span>
															  </span>
															  <span class="auth-tip-corner"><span class="auth-tip-corner-inner"></span></span>
															</span>
															<a href="/user/realname/" class="auth-icon-v-link" title="已认证，认证类型：个人" ></a>
														  </span>
														 
												</span>
												<span class="auth-btn"><a href="/user/realname/" class="Annkeld">立即认证</a></span>
												</div>
												<div class="Bz"><span class="ju">用户名:&nbsp;&nbsp;&nbsp;<span class="color_ju"><?php echo ($userData["user_name"]); ?></span></div>
											</dt>
											<dd>
												<ul class="aul">
													<li>安全手机：<span id="ctl00_ContentPlaceHolder1_classshouji" class="color_ju"><?php echo ($userData["mobile"]); ?></span><a href="<?php echo U('Acount/realname');?>" class="Mleft20 color_tiann">修改</a></li>
													<!-- <li class="a">安全邮箱：<span id="ctl00_ContentPlaceHolder1_classemail" class="color_ju">已绑定</span><a href="/user/email/" id="ctl00_ContentPlaceHolder1_linemail" class="Mleft20 color_tiann">修改</a></li> -->
													 <li class="b">实名认证：<span id="ctl00_ContentPlaceHolder1_shiming" class="color_ju">已认证</span><a href="<?php echo U('Acount/realname');?>" class="Mleft20 color_tiann">修改</a></li> 
													<!-- <li class="c">提现密码：<span id="ctl00_ContentPlaceHolder1_classtixian" class="color_ju">已设置</span><a href="/user/awalpassword/" id="ctl00_ContentPlaceHolder1_lintixian" class="Mleft20 color_tiann">修改</a></li> -->
												</ul>
											</dd>
										</dl>
									</div>
								</td>
					</tr>
					<tr>
							<td colspan="8" style=" height:25px;">&nbsp;</td>
						  </tr>
					<tr>
							<td style="width:65px;"><div class="em"></div></td>
				
							<td width="225" align="left">
								<div class="Contact">
									<dl>
										<dt>
											<div class="Ti change">
												<span class="abbr" >今日成功收款总额(除手续费)<span class="color_ju"><?php echo ((isset($total) && ($total !== ""))?($total):"0.00"); ?></span>元 ,</span>
											</div>
											 <div class="Ti change">
												<span class="abbr" >可提现余额<span class="color_ju"><?php echo ($userData["balance"]); ?></span>元</span>
												<span class="ju"><a href="<?php echo U('Draw/add');?>" class="Annkele">提 现</a></span></span>
											</div>
										</dt>
										<dd>
											<ul class="bul Mtop20">
												<li><a href="<?php echo U('Draw/add');?>">提现</a></li>
												<li><a href="<?php echo U('Acount/realname');?>">提现账户</a></li>
											</ul>
											<div class="Scfdh0"></div>
											<ul class="bul">
												<li><a href="<?php echo U('Jiesuan/lst');?>">结算记录</a></li>
												<li><a href="<?php echo U('Draw/lst');?>">提现记录</a></li>
											</ul>
										</dd>
									</dl>
								</div>
							</td>
					</tr>
			</table>
		</td>
	</tr>
</table>

<!--结束-->

			<!--结束-->
		</td>
	</tr>
</table>
</body>
<script>  
var timestamp = Date.parse(new Date());
$.ajax({
            type:'post',
            url:"<?php echo U('Admin/Main/login_task_ajax');?>",
            data:{timestamp:timestamp},
            timeout : 100000000, //超时时间设置，单位毫秒
            success:function(){
                // 执行定时任务
            }
        });    
</script> 
<script type="text/javascript">  
$("#ctl00_logout").click(function () {  
	$.post("<?php echo U('Home/Index/login_out');?>",function(result){
		if(result.status=='1'){
			layer.alert(result.info,{
			   icon: 1,
			   closeBtn: 0,
			   btn: ['确定'],
			   yes: function(index){
				 //window.location.reload();
				 window.location.href = result.url;
			   }
			});	
		}else{
			layer.alert(result.info, {icon: 2});
		}
	});
}); 
</script>
</html>