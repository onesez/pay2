<?php
namespace Admin\Controller;
use Think\Controller;
class MainController extends CommonController {
    public function index(){
		$Gongaolist = M('notice') ->order('id desc')->limit(0,6)->select();		
		$this->assign('Gongaolist',$Gongaolist);

		$productData = M('product')->field('product_name')->order('id asc')->select();		
		
        $condition = array();
		
		
        I('start')? $start = strtotime(I('start', '', 'htmlspecialchars,trim')): false;  //订单发起日期
        I('end')  ? $end = strtotime(I('end', '', 'htmlspecialchars,trim')) : false;
		
		if($start && $end){
        	$condition['pay_date'] = array('between',"$start,$end");
			$this->assign('start',I('start', '', 'htmlspecialchars,trim'));
			$this->assign('end',I('end', '', 'htmlspecialchars,trim'));
        }		
		
 		$auth = new \Think\Auth();   
		$auth_id = session('auth_id');  	//接受session	
		//var_dump($auth_id);
		if($auth_id!=1){    				//超级管理员不参与验证
			if($auth->check('gr', $auth_id)){				
				$rolename = '高级';
			}			
		}else{
			$rolename = '高级';
		}		
		//var_dump($rolename);
		switch ($rolename) {
			case '高级':
				$condition['_string'] = '1=1';
				break;
			default:
				$condition['user_id'] = array('eq', $_SESSION['user_name']);
		}		
		
		$totalData = M('orderlist')->field('pay_product,SUM(pay_total) as totalpay')->where($condition)->group('pay_product')->select();		
		//var_dump(M('orderlist')->_sql());

		
        foreach ($productData as $key => $value) {
			foreach ($totalData as $keys => $vals) {
				if($vals['pay_product']==$value['product_name']){
					$productData[$key]['total']= sprintf("%.2f", $totalData[$keys]['totalpay']);		
				}	
			}
			
        }		
		//var_dump($productData);die;
		$this->assign('productData',$productData);
	    $this->assign('totalData',$totalData);
		$this->display();
		
    }
	
	//登录以后的任务操作
	public function login_task_ajax(){	
	
		return '结算不应该写在用户能访问的页面，会有并发问题';
		
	}
	
}
