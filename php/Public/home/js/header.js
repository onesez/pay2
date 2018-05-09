define('shidai/header', function(require, exports, module) {

  var $ = require("shidai/jquery");
  require('shidai/ysbbase');
  console.log('header.js');
  
  $(document).ready(function() {
  	
  	$("li.my").mouseover(function() {
  		$(".rvm").show();
  	});
  	
  	$("li.my").mouseout(function() {
  		$(".rvm").hide();
  	});
  	
  });

});
