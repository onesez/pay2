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
        <div class="title02">漏结算列表</div>
		<form id="search_form" action="<?php echo U('Order/miss');?>" method="POST">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="V_tb2">
				<tr >
					<td>
						&nbsp;商户ID:
						<label><input name="user_id" type="text" class="V_input1" value="<?php echo ($user_id); ?>" /></label>					
						&nbsp;
							<div class="clear:both;"></div>
							<input type="submit" name="" value="搜索" class="Annkeld1"/>
							<input type="button" onclick="searchqk()" value="清空条件" class="Annkeld1"/>
					</td>
				</tr>
			</table>
		</form>	
        </div>
        <div class="block04">
            <table id="dbTable" class="ipList" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="title">
                    <td width="20" class="icon"><input id="check_all" type="checkbox" name="del_system[]" value=""></td>
					<td>商家订单提交日期</td>
                    <td>商户ID</td>
                    <td>商家订单号</td>
                    <td>商家提交金额</td>
                    <td>系统订单号</td>
                    <td>支付状态</td>
                    <td>成功支付时间</td>
					<td>理论结算时间</td>
                    <td>成功支付金额(元)</td>
					<td>费率(‰)</td>
					<td>手续费(元)</td>
					<td>应结算金额</td>
					<td style="width: 65px;">操作</td>
                </tr>
				<tbody id="check_list">
				<?php if(is_array($memberlist)): foreach($memberlist as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>" class="td1">
                    <td width="20" class="icon">
					<?php if($vo["title"] != '超级管理员'): ?><input type="checkbox" name="del_system[]" value="<?php echo ($vo["id"]); ?>" ><?php endif; ?>	
					</td>				
					<td><?php echo (date('Y-m-d H:i:s',$vo['pay_date']?$vo['pay_date']:'')); ?></td>
					<td><?php echo ($vo["user_id"]); ?></td>
					<td><?php echo ($vo["pay_order_id"]); ?></td>
					<td><?php echo ($vo["pay_amount"]); ?></td>
					<td><?php echo ($vo["order_num"]); ?></td>
					<td><?php echo ($vo['pay_state']==1?'支付成功':'待支付'); ?></td>
					<td><?php echo (date('Y-m-d H:i:s',$vo['pay_time']?$vo['pay_time']:'')); ?></td>
					<td><?php echo (date('Y-m-d H:i:s',$vo['pay_time']?$vo['pay_time']:'')); ?></td>	
					<td><?php echo ($vo["pay_total"]); ?></td>					
					<td><?php echo ($vo["pay_sell_rote"]); ?></td>
					<td><?php echo ($vo["pay_sell_fee"]); ?></td>
					<td><?php echo ($vo["pay_to_member"]); ?></td>
					<td>
					     <a class="smallbtn" onclick="closelist(this)" data-url="<?php echo U('Order/bjs');?>" data-id="<?php echo ($vo["id"]); ?>">补结</a>
					</td>
                </tr><?php endforeach; endif; ?>
                <tr class="td1">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>			
					<td></td>	
					<td></td>					
					<td></td>					
					<td><?php echo ($total1); ?></td>
					<td></td>			
					<td><?php echo ($total2); ?></td>			
					<td><?php echo ($total3); ?></td>					
					<td></td>										
                </tr>				
				</tbody>				
                <!-- 隔行变色 -->
                <script language="JavaScript">
                    $(function() {
                        $(".td1").each(function(i) { this.style.backgroundColor = ['#fff', '#fafafa'][i % 2] })
                    })
                </script>
            </table>
        </div>
		<div style="clear: both;"></div>
		<div style="margin-top: 10px;">
			<a href="javascript:;" id="del_all" >批量补结</a>		
		</div>		
		<div class="pagelist">
			<div id="PageContent" class="scott"><?php echo ($page); ?></div>
		</div>
<script>
	$("#check_all").click(function(){ 
		if(this.checked){   
			$("#check_list :checkbox").prop("checked", true);  
		}else{   
			$("#check_list :checkbox").prop("checked", false);
		}   
	});
</script>
<script>
$("#del_all").click(function(){ 
	var chk_value =[]; 
	$('input[name="del_system[]"]:checked').each(function(){ 
		chk_value.push($(this).val()); 
	});
	if(chk_value==""){
	   layer.alert('请选择补结的项目!', {icon: 2});
	   return false;
	}else{
		layer.confirm('确认补结？', {
			  btn: ['确定','取消'] //按钮
			}, function(){
				var ajaxurl="<?php echo U('Order/bjs_Batch');?>";
				$.ajax({
					type:"POST",
					url:ajaxurl,
					data:{key:chk_value},
					dataType: "json", 
					success: function(result) {
							if(result.status=='1'){					
								layer.alert(result.info,{
								   icon: 1,
								   closeBtn: 0,
								   btn: ['确定'],
								   yes: function(index){
									 window.location.reload();
									 //window.location.href = result.url;
								   }
								});
								//alert(result.info);
								//layer.alert(result.info, {icon: 1});
								//window.location.href = result.url;
							}else{
								layer.alert(result.info, {icon: 2});
							}
						}
				});	
			}
		);

	}		
});
</script>
<script>
function closelist(obj){
	layer.confirm('确认补结算？', {
		  btn: ['确定','取消'] //按钮
		}, function(){
			$.ajax({
				type : 'post',
				url : $(obj).attr('data-url'),
				data : {id:$(obj).attr('data-id')},
				dataType : 'json',
				success : function(result){
					//console.log(result);
					if(result.status=='1'){					
						layer.alert(result.info,{
						   icon: 1,
						   closeBtn: 0,
						   btn: ['确定'],
						   yes: function(index){
							 window.location.reload();
							 //window.location.href = result.url;
						   }
						});
						//alert(result.info);
						//layer.alert(result.info, {icon: 1});
						//window.location.href = result.url;
					}else{
						layer.alert(result.info, {icon: 2});
					}
				}
			})
		}
	);
}
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