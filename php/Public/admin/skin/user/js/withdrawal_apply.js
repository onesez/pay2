$(function(){


	//收款方式点击切换
	$ (".payment-choices").click(function(){
		$(this).addClass("methods-chosen").siblings().removeClass("methods-chosen");
		$("#accountID").val($(this).data("id"));
	});



	$(".ajaxSubmit_apply").click(function(){
		var button = $(this);

		var min = parseInt($("#min").val());
		var multiple = parseInt($("#multiple").val());

		var money = parseInt($("[name='money']").val());

		var accountID = parseInt($("[name='accountID']").val());

		if (accountID>0){

		}else{
			core.error('请选择收款账户');
			return false;
		}

		if (money>0){
			if(money<min){
				core.error('最小提现金额为 ' + min + '元');
				return false;
			}
			if(money%multiple !=0){
				core.error('提现金额必须为 ' + multiple + '元 的倍数');
				return false;
			}
		}else{
			core.error('请填写提现金额');
			return false;
		}

		var isphone = $("#open").val();
		if (isphone != "False") {
		    user.validate({
		        items: ['protection'],
		        button: button
		    });
		}
		else {
		    var sSource = '/user/withdrawal/post.aspx';
		    var postData = 'money=' + money + '&accountID=' + accountID + '&password2=' + $("[name='Password2']").val();
		    var loading = $.dialog.tips("提交中，请稍后……", 60, "loading");
		    loading.close();
		    $.ajax({
		        type: "post",
		        dataType: "text",
		        timeout: 10000,
		        url: sSource,
		        data: postData,
		        success: function (data) {
		            json = eval('json = ' + data);
		            if (json.result == 'true') {
		                loading.close();
		                $.dialog({
		                    title: '信息提示',
		                    content: json.text,
		                    time: '30',
		                    ok: true
		                });
		                window.location.href = json.url;
		            } else {
		                loading.close();
		                $.dialog({
		                    title: '信息提示',
		                    content: json.text,
		                    time: '30',
		                    ok: true
		                });

		            }
		        },
		        error: function (XMLHttpRequest, textStatus, errorThrown) {
		            alert(errorThrown);
		        }

		    })
		}
	});







});