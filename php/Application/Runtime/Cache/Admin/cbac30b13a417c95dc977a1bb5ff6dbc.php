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
.table-d table{ 
	border: 1px solid #eee;
    width: 30%;
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
    margin: 5px 5px 5px 0;
} 
</style>
<link href="/pay2/Public/admin/skin/user/Css/withdrawal_apply.css" rel="stylesheet" type="text/css" media="screen,projection" />
<div class="title02">新增用户</div>
    <form id="rzform" enctype="multipart/form-data">
        <table class="V_tb2">
          <tr class="td1">
            <th>用户名：</th>
            <td>
				<input type="text" name="user_name" class="V_input3" id="user_name" value="<?php echo ($user_name); ?>"/>
			</td>
          </tr>
          <tr class="td1">
            <th>用户密码：</th>
            <td><input type="text" name="password" class="V_input3" id="password"/></td>
          </tr>
          <tr class="td1">
            <th>商户密钥：</th>
            <td><input type="text" name="md5key" class="V_input3" id="md5key" value="<?php echo ($md5key); ?>" style="width: 236px;"/></td>
          </tr>
          <tr class="td1">
            <th>商户名称：</th>
            <td>
				<input type="text" name="company_name" class="V_input3" id="company_name"/>
			</td>
          </tr>
          <tr class="td1">
            <th>真实姓名：</th>
            <td><input type="text" name="truename" class="V_input3" id="truename"/></td>
          </tr>
          <tr class="td1">
            <th>身份证号：</th>
            <td><input type="text" name="id_card_num" class="V_input3" id="id_card_num"/></td>
          </tr> 
		  <tr class="td1">
            <th>手机号码：</th>
            <td><input type="text" name="mobile" class="V_input3" id="mobile"/></td>
          </tr>
		  <tr class="td1">
            <th>联系地址：</th>
            <td><input type="text" name="address" class="V_input3" id="address" style="width: 420px;"></td>
          </tr>		  
<!-- 		  <tr class="td1">
            <th>结算周期：</th>
            <td>
				<input type="text" name="period" class="V_input3" onkeyup="value=value.replace(/[^\d\.]/g,'');"/>
				<span style="font-size: 12px;color: red;">*数字,输入1,即T+1</span>			
			</td>
          </tr>			  
          <tr class="td1">
            <th>银行信息：</th>
            <td>
				<div class="divall">
				</div>
				<img onclick="add()" src="/pay2/Public/admin/skin/images/add.png" style="margin-bottom: 5px;">
				<span style="font-size: 12px;color: red;">*同一客户,多张银行卡</span>
			</td>
          </tr>	 -->	  
		  <tr class="td1">
            <th>入金状态：</th>
            <td>
				<select name="is_lock" class="layui-input" style="display:block;">
					<option value="">请选择</option>
					<option value="2" selected>正常</option>
					<option value="1">锁定</option>
				</select>			
			</td>
          </tr>
		  <tr class="td1">
            <th>上级代理：</th>
            <td>
				<select name="parent_name" class="layui-input" style="display:block;">
					<option value="">无</option>
					<?php if(is_array($dailiData)): foreach($dailiData as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["truename"]); ?></option><?php endforeach; endif; ?>								
				</select>			
			</td>
          </tr>		  
		  <tr class="td1">
            <th>用户角色：</th>
            <td>
				<select name="role_id" class="layui-input" style="display:block;">
					<option value="">请选择</option>
					<?php if(is_array($roleList)): foreach($roleList as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; ?>								
				</select>			
			</td>
          </tr>
          <tr class="td1">
            <th></th>
            <td>
			<button id="btnSubmit" class="V_btn4 submit ajaxSubmit_apply">确认添加</button>
			</td>
          </tr>
        </table>
</form>
<script type="text/javascript">
function slectTd(td){ 
	var tdid = td.value;
	var ajaxUrl = "<?php echo U('Member/tdajax');?>";
    $.getJSON(ajaxUrl,{tdid:tdid},function(data){ 
		//console.log(data);
		$("#dataTbody  tr:not(:first)").empty(""); //清空原有的选项 
		if(data.length==0){
			var tTr ='<tr><td colspan="3">暂无产品</td></tr>';
			$("#dataTbody").append(tTr);
		}else{
			$.each(data,function(index,array){ 
				var tTr="<tr>"+
					"<td>"+array.product_name+"</td>"+
					"<td>"+array.rote+"</td>"+
					"<td>"+
					"<input type='text' name='sell_rote[]' value='' class='V_input'>"+
					"<input type='hidden' name='product_sid[]' value='"+array.id+"' class='V_input'>"+
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
<script type="text/javascript">
function getSelectVal(num,str){ 
	var ajaxSelect = "<?php echo U('Client/bankajax');?>";
	//alert(str);
    $.getJSON(ajaxSelect,function(data){ 
        var smallname = $("#smallname"+num); 
        $("option",smallname).remove(); //清空原有的选项 
        $.each(data,function(index,array){ 
			(array['bankname']==str)?a='selected="selected"':a=''; //选中
            var option = '<option value="'+array['bankname']+'" '+a+'>'+array['bankname']+'</option>'; 
            smallname.append(option); 
        }); 
    }); 
}
</script>
<script type="text/javascript"> 
var num = 2;                 
function add(){	
	var bankname = arguments[0] ? arguments[0] :'';
	var bank_card_num = arguments[1] ? arguments[1] : '';	
	var str = '';
		str +='<div id="divson'+num+'">'
				+'银行名称:'
				+'<select name="canshu1[]" id="smallname'+num+'" style="width:100px;">'
				+'</select>'
				+'银行卡号:'
				+'<input type="text" name="canshu2[]" class="V_input3" id="canshu2'+num+'"/>'
				+'<img onclick="del('+num+')"src="/pay2/Public/admin/skin/images/jian.png">'
			 +'</div>';	
	$(".divall").append(str);
	//alert(bankname);
	$("#canshu1" + num).attr('value', bankname);
	$("#canshu2" + num).attr('value', bank_card_num);
	getSelectVal(num,bankname);
	num++;

}
function del(num){
	  $("#divson"+num).remove();
}
</script>
<script type="text/javascript" src="/pay2/Public/js/jquery.form.js"></script>
<script type="text/javascript">  
	$(function () {  
		var ajaxurl="<?php echo U('Member/add');?>";
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