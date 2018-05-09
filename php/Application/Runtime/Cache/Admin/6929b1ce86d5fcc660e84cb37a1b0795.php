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
						<li><a class="messHov" href="<?php echo U('Notice/lst');?>">站内公告</a></li>
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
        <div class="title02">交易列表</div>
		<form id="search_form" action="<?php echo U('Order/lst');?>" method="POST">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="V_tb2">
				<tr >
					<td>
						日期从:
						<input name="start" value="<?php echo ($start); ?>" type="text" class="V_input1" style="width:128px;" size="12" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" />至:<input name="end" value="<?php echo ($end); ?>" type="text" class="V_input1" style="width:128px;" size="12" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" />
						交易金额:
						<input name="totalstart" value="<?php echo ($totalstart); ?>" type="text" class="V_input1" style="width:80px;"/>至:<input name="totalend" value="<?php echo ($totalend); ?>" type="text" class="V_input1" style="width:80px;"/>
						<div class="clear:both;"></div>
						&nbsp;商家订单号:
						<label><input name="pay_order_id" type="text" class="V_input1" value="<?php echo ($pay_order_id); ?>"/></label>
						&nbsp;系统订单号:
						<label><input name="order_num" type="text" class="V_input1" value="<?php echo ($order_num); ?>"/></label>
						&nbsp;商户ID:
						<label><input name="user_id" type="text" class="V_input1" value="<?php echo ($user_id); ?>" /></label>
						&nbsp;产品类型:
						<select name="pay_product" class="V_input1">
							<option selected="selected" value="">所有</option>
							<?php if(is_array($productData)): foreach($productData as $key=>$v): ?><option value="<?php echo ($v["product_name"]); ?>" <?php if($pay_product == $v['product_name']): ?>selected="selected"<?php endif; ?>><?php echo ($v["product_name"]); ?></option><?php endforeach; endif; ?>	
						</select>
						&nbsp;支付状态:
						<select name="pay_state" class="V_input1">
							<option selected="selected" value="">所有</option>
							<option value="1" <?php if($pay_state == '1'): ?>selected="selected"<?php endif; ?>>支付成功</option>
							<option value="2" <?php if($pay_state == '2'): ?>selected="selected"<?php endif; ?>>待支付</option>
						</select>
						&nbsp;结算状态:
						<select name="status" class="V_input1">
							<option selected="selected" value="">所有</option>
							<option value="1" <?php if($status == '1'): ?>selected="selected"<?php endif; ?>>已结算</option>
							<option value="2" <?php if($status == '2'): ?>selected="selected"<?php endif; ?>>待结算</option>
						</select>
						<?php if(($ddprice == '1')): ?>&nbsp;代理商:
						<select name="pay_user" class="V_input1">
							<option value="">所有</option>
							<?php if(is_array($dailiData)): foreach($dailiData as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>" <?php if($pay_user == $vo['id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo["truename"]); ?></option><?php endforeach; endif; ?>								
						</select><?php endif; ?>						
						&nbsp;
							<div class="clear:both;"></div>
							<input type="submit" name="" value="搜索" class="Annkeld1"/>
							<input type="button" onclick="searchqk()" value="清空条件" class="Annkeld1"/>
							<a class="Annkeld1" href="<?php echo U('Order/expOrder');?>">导出查询结果</a>						
					</td>
				</tr>
			</table>
		</form>	
        </div>
        <div class="block04">
            <table id="dbTable" class="ipList" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="title">
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
					<td>产品类型</td>
					<?php if(($dls == '1')): ?><td>代理费率(‰)</td>					
					<td>代理佣金(元)</td><?php endif; ?> 					
					<?php if(($ddprice == '1')): ?><td>通道名称</td>					
					<td>成本费率(‰)</td>
					<td>成本手续费(元)</td>
					<td>所属代理商</td>					
					<td>代理费率(‰)</td>					
					<td>代理佣金(元)</td>					
					<td>三方应结算金额</td>
					<td>单笔利润</td>
					<td style="width: 65px;">操作</td><?php endif; ?> 
                </tr>
				<tbody id="check_list">
				<?php if(is_array($memberlist)): foreach($memberlist as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>" class="td1">
					<td><?php echo (date('Y-m-d H:i:s',$vo['pay_date']?$vo['pay_date']:'')); ?></td>
					<td><a href="<?php echo U('Member/detail',array('user_name'=>$vo['user_id']));?>" style="background-color: #9e9d9c;"><?php echo ($vo["user_id"]); ?></a></td>
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
					<td><?php echo ($vo["pay_product"]); ?></td>
					<?php if(($dls == '1')): ?><td><?php echo ($vo["pay_company_rote"]); ?></td>					
					<td><?php echo ($vo["pay_user_commission"]); ?></td><?php endif; ?> 
					<?php if(($ddprice == '1')): ?><td><?php echo ($vo["pay_platform_name"]); ?></td>					
					<td><?php echo ($vo["pay_platform_rote"]); ?></td>
					<td><?php echo ($vo["pay_platform_fee"]); ?></td>
					<td><?php echo ((isset($vo["parent_name"]) && ($vo["parent_name"] !== ""))?($vo["parent_name"]):'暂无'); ?></td>					
					<td><?php echo ($vo["pay_company_rote"]); ?></td>					
					<td><?php echo ($vo["pay_user_commission"]); ?></td>					
					<td><?php echo ($vo["pay_to_boss"]); ?></td>
					<td><?php echo ($vo["profit"]); ?></td>
					<td>
					     <a class="smallbtn" onclick="closelist(this)" data-url="<?php echo U('Order/bjs');?>" data-id="<?php echo ($vo["id"]); ?>">补结</a>
					     <a class="smallbtn" href="javascript:;" onclick="bd('<?php echo U('Order/bd',array('id'=>$vo['id']));?>')">补单</a>
					     <a class="smallbtn" onclick="closelist(this)" data-url="<?php echo U('Order/tuik');?>" data-id="<?php echo ($vo["id"]); ?>">标记退款</a>
					</td><?php endif; ?> 
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
					<td><?php echo ($total1); ?></td>					
					<td></td>
					<td><?php echo ($total2); ?></td>
					<td><?php echo ($total3); ?></td>
					<td></td>
					<?php if(($dls == '1')): ?><td></td>					
					<td><?php echo ($total7); ?></td><?php endif; ?> 
					<?php if(($ddprice == '1')): ?><td></td>					
					<td></td>
					<td><?php echo ($total4); ?></td>
					<td></td>					
					<td></td>					
					<td><?php echo ($total7); ?></td>					
					<td><?php echo ($total5); ?></td>
					<td><?php echo ($total6); ?></td>
					<td>
					</td><?php endif; ?> 					
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
		<div class="pagelist">
			<div id="PageContent" class="scott"><?php echo ($page); ?></div>
		</div>
<script>
	var ajaxurl="<?php echo U('Order/expOrder');?>";
	$("#check_all").click(function(){ 
		$.ajax({  
			type: "post",  
			url: ajaxurl,  
			data: $("#frmUserInfo").serialize(),  
			success: function (result) { 
				if(result.status=='1'){					
					layer.alert(result.info,{
					   icon: 1,
					   closeBtn: 0,
					   btn: ['确定'],
					   yes: function(index){
						 window.parent.location.reload(); //刷新父页面
						 //window.location.reload();
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
	});
</script>
<script>
function closelist(obj){
	layer.confirm('确认操作？', {
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
				}
			})
		}
	);
}
</script>
<script language="javascript">
function bd(url){
	layer.open({
		type: 2,
		title: '补单',
		//shadeClose: true,
		shade: 0.8,
		area: ['40%', '60%'],
		content: url //iframe的url
	}); 
}
</script>
<script>
$(function(){
    $("#dbTable tr ").dblclick(function() {
		//alert($(this).attr('id'));
		var tar_id = $(this).attr('id');
		var tar_url="<?php echo U('Order/detail');?>?id="+tar_id;	
		window.location.href = tar_url;
    });
})
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