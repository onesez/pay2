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
			
<style>
.list ul{ list-style:none; padding:0px; margin:0px; width:350px;
height:30px; line-height:30px; border:1px solid #c3c3c3;
border-top:0px; font-size:12px;}
.list ul li{ display:block; width:50%; float:left;text-indent:2em}
</style>
<script type="text/javascript" src="/pay2/Public/js/myAjax.js"></script>
        <div class="title02">提现记录</div>
		<form id="search_form" action="<?php echo U('Tixian/lst');?>" method="POST">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="V_tb2">
				<tr >
					<td>
						申请日期从:
						<input name="start" value="<?php echo ($start); ?>" type="text" class="V_input1" style="width:128px;" size="12" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" />至:<input name="end" value="<?php echo ($end); ?>" type="text" class="V_input1" style="width:128px;" size="12" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" />
						支付日期从:
						<input name="zfstart" value="<?php echo ($zfstart); ?>" type="text" class="V_input1" style="width:128px;" size="12" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" />至:<input name="zfend" value="<?php echo ($zfend); ?>" type="text" class="V_input1" style="width:128px;" size="12" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" />						
                                                <div class="clear:both;"></div>
                                                &nbsp;提现单号:
						<label><input name="order_num" type="text" class="V_input1" value="<?php echo ($order_num); ?>"/></label>
						&nbsp;代付流水号:
						<label><input name="order_num" type="text" class="V_input1" value="<?php echo ($order_num); ?>"/></label>
						&nbsp;代付通道:
						<label><input name="platform" type="text" class="V_input1" value="<?php echo ($platform); ?>"/></label>
						&nbsp;申请商户id:
						<label><input name="user_name" type="text" class="V_input1" value="<?php echo ($user_name); ?>"/></label>
						<div class="clear:both;"></div>
						&nbsp;申请商户名称:
						<label><input name="company_name" type="text" class="V_input1" value="<?php echo ($company_name); ?>"/></label>
						&nbsp;申请人姓名:
						<label><input name="user_name" type="text" class="V_input1" value="<?php echo ($user_name); ?>"/></label>
						&nbsp;开户名:
						<label><input name="bank_account" type="text" class="V_input1" value="<?php echo ($bank_account); ?>"/></label>
						&nbsp;商户流水号:
						<label><input name="detailid" type="text" class="V_input1" value="<?php echo ($detailid); ?>"/></label>
						&nbsp;提现状态:
						<select name="status" class="V_input1">
							<option selected="selected" value="">所有</option>
							<option value="待处理" <?php if($status == '待处理'): ?>selected="selected"<?php endif; ?>>待处理</option>
							<option value="被拒绝" <?php if($status == '被拒绝'): ?>selected="selected"<?php endif; ?>>被拒绝</option>
							<option value="已支付" <?php if($status == '已支付'): ?>selected="selected"<?php endif; ?>>已支付</option>
						</select>
						&nbsp;复核状态:
						<select name="success_state" class="V_input1">
							<option selected="selected" value="">所有</option>
							<option value="待复核" <?php if($success_state == '待复核'): ?>selected="selected"<?php endif; ?>>待复核</option>
							<option value="已复核" <?php if($success_state == '已复核'): ?>selected="selected"<?php endif; ?>>已复核</option>
						</select>
						&nbsp;复核结果:
						<select name="success_result" class="V_input1">
							<option selected="selected" value="">所有</option>
							<option value="代付成功" <?php if($success_result == '代付成功'): ?>selected="selected"<?php endif; ?>>代付成功</option>
							<option value="代付失败" <?php if($success_result == '代付失败'): ?>selected="selected"<?php endif; ?>>代付失败</option>
						</select>						
						&nbsp;
						<div class="clear:both;"></div>
							<input type="submit" name="" value="搜索" class="Annkeld1"/>
							<input type="button" onclick="searchqk()" value="清空条件" class="Annkeld1"/>
							<a class="Annkeld1" href="<?php echo U('Tixian/expTixian');?>">导出搜索结果</a>
					</td>
				</tr>
			</table>
		</form>	
        </div>
        <div class="block04">
            <table id="dbTable" class="ipList" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="title">
                    <!-- <td width="20" class="icon"><input id="check_all" type="checkbox" name="del_system[]" value=""></td> -->
                    <td>申请日期</td>
                    <td>提现单号</td>
                    <td>申请商户id</td>
                    <!-- <td>申请商户名称</td> -->
                    <td>申请人姓名</td>
                    <!-- <td>申请人手机</td> -->
                    <td>开户名</td>
                    <td>银行名称</td>
                    <td>银行帐号</td>
                    <td>提现金额(元)</td>
                    <td>提现手续费(元)</td>
                    <td>提现状态</td>
                    <td>拒绝原因</td>
					<?php if(($txcz == '1')): ?><td>操作</td><?php endif; ?>
                    <td>支付时间</td>
                    <td>代付流水号</td>
                    <td>商户流水号</td>
                    <td>复核状态</td>
                    <td>复核时间</td>
                    <td>复核结果</td>
                    <td>复核金额(元)</td>
					<?php if(($dftd == '1')): ?><td>代付通道</td><?php endif; ?>
					<td>备注</td>
                </tr>
				<tbody id="check_list">
				<?php if(is_array($memberlist)): foreach($memberlist as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>" class="td1">
                    <!-- <td width="20" class="icon"><input type="checkbox" name="del_system[]" value="<?php echo ($vo["id"]); ?>" ></td> -->
					<td><?php echo (date('Y-m-d H:i:s',$vo['addtime']?$vo['addtime']:'')); ?></td>
					<td><?php echo ((isset($vo["order_num"]) && ($vo["order_num"] !== ""))?($vo["order_num"]):'暂无'); ?></td>
					<td>
						<div onmouseover="MM_over(this)" onmouseout="MM_out(this)" data-id="<?php echo ($vo["id"]); ?>" data-bh="<?php echo ($vo["ddbianhao"]); ?>" style="position: relative;display: initial;padding: 20px;">
							<?php echo ((isset($vo["txshanghu"]) && ($vo["txshanghu"] !== ""))?($vo["txshanghu"]):'暂无'); ?>
							<div class="jyinfostxx" style="display: none; position: absolute; z-index: 9999;">
								<div id="zd_div<?php echo ($vo["id"]); ?>" style="background-color: #a0a7a7;"></div><!--返回运费明细-->
							</div>
						</div>
					</td>
					<!-- <td><?php echo ((isset($vo["company_name"]) && ($vo["company_name"] !== ""))?($vo["company_name"]):'暂无'); ?></td> -->
					<td><?php echo ($vo["user_name"]); ?></td>
					<!-- <td><?php echo ($vo["mobile"]); ?></td> -->
					<td><?php echo ($vo["bank_account"]); ?></td>
					<td><?php echo ($vo["bank"]); ?></td>
					<td><?php echo ($vo["bank_card_num"]); ?></td>
					<td><?php echo ($vo["amount"]); ?></td>
					<td>2</td>
					<td><?php echo ($vo["status"]); ?></td>
					<td><?php echo (msubstr($vo["reason"],0,8,'utf-8',true)); ?></td>
 					<?php if(($txcz == '1')): ?><td>
						<?php if(($vo['status'] != '被拒绝') and ($vo['status'] != '已支付')): ?><a class="smallbtn" href="javascript:;" onclick="pass('<?php echo U('Tixian/pass',array('id'=>$vo['id']));?>')">处理</a>
					    <a class="smallbtn" href="<?php echo U('Tixian/daifu',array('id'=>$vo['id']));?>" >代付</a><?php endif; ?>
						
						<?php if(($vo['status'] != '被拒绝')): ?><a class="smallbtn" onclick="verify(this)" data-url="<?php echo U('Tixian/verify');?>" data-id="<?php echo ($vo["id"]); ?>">复核</a>	
							<?php if(($vo['success_result'] == '代付失败') and ($vo['fail_state'] != '1')): ?><a class="smallbtn" onclick="reject(this)" data-url="<?php echo U('Tixian/reject');?>" data-id="<?php echo ($vo["id"]); ?>">退汇</a><?php endif; endif; ?>
					</td><?php endif; ?>					
					<td><?php echo (date('Y-m-d H:i:s',$vo['pay_time']?$vo['pay_time']:'')); ?></td>			
					<td><?php echo ($vo["order_num"]); ?></td>
					<td><?php echo ($vo["detailid"]); ?></td>
					<td><?php echo ($vo["success_state"]); ?></td>
					<td><?php echo (date('Y-m-d H:i:s',$vo['success_pay_time']?$vo['success_pay_time']:'')); ?></td>
					<td>
					<?php if($vo['success_result'] == '代付失败'): ?><p style="color: #de0e0e;font-weight: 600;">代付失败</p>
					<?php else: ?>
						<?php echo ($vo["success_result"]); endif; ?>
					</td>
					<td><?php echo ($vo["fail_amount"]); ?></td>
					<?php if(($dftd == '1')): ?><td><?php echo ($vo["platform"]); ?></td><?php endif; ?>
					<td><?php echo (msubstr($vo["remark"],0,8,'utf-8',true)); ?></td>
 
                </tr><?php endforeach; endif; ?>
	            <tr class="td1">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo ($total1); ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
                </tr>				
				</tbody>				
            </table>
        </div>
		<div style="clear: both;"></div>
		<div class="pagelist">
			<div id="PageContent" class="scott"><?php echo ($page); ?></div>
		</div>
<script type="text/javascript">
	function MM_over(mmObj) {
	var mSubObj = mmObj.getElementsByClassName("jyinfostxx")[0];
	var zd_id =$(mmObj).attr('data-id');
	toDiv(zd_id);
	mSubObj.style.display = "block";
}
function MM_out(mmObj) {
	var mSubObj = mmObj.getElementsByClassName("jyinfostxx")[0];
	mSubObj.style.display = "none";
	
}
</script>
<script type="text/javascript">
function verify(obj){
    var txid = $(obj).attr('data-id');
    var ajaxurl = $(obj).attr('data-url');
	$.ajax({
		url: ajaxurl,
		data : {txid:txid},
		dataType: "json",  
		success: function (data) {	
		var res = '代付查询状态:【'+data.desc+'】</br>代付实际金额:【'+data.money+'元】';
			layer.alert(res,{
			   icon: 1,
			   closeBtn: 0,
			   btn: ['确定'],
			   yes: function(index){
				 window.location.reload();
				 //window.location.href = result.url;
			   }
			});
	    }
	});
}
</script>
<script type="text/javascript">
function reject(obj){
    var txid = $(obj).attr('data-id');
    var ajaxurl = $(obj).attr('data-url');
	$.ajax({
		url: ajaxurl,
		data : {txid:txid},
		dataType: "json",  
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
	});
}
</script>
<script type="text/javascript">
function toDiv(zd_id){
	//alert(zd_id);return false;
	var ajaxurl="<?php echo U('Tixian/tajax');?>";
	$.ajax({
		url: ajaxurl,
		data : {id:zd_id},
		dataType: "json",  
		success: function (data) {
			//console.log(data);return false;
				if(data.length=='0'){
					//document.getElementById('container').innerHTML='暂无数据';
					$('#zd_div'+zd_id).html('暂无数据');				
				}else{
					re = '';
						re+='<div class="list">'+
							'<ul>'+
								'<li>历史总收款(除手续费)金额：</li>'+
								'<li>'+data.payTotal+'</li>'+										
							'</ul>'+
							'<ul>'+
								'<li>历史已结算金额：</li>'+
								'<li>'+data.jsTotal+'</li>'+										
							'</ul>'+
							'<ul>'+
								'<li>历史待结算金额：</li>'+
								'<li>'+data.nojsTotal+'</li>'+										
							'</ul>'+
							'<ul>'+
								'<li>提现已支付金额：</li>'+
								'<li>'+data.txTotal+'</li>'+										
							'</ul>'+
							'<ul>'+
								'<li>提现待处理金额：</li>'+
								'<li>'+data.pretxTotal+'</li>'+										
							'</ul>'+
							'<ul>'+
								'<li>理论账户最大余额(总收款-总支付)：</li>'+
								'<li>'+data.maxTotal+'</li>'+	
							'</ul>'+
							'<ul>'+
								'<li>理论账户余额(总结算-总支付-待处理)：</li>'+
								'<li>'+data.realTotal+'</li>'+	
							'</ul>'+
							'<ul>'+
								'<li>实际余额：</li>'+
								'<li>'+data.real_balance+'</li>'+
							'</ul>'+
						'</div>';			
					$('#zd_div'+zd_id).html(re);
					//$('#zd_div'+zd_id).html(re);
				}
			}
		});
}
</script>
<script language="javascript">
function pass(url){
	layer.open({
		type: 2,
		title: '提现审核',
		//shadeClose: true,
		shade: 0.8,
		area: ['40%', '60%'],
		content: url //iframe的url
	}); 
}
</script>
<script language="javascript">
function pay_ok(obj){
	layer.confirm('确认标记支付？', {
		  btn: ['确定','取消'] //按钮
		}, function(){
			$.ajax({
				type : 'post',
				url : $(obj).attr('data-url'),
				data : {act:'del',id:$(obj).attr('data-id')},
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
<script>
$(function(){
    $("#dbTable tr ").dblclick(function() {
		//alert($(this).attr('id'));
		var tar_id = $(this).attr('id');
		var tar_url="<?php echo U('Tixian/detail');?>?id="+tar_id;	
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