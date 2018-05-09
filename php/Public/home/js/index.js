define('shidai/index', function(require, exports, module) {

  /**
   * 标记 css 依赖, 需要用到 loading 图标。
   * @require modules/css/test_index_requireFromJS.scss
   */
  var $ = require('shidai/jquery');
  require('shidai/ysbbase');
  require('shidai/jquery.scroll');
  require('shidai/bootstrap-datepicker');
  
  $(document).ready(function() {
  
      // Twitter Bootstrap 3 carousel plugin
      $("#myCarousel").carousel();
  
      $('.beautify').hover(function() {
          $(this).addClass('active').siblings().removeClass('active');
      }, function() {
          $(this).siblings().removeClass('active');
      });
  
      $("#scrollDiv").Scroll({
          line: 1,
          speed: 500,
          timer: 3000,
          up: "but_up",
          down: "but_down"
      });
  
      console.log('from index.js');
  
  });
  //
  // var modal = module.exports = function(url, opt) {
  // };
  
  
  
  
  
  
  
  
  
  
  
  
  

});
