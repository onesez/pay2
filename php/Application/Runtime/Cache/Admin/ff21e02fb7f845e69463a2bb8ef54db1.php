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
			
<link href="/pay2/Public/admin/skin/user/Css/withdrawal_apply.css" rel="stylesheet" type="text/css" media="screen,projection" />
<div class="title02">申请提现</div>
    <form id="rzform">
        <table class="V_tb2">
          <tr class="td1">
            <th>申请日期：</th>
            <td><input type="text" name="addtime" class="V_input3" value="<?php echo ($addtime); ?>" onclick="laydate({istime: true, format: 'YYYY-MM-DD'})"/></td>
          </tr>
          <tr class="td1">
            <th>提现金额：</th>
            <td>
			<input id="amount" type="text" name="amount" class="V_input3" onkeyup="value=value.replace(/[^\d\.]/g,'');total();"/>元
			</td>
          </tr>		  
          <tr class="td1">
            <th>收款人姓名：</th>
            <td>
				<input type="text" name="bank_account" class="V_input3" value="<?php echo ($userData["truename"]); ?>"/>
			</td>
          </tr>
          <tr class="td1">
            <th>收款人卡号：</th>
            <td>
				<input type="text" name="bank_card_num" class="V_input3"/>
			</td>
          </tr>
          <tr class="td1">
            <th>收款开户行：</th>
            <td>
				<select name="bank" class="layui-input" style="display:block;">
					<option value="">请选择</option>
					<?php if(is_array($bankList)): foreach($bankList as $key=>$v): ?><option value="<?php echo ($v["bankname"]); ?>"><?php echo ($v["bankname"]); ?></option><?php endforeach; endif; ?>								
				</select>			
			</td>
          </tr>
<!--           <tr class="td1">
            <th>银行代号：</th>
            <td><input type="text" name="mobile" class="V_input3"/></td>
          </tr>
          <tr class="td1">
            <th>联行号：</th>
            <td>
				<input type="text" name="mobile" class="V_input3"/>
				<a href="https://www.hebbank.com/corporbank/otherBankQueryWeb.do" target="_blank">点击查询</a>
			</td>
          </tr> -->
          <tr class="td1">
            <th>申请商户id：</th>
            <td>
				<input type="text" name="txshanghuid" class="V_input3" value="<?php echo ($userData["user_name"]); ?>" disabled="disabled"/>
			</td>
          </tr>
          <tr class="td1">
            <th>申请商户名称：</th>
            <td>
				<input type="text" name="txshanghumc" class="V_input3" value="<?php echo ($userData["company_name"]); ?>" disabled="disabled"/>
			</td>
          </tr>
          <tr class="td1">
            <th>申请人姓名：</th>
            <td>
				<input type="text" name="user_name" class="V_input3" value="<?php echo ($userData["truename"]); ?>" disabled="disabled"/>
			</td>
          </tr>
          <tr class="td1">
            <th>申请人手机：</th>
            <td><input type="text" name="mobile" class="V_input3" value="<?php echo ($userData["mobile"]); ?>"/></td>
          </tr>		  
          <tr class="td1" style="height: 150px;">
            <th>备注留言：</th>
            <td>
				<textarea name="remark" cols="" rows="" style="width: 50%;height: 175px;margin: 10px 0 10px 0;"></textarea>			
			</td>
          </tr>
          <tr class="td1">
            <th></th>
            <td>
			<button id="btnSubmit" class="V_btn4 submit ajaxSubmit_apply">确认申请</button>
			<span id="tips" style="font-size: 12px;color: red;"></span>
			</td>
          </tr>
        </table>
</form>
<script type="text/javascript">  
function total(){
	//var amount = $('#amount').val();
	//var realjine = amount-2;
	var checkurl = "<?php echo U('Tixian/ajaxCanDraw');?>";
	$.ajax({  
		type: "post",  
		url: checkurl, 
		dataType: 'json',		
		//data: $("#frmUserInfo").serialize(),  
		success: function (result) { 
			if(result.status==0){
				$("#btnSubmit").attr({ disabled: "disabled" });	
				$("#btnSubmit").css("background-color", "#868583");
				$("#btnSubmit").css("cursor", "default");
				$('#tips').html('系统核账期间,暂停出金!');	
			}else{
			    $("#btnSubmit").removeAttr("disabled");
				$("#btnSubmit").css("background-color", "#ff8400");	
				$("#btnSubmit").css("cursor", "pointer");				
			}
		}  
	});
}
</script>
<script type="text/javascript" src="/pay2/Public/js/jquery.form.js"></script>
<script type="text/javascript">  
	$(function () {  
		var ajaxurl="<?php echo U('Tixian/add');?>";
		$("#btnSubmit").click(function () { 
				$('#rzform').ajaxForm({  
					type: "post",  
					url: ajaxurl,
					dataType: 'json',  
					beforeSend:function(result){ 
						$("#btnSubmit").attr({ disabled: "disabled" });
						//index = layer.load();	
						index = layer.msg('提交中...', {icon: 16,shade: [0.5, '#f5f5f5'], time:20000}) ;						
					}, 					
					success: function (result) {  
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
							//alert(result.info);
							//layer.alert(result.info, {icon: 1});
							//window.location.href = result.url;
						}else{
							layer.alert(result.info, {icon: 2});
						}
					},
					complete: function () {
						$("#btnSubmit").removeAttr("disabled");
						layer.close(index);
					}					
				});
		});  
	});  
</script>

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