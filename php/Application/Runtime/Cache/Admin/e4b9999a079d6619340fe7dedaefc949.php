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
        <div class="title02">客户列表</div>
		<form id="search_form" action="<?php echo U('Member/lst');?>" method="POST">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="V_tb2">
				<tr >
					<td>
					<!--  &nbsp;日期从:
						<input name="ctl00$ContentPlaceHolder1$sdate" type="text" id="ctl00_ContentPlaceHolder1_sdate" class="V_input1" onfocus="HS_setDate(this)" style="width:95px;" size="12" value="2017-07-20" />
						从:<input name="ctl00$ContentPlaceHolder1$edate" type="text" id="ctl00_ContentPlaceHolder1_edate" class="V_input1" onfocus="HS_setDate(this)" style="width:95px;" size="12" value="2017-07-20" />
						&nbsp;类型:
						<select name="ctl00$ContentPlaceHolder1$channelId" id="ctl00_ContentPlaceHolder1_channelId" class="V_input1" style="width:95px;">
							<option selected="selected" value="0">所有通道</option>
							<option value="102">在线银行</option>
							<option value="101">支付宝</option>
							<option value="100">财付通</option>
							<option value="99">微信</option>
						</select>
						&nbsp;状态:
						<select name="ctl00$ContentPlaceHolder1$Success" id="ctl00_ContentPlaceHolder1_Success" class="V_input1" style="width:95px;">
							<option value="0">所有</option>
							<option selected="selected" value="2">成功</option>
							<option value="4">失败</option>
							<option value="1">处理中</option>
						</select>
						&nbsp;下发状态:
						<select name="ctl00$ContentPlaceHolder1$ddlNotifyStatus" id="ctl00_ContentPlaceHolder1_ddlNotifyStatus" class="V_input1" style="width:95px;">
							<option selected="selected" value="所有">所有</option>
							<option value="1">处理中</option>
							<option value="2">已成功</option>
							<option value="4">失败</option>

						</select> -->
						&nbsp;用户名:
						<label><input name="user_name" type="text" class="V_input1" value="<?php echo ($user_name); ?>"/></label>
						&nbsp;真实姓名:
						<label><input name="truename" type="text" class="V_input1" value="<?php echo ($truename); ?>"/></label>
						&nbsp;商户名称:
						<label><input name="company_name" type="text" class="V_input1" value="<?php echo ($company_name); ?>"/></label>
						&nbsp;用户角色:
						<select name="title" class="V_input1">
							<option value="">全部</option>
							<?php if(is_array($roleList)): foreach($roleList as $key=>$v): ?><option value="<?php echo ($v["title"]); ?>" <?php if($title == $v['title']): ?>selected="selected"<?php endif; ?>><?php echo ($v["title"]); ?></option><?php endforeach; endif; ?>	
						</select>
						&nbsp;是否锁定:
						<select name="is_lock" class="V_input1">
							<option value="">全部</option>
							<option value="1" <?php if($is_lock == 1): ?>selected="selected"<?php endif; ?>>锁定</option>
							<option value="2" <?php if($is_lock == 2): ?>selected="selected"<?php endif; ?>>正常</option>
						</select>						
						&nbsp;
							<input type="submit" name="" value="搜索" class="Annkeld1"/>
							<input type="button" onclick="searchqk()" value="清空条件" class="Annkeld1"/>
							<a class="Annkeld1" href="<?php echo U('Member/expClient');?>">导出查询结果</a>
						</label>
					</td>
				</tr>
			</table>
		</form>	
        </div>
        <div class="block04">
            <table id="dbTable" class="ipList" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="title">
                    <td width="20" class="icon"><input id="check_all" type="checkbox" name="del_system[]" value=""></td>
                    <td>用户名</td>
                    <td>商户名称</td>
                    <td>真实姓名</td>
                    <td>手机号码</td>
                    <td>账户余额(元)</td>
                    <td>通道信息</td>
                    <td>入金状态</td>
                    <td>用户角色</td>
                    <td>更多</td>
                    <td>操作</td>
                </tr>
				<tbody id="check_list">
				<?php if(is_array($memberlist)): foreach($memberlist as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>" class="td1">
                    <td width="20" class="icon">
					<?php if($vo["title"] != '超级管理员'): ?><input type="checkbox" name="del_system[]" value="<?php echo ($vo["id"]); ?>" ><?php endif; ?>	
					</td>
					<td>
						<div onmouseover="MM_over(this)" onmouseout="MM_out(this)" data-id="<?php echo ($vo["id"]); ?>" data-bh="<?php echo ($vo["ddbianhao"]); ?>" style="position: relative;display: initial;padding: 20px;">
							<?php echo ((isset($vo["user_name"]) && ($vo["user_name"] !== ""))?($vo["user_name"]):'暂无'); ?>
							<div class="jyinfostxx" style="display: none; position: absolute; z-index: 9999;">
								<div id="zd_div<?php echo ($vo["id"]); ?>" style="background-color: #a0a7a7;"></div><!--返回运费明细-->
							</div>
						</div>
					</td>
					<td><?php echo ($vo["company_name"]); ?></td>
					<td><?php echo ($vo["truename"]); ?></td>
					<td><?php echo ($vo["mobile"]); ?></td>
					<td>
					  <?php echo ($vo["balance"]); ?>
					  <a href="<?php echo U('Member/tiaoz',array('id'=>$vo['id']));?>" class="smallbtn" style="margin-left: 10px;">调账</a>
					</td>
					<td><a href="<?php echo U('Member/channel_set',array('id'=>$vo['id']));?>" class="smallbtn" style="margin-left: 10px;">配置</a></td>
					<td><?php echo ($vo['is_lock']==1?'锁定':'正常'); ?></td>
					<td><?php echo ($vo["title"]); ?></td>
					<td>双击查看</td>
					<td>	
						<?php if($vo["title"] != '超级管理员'): ?><a href="<?php echo U('Member/edit',array('id'=>$vo['id']));?>" class="smallbtn">修改</a>							
							<a class="smallbtn" onclick="delfunc(this)" data-url="<?php echo U('Member/del');?>" data-id="<?php echo ($vo["id"]); ?>">删除</a><?php endif; ?>
					</td>
                </tr><?php endforeach; endif; ?>
                <tr class="title">
                    <td width="20" class="icon"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo ($balanceTotal); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
			<a href="javascript:;" id="del_all" >删除</a>		
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
	   layer.alert('请选择删除的项目!', {icon: 2});
	   return false;
	}else{
		layer.confirm('确认删除？', {
			  btn: ['确定','取消'] //按钮
			}, function(){
				var ajaxurl="<?php echo U('Member/delBatch');?>";
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
				});	
			}
		);

	}		
});
</script>
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
function toDiv(zd_id){
	var ajaxurl="<?php echo U('Member/totalajax');?>";
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
<script>
$(function(){
    $("#dbTable tr ").dblclick(function() {
		//alert($(this).attr('id'));
		var tar_id = $(this).attr('id');
		var tar_url="<?php echo U('Member/detail');?>?id="+tar_id;	
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