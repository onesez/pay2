<?php
namespace Admin\Controller;
use Think\Controller;
class ClosesController extends CommonController {


    public function lst()
    {

        $condition = array();
		
        I('start')? $start = strtotime(I('start', '', 'htmlspecialchars,trim')): false;  //添加日期
        I('end')  ? $end = strtotime(I('end', '', 'htmlspecialchars,trim')) : false;
		
		if($start && $end){
        	$condition['addtime'] = array('between',"$start,$end");
			$this->assign('start',I('start', '', 'htmlspecialchars,trim'));
			$this->assign('end',I('end', '', 'htmlspecialchars,trim'));
        }		
		
		$username = I('username', '', 'htmlspecialchars,trim');   
        if (!empty($username)) {
			$condition['username'] = array('LIKE', "%{$username}%");
			$this->assign('username',$username);
        }

		$order_num = I('order_num', '', 'htmlspecialchars,trim');   
        if (!empty($order_num)) {
			$condition['order_num'] = array('LIKE', "%{$order_num}%");
			$this->assign('order_num',$order_num);
        }

		$company_name = I('company_name', '', 'htmlspecialchars,trim');   
        if (!empty($company_name)) {
			$condition['company_name'] = array('LIKE', "%{$company_name}%");
			$this->assign('company_name',$company_name);
        }



       // I('name') ? $condition['name'] = I('name', '', 'htmlspecialchars,trim') : false;
        //I('handler') ? $condition['handler'] = I('handler', '', 'htmlspecialchars,trim') : false;
        //I('khqq') ? $condition['khqq'] = I('khqq', '', 'htmlspecialchars,trim') : false;
        //I('khqq') ? $condition['khqq'] = I('khqq', '', 'htmlspecialchars,trim') : false;
        //I('khgsmc') ? $condition['khgsmc'] = I('khgsmc', '', 'htmlspecialchars,trim') : false;
		
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
				$condition['username'] = array('eq', $_SESSION['user_name']);
		}		
		
		//var_dump($condition);
        $model = M('closelist');
		$count = $model->field('closelist.*,user.id as user_id,user.user_name,user.company_name')->join('left join user on closelist.username=user.user_name')->order('closelist.id desc')->where($condition)->count();
		
		//var_dump($model->_sql());
		
        $Page = new \Think\Page($count,10);
        $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        
        $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 条记录</span>');
        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('end','尾页');
        $Page->setConfig('num','尾页');
        //$Page->setConfig('current','尾页');

      	//var_dump($Page);die;
        $show = $Page->show();
		
		
        $memberlist = $model->field('closelist.*,user.id as user_id,user.user_name,user.company_name')->join('left join user on closelist.username=user.user_name')->order('closelist.id desc')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		//var_dump($model->_sql());
		
		session('condition',$condition);   //存入session便于导出
		
		
		$total1 = $model -> where($condition)->sum('amount');        //所有的付款总计
		$total1 = sprintf("%.2f", $total1);		
		$total2 = $model -> where($condition)->sum('pay_fee');             //所有的手续费总计		
		$total2 = sprintf("%.2f", $total2);
		$total3 = $model -> where($condition)->sum('real_amount');      //所有的真实付款金额总计		
		$total3 = sprintf("%.2f", $total3);
		$this->assign('total1',$total1);
		$this->assign('total2',$total2);
		$this->assign('total3',$total3);
		
        //$customerList     = M('closelist')->order('id asc')->select();  //找出客户列表
		//$this->assign('customerList',$customerList);		
		
		
		
        $this->assign('page',$show);
        $this->assign('memberlist',$memberlist);
    	$this->display();
    }
	
	//结算导出
    public function expCloses()
    {
		$condition = $_SESSION['condition'];
		$model = M('closelist');
		$count = $model->field('closelist.*,user.id as user_id,user.user_name,user.company_name')->join('left join user on closelist.username=user.user_name')->where($condition)->count();
		if($count>5000){
			header("Content-Type: text/html; charset=UTF-8");
			echo exit("<script>alert('单次导出记录不得超过5000条');history.back();</script>");
		}		
		$xlsData = $model->field('closelist.*,user.id as user_id,user.user_name,user.company_name')->join('left join user on closelist.username=user.user_name')->order('id desc')->where($condition)->select();	
		//var_dump($xlsData);die;
						
        $xlsName  = '结算';													
        $xlsCell  = array(
            array('addtime','时间'),
            array('username','商户id'),
            array('company_name','商户名称'),
            array('order_num','结算单号'),
            array('amount','付款金额(元)'),
            array('pay_fee','手续费(元)'),
            array('real_amount','结算金额(元)'),
            array('remark','摘要'),
        );
  		//时间戳转日期格式
		foreach($xlsData as $key=>$val){
			$xlsData[$key]['addtime'] = date('Y-m-d H:i:s',$xlsData[$key]['addtime']);
			//$xlsData[$key]['pay_time'] = date('Y-m-d H:i:s',$xlsData[$key]['pay_time']);
			//$xlsData[$key]['pay_time'] = date('Y-m-d H:i:s',$xlsData[$key]['pay_time']);
			//$xlsData[$key]['status'] = ($xlsData[$key]['status']==1)?'支付成功':'待支付';
		}
        exportExcel($xlsName,$xlsCell,$xlsData);
		session('condition', null);
		
	}	
	

}