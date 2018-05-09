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
			
<style>
.table-td{ 
	float: left;
    padding: 10px;
    border: 1px solid #e0e0e0;
    margin-right: 5px;
    background: #e4e4e4;
    margin-bottom: 10px;
    min-height: 460px;
} 
.table-bottom{ 
    border-bottom: 1px solid #ffffff;
    margin-bottom: 10px;
    line-height: 30px;
} 
.table-d table{ 
	border: 1px solid #eee;
	text-align: center;
	margin-bottom: 10px;
} 
.table-d table tr{
	line-height: 36px;
}
 .table-d table td{
	border: 1px solid #eee;
	line-height: 36px;
	padding-left: 0px;
}
 .V_input{
    width: 95px;
	height: 28px;
    line-height: 28px;
    color: #545454;
    border: 1px solid #dedede;
    margin: 5px;
} 
</style>
<link href="/pay2/Public/admin/skin/user/Css/withdrawal_apply.css" rel="stylesheet" type="text/css" media="screen,projection" />
<div class="title02">配置通道</div>
		<form id="rzform">
			<input type="hidden" name="user_id" value="<?php echo ($userData["id"]); ?>" class="V_input"/>
			<input type="hidden" name="user_id" value="<?php echo ($dailiUser["id"]); ?>" class="V_input"/>
			<table class="V_tb2">
			  <tr class="td1">
				<th>此用户所属上级代理：</th>
				<td>
					<input type="text" name="period" class="V_input3" value="<?php echo ((isset($dailiUser["truename"]) && ($dailiUser["truename"] !== ""))?($dailiUser["truename"]):'暂无'); ?>"/>	
				</td>
			  </tr>			  
			  <tr class="td1">
				<th>通道选择：</th>
				<td>
					<select name="platform_id" class="layui-input" style="display:block;" onchange="slectTd(this)">
						<option value="">请选择</option>
						<?php if(is_array($platformInfo)): foreach($platformInfo as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["platform"]); ?></option><?php endforeach; endif; ?>								
					</select>			
				</td>
			  </tr>
			  <tr class="td1">
				<th>结算属性：</th>
				<td>
					<input id="period" type="text" name="period" class="V_input3"/>	
				</td>
			  </tr>			  
			  <tr class="td1">
				<th>附属产品：</th>
				<td style="padding-top: 10px;">
					<div class="table-d" style="margin-top: 10px;">
						<table id="dataTbody" class="table table-bordered table-striped dataTable">
							<tr style="background: #b4b7b7;">
								<td style="width: 30%;">产品名称</td>
								<td style="width: 20%;">成本费率(‰)</td>
								<td>代理费率(‰)</td>
								<td>销售费率(‰)</td>
								<td>结算周期(天)</td>
							</tr>
						</table>
						<span style="font-size: 12px;color: red;line-height: 25px;display:none;">*若千3则填3,若接口商无此产品则保留为空</span>
					</div>	
				</td>
			  </tr>
			  <tr class="td1">
				<th></th>
				<td>
				<button id="btnSubmit" class="V_btn4 submit ajaxSubmit_apply">确认配置</button>
				</td>
			  </tr>
			</table>
		</form>
		<form id="rzformA">
			<input type="hidden" name="user_id" value="<?php echo ($userData["id"]); ?>" class="V_input">
			<table class="V_tb2">
				  <tr class="td1">
					<th>产品指定：</th>
					<td>
						<table class="table table-bordered table-striped dataTable" style="width: 100%;">
							<tbody id="checkAll">						
							<?php if(is_array($productList)): foreach($productList as $k=>$vo): ?><tr style="line-height: 40px;">
										<td class="title left" style="padding-right:50px;">
											<b style="color: #000;"><?php echo ($vo["product_name"]); ?></b>
										</td>
									</tr>
									<tr>
										<td>
											<ul class="check_list" id="checkList_<?php echo ($k); ?>" >										
											<?php if(is_array($vo["info"])): foreach($vo["info"] as $kk=>$vv): ?><li>
												<!-- <input type="checkbox" name="rules[]" value="<?php echo ($vv["id"]); ?>"/> -->
												<input type="radio" name="is_use_<?php echo ($vo["id"]); ?>" value="<?php echo ($vv["id"]); ?>" <?php if($vv['is_use'] == '1'): ?>checked<?php endif; ?>/>
												<?php echo ($vv["platform_name"]); ?>
												</li><?php endforeach; endif; ?>
											<div class="clear-both"></div>
											</ul>
										</td>
									</tr><?php endforeach; endif; ?>
							</tbody>
						 </table>
					</td>
				  </tr>
				  <tr class="td1">
					<th></th>
					<td>
					<button id="btnSubmitA" class="V_btn4 submit ajaxSubmit_apply">确认选择</button>
					</td>
				  </tr>	
			</table>
		</form>
		<table class="V_tb2">		
          <tr class="td1">
            <th>此用户当前费率信息：</th>
				<td style="padding: 10px;">
					<div class="table-d">
					   <?php if(is_array($platformList)): foreach($platformList as $key=>$vo): if(!empty($vo["rate"])): ?><div class="table-td">
					        <div class="table-bottom">
							通道名称：<?php echo ($vo["platform_name"]); ?>	
							</div>							
							<table class="table table-bordered table-striped dataTable">
								<tr style="background: #b4b7b7;">
									<td>通道名称</td>
									<td>产品名称</td>
									<td>成本费率</td>
									<td>代理费率</td>
									<td>销售费率</td>
									<td>结算周期(天)</td>
								</tr>
								<?php if(is_array($vo['rate'])): foreach($vo['rate'] as $key=>$rate): ?><tr>
									<td><?php echo ($rate["platform_name"]); ?></td>
									<td><?php echo ($rate["product_name"]); ?></td>
									<td><?php echo ($rate["platform_rote"]); ?>‰</td>
									<td><?php echo ($rate["company_rote"]); ?>‰</td>
									<td><?php echo ($rate["sell_rote"]); ?>‰</td>
									<td><?php echo ($rate["period"]); ?></td>
								</tr><?php endforeach; endif; ?>
							</table>
						</div><?php endif; endforeach; endif; ?>
					</div>
				</td>
          </tr>		
        </table>
