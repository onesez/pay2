/*各类ajax提交、删除js*/

function delfunc(obj){
	layer.confirm('确认删除？', {
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

/*重置搜索框表单*/
function searchqk(){
	$(':input','#search_form')  
	 .not(':button, :submit, :reset, :hidden')  
	 .val('')  
	 .removeAttr('checked')  
	 .removeAttr('selected');  	
}