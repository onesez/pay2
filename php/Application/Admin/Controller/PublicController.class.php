<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
	
    public function base(){
		
		$auth_id = session('auth_id');  //获取id
		
		$userData = M('user')->where(array('id' =>$auth_id))->find();
        //var_dump($userData);
		$this->assign('userData',$userData); 

		//一定要用limit和select方法取出倒数第二条信息
		$lastData = M('admin_log')->Field('log_ip,log_time')->where(array('user_id' =>$auth_id))->order('log_id desc')->limit('1,1')->select();
        //dump($lastData);die;
		$this->assign('lastData',$lastData);   


		//$jsData = M('deduct')->field('deduct.*,user.id as user_id,user.truename')->join('left join user on deduct.deductor_name=user.truename')->order('deduct.id desc')->where($condition)->select();
		if($auth_id=='1'){
			$condition['_string'] = '1=1';
		}else{
			$condition['user_id'] = array('eq', $_SESSION['user_name']);
		}
		$start = strtotime(date("Y-m-d"),time());
		$end   = time();
		$condition['creat_time'] = array('between',"$start,$end");		
		$condition['pay_state'] = array('eq', '1');				
		$total = M('orderlist') ->where($condition)->sum('pay_to_member'); 
		$total = sprintf("%.2f", $total);
		//var_dump(M('orderlist') ->_sql());die;
		$this->assign('total',$total);		
		

 	
		
		$menu_list = getMenuList($auth_id);		//获取菜单
		$this->assign('menu_list',$menu_list);
    }
}