<script type="text/javascript">
function slectTd(td){ 
	var tdid = td.value;
	var ajaxUrl = "<?php echo U('Member/tdajax');?>";
    $.getJSON(ajaxUrl,{tdid:tdid},function(res){ 
		//console.log(data);
		$("#dataTbody  tr:not(:first)").empty(""); //清空原有的选项 
		var period = res.draw_mode;
		$("#period").val(period);
		var data = res.info;
		if(data.length==0){
			var tTr ='<tr><td colspan="3">暂无产品</td></tr>';
			$("#dataTbody").append(tTr);
		}else{
			$.each(data,function(index,array){ 
				var tTr="<tr>"+
					"<td>"+array.product_name+"</td>"+
					"<td>"+array.rote+"</td>"+
					"<td>"+
					"<input type='text' name='company_rote[]' value='0' class='V_input'>"+
					"</td>"+
					"<td>"+
					"<input type='text' name='sell_rote[]' value='' class='V_input'>"+
					"</td>"+
					"<td>"+
					"<input type='text' name='period[]' class='V_input'>"+
					"<input type='hidden' name='product_sid[]' value='"+array.product_id+"' class='V_input'>"+
					"<input type='hidden' name='product_name[]' value='"+array.product_name+"' class='V_input'>"+
					"<input type='hidden' name='rote[]' value='"+array.rote+"' class='V_input'>"+
					"</td>"
					"</tr>";
				$("#dataTbody").append(tTr);
			}); 		
		}

		
    }); 
}
</script>
<script type="text/javascript" src="/pay2/Public/js/jquery.form.js"></script>
<script type="text/javascript">  
	$(function () {  
		var ajaxurl="<?php echo U('Member/channel_set');?>";
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
<script type="text/javascript">  
	$(function () {  
		var ajaxurl="<?php echo U('Member/status');?>";
		$("#btnSubmitA").click(function () { 
				$('#rzformA').ajaxForm({  
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