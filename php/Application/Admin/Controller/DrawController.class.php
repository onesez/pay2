<?php
namespace Admin\Controller;
use Think\Controller;
class DrawController extends CommonController {


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

		I('zfstart')? $zfstart = strtotime(I('zfstart', '', 'htmlspecialchars,trim')): false;  //添加日期
        I('zfend')  ? $zfend = strtotime(I('zfend', '', 'htmlspecialchars,trim')) : false;
		
		if($zfstart && $zfend){
        	$condition['pay_time'] = array('between',"$zfstart,$zfend");
			$this->assign('zfstart',I('zfstart', '', 'htmlspecialchars,trim'));
			$this->assign('zfend',I('zfend', '', 'htmlspecialchars,trim'));
        }		
		
		$user_name = I('user_name', '', 'htmlspecialchars,trim');   
        if (!empty($user_name)) {
			$condition['user.user_name'] = array('LIKE', "%{$user_name}%");
			$this->assign('user_name',$user_name);
        }
		$company_name = I('company_name', '', 'htmlspecialchars,trim');   
        if (!empty($company_name)) {
			$condition['user.company_name'] = array('LIKE', "%{$company_name}%");
			$this->assign('company_name',$company_name);
        }
		$user_name = I('user_name', '', 'htmlspecialchars,trim');   
        if (!empty($user_name)) {
			$condition['user_name'] = array('LIKE', "%{$user_name}%");
			$this->assign('user_name',$user_name);
        }
		$bank_account = I('bank_account', '', 'htmlspecialchars,trim');   
        if (!empty($bank_account)) {
			$condition['bank_account'] = array('LIKE', "%{$bank_account}%");
			$this->assign('bank_account',$bank_account);
        }

		$status = I('status', '', 'htmlspecialchars,trim');   
        if (!empty($status)) {
			$condition['status'] = array('LIKE', "%{$status}%");
			$this->assign('status',$status);
        }
		$order_num = I('order_num', '', 'htmlspecialchars,trim');   
        if (!empty($order_num)) {
			$condition['order_num'] = array('LIKE', "%{$order_num}%");
			$this->assign('order_num',$order_num);
        }
		$platform_order_num = I('platform_order_num', '', 'htmlspecialchars,trim');   
        if (!empty($platform_order_num)) {
			$condition['platform_order_num'] = array('LIKE', "%{$platform_order_num}%");
			$this->assign('platform_order_num',$platform_order_num);
        }
		$platform = I('platform', '', 'htmlspecialchars,trim');   
        if (!empty($platform)) {
			$condition['platform'] = array('LIKE', "%{$platform}%");
			$this->assign('platform',$platform);
        }
		$detailid = I('detailid', '', 'htmlspecialchars,trim');   
        if (!empty($detailid)) {
			$condition['detailid'] = array('LIKE', "%{$detailid}%");
			$this->assign('detailid',$detailid);
        }
		
        I('success_result') ? $condition['success_result'] = I('success_result', '', 'htmlspecialchars,trim') : false;
		$this->assign('success_result',I('success_result')); 

		I('success_state') ? $condition['success_state'] = I('success_state', '', 'htmlspecialchars,trim') : false;
		$this->assign('success_state',I('success_state'));

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
			if($auth->check('dftd', $auth_id)){				
				$dftd = '1';
			}
			if($auth->check('txcz', $auth_id)){				
				$txcz = '1';
			}			
		}else{
			$rolename = '高级';
			$dftd = '1';
			$txcz = '1';
		}		
		//var_dump($rolename);
		switch ($rolename) {
			case '高级':
				$condition['_string'] = '1=1';
				break;
			default:
				$condition['user_id'] = array('eq', $_SESSION['auth_id']);
		}		
		
		
		//var_dump($condition);
        $model = M('drawlist');
		$count = $model->field('drawlist.*,user.id as adminid,user.user_name as txshanghu,user.company_name as company_name')->join('left join user on drawlist.user_id=user.id')->order('drawlist.id desc')->where($condition)->count();
		
		//var_dump($model->_sql());die;
		
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
		
		
        $memberlist = $model ->field('drawlist.*,user.id as adminid,user.user_name as txshanghu,user.company_name as company_name')->join('left join user on drawlist.user_id=user.id')->order('drawlist.id desc')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
		//var_dump($model->_sql());
		//var_dump($memberlist);
		
     	session('condition',$condition);   //存入session便于导出
	
		$total1 = $model ->field('drawlist.*,user.id as adminid,user.user_name as txshanghu,user.company_name as company_name')->join('left join user on drawlist.user_id=user.id')-> where($condition)->sum('amount');        //所有的总计
		$total1 = sprintf("%.2f", $total1);				
		
		$this->assign('dftd',$dftd);
		$this->assign('txcz',$txcz);
		$this->assign('total1',$total1);
        $this->assign('page',$show);
        $this->assign('memberlist',$memberlist);
    	$this->display();
    }
	
	//提现导出
    public function expDraw()
    {
		$condition = $_SESSION['condition'];
		$model = M('drawlist');
		$count = $model ->field('drawlist.*,user.id as adminid,user.user_name as txshanghu,user.company_name as company_name')->join('left join user on drawlist.user_id=user.id')->where($condition)->count();
		if($count>5000){
			header("Content-Type: text/html; charset=UTF-8");
			echo exit("<script>alert('单次导出记录不得超过5000条');history.back();</script>");
		}		
		$xlsData = $model ->field('drawlist.*,user.id as adminid,user.user_name as txshanghu,user.company_name as company_name')->join('left join user on drawlist.user_id=user.id')->order('id desc')->where($condition)->select();	
		//var_dump($xlsData);die;

        $xlsName  = '提现';													
        $xlsCell  = array(
            array('addtime','申请日期'),
            array('order_num','提现单号'),
            array('txshanghu','申请商户id'),
            array('company_name','申请商户名称'),
            array('user_name','申请人姓名'),
            array('mobile','申请人手机'),
            array('bank_account','开户名'),
            array('bank','银行名称'),
            array('bank_card_num','银行帐号'),
            array('amount','提现金额(元)'),
            array('status','提现状态'),
            array('reason','拒绝原因'),
            array('pay_time','支付时间'),
            array('platform_order_num','代付流水号'),
            array('order_id','商户流水号'),
            array('platform','代付通道'),
        );
  		//时间戳转日期格式
		foreach($xlsData as $key=>$val){
			$xlsData[$key]['addtime'] = date('Y-m-d H:i:s',$xlsData[$key]['addtime']);
			$xlsData[$key]['pay_time'] = date('Y-m-d H:i:s',$xlsData[$key]['pay_time']);
			$xlsData[$key]['bank_card_num'] = ' '.$xlsData[$key]['bank_card_num'];   //增加空格
			$xlsData[$key]['order_num'] = ' '.$xlsData[$key]['order_num'];
			$xlsData[$key]['order_id'] = ' '.$xlsData[$key]['order_id'];
			//$xlsData[$key]['pay_time'] = date('Y-m-d H:i:s',$xlsData[$key]['pay_time']);
			//$xlsData[$key]['status'] = ($xlsData[$key]['status']==1)?'支付成功':'待支付';
		}
        exportExcel($xlsName,$xlsCell,$xlsData);
		session('condition', null);
		
	}	
	
	
	//申请提现
    public function add()
    {

        if (IS_POST) {
			$data  = I('post.');
			//var_dump($data);die;	
			
		   $userInfo= M('user')->field("id,user_name,truename,mobile,balance,draw_money_lock,lock_ratio")->where(array('id'=>$_SESSION['auth_id']))->find();  //找出余额	
		   $payTotal = M('orderlist')->where(array('user_id'=>$userInfo['user_name'], 'pay_state' => '1'))->sum('pay_to_member');      //所有应结算	   
		   $payTotal = sprintf("%.2f", $payTotal);
		   $payoutTotal = M('drawlist')->where(array('user_id' => $userInfo['id'], 'status' => '已支付'))->sum('amount');   //所有支付总计	  
		   $payoutTotal = sprintf("%.2f", $payoutTotal);	
		   
			//var_dump($payTotal);
			//var_dump($payoutTotal);
		   
		    $arrayUser = array('admin','677368','666888','449533');
			
		    if(!in_array($userInfo['user_name'],$arrayUser)){
				if($payoutTotal>$payTotal){
					$data = array('status'=>0,'info' => '内部错误,请联系客服!', 'url' => U('Draw/lst'));
					$this->ajaxReturn ($data,'JSON');			   
				}
			}
			
 			//M验证
			 $rule = array(
				//array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱
				array('addtime', 'require', '申请日期不能为空！'),
				//array('user_name', 'require', '申请人姓名不能为空！'),
				//array('mobile', 'require', '申请人手机不能为空！'),
				array('amount', 'require', '提现金额不能为空'),
				array('amount','/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/','提现金额格式不正确'),				
				//array('name', '', '该客户姓名已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
			); 
			
			M()->startTrans();			
			$data = $this->apply($data, $rule);
			if($data['status'] && $data['status'] == 1){
				M()->commit(); 
			}else{
				M()->rollback(); 
			}
			
			$this->ajaxReturn ($data,'JSON');
        }	
		
		
		$userData= M('user')->where(array('user_name'=>$_SESSION['user_name']))->find();
        $this->assign('userData', $userData); 
		
		//$bankData = M('bank')->where(array('sid'=>$userData['id']))->select();   //找出银行卡信息
        //$this->assign('bankData',$bankData);
		
		$bankList  = M('bankcode')->field('bankname')->order('id asc')->select();	//找出银行卡信息		
		$this->assign('bankList', $bankList);
		
		$addtime = date('Y-m-d H:i:s');
		$this->assign('addtime', $addtime);				
		
        $this->display();
    }
	
	/*提现执行*/
	public function apply($data, $rule){
		try {
			
			$userInfo= M('user')->field("id,user_name,truename,mobile,balance,draw_money_lock,lock_ratio")->lock(true)->where(array('id'=>$_SESSION['auth_id']))->find();  //找出余额		
			$data['user_name'] = $userInfo['truename'];
			$data['mobile'] = $userInfo['mobile'];
			
			$balanceA = $userInfo['balance']-$userInfo['lock_ratio']*10000;
			//toarr('提现人'.$userInfo['user_name'].'实际可提'.$balanceA.'余额是'.$userInfo['balance'].'冻结金额是'.$userInfo['lock_ratio']*10000,'tx');
			
			if($data['amount']>$balanceA){				
				$data = array('status'=>0,'info' => '账户余额不足或超过冻结阀值,当前提现失败!', 'url' => U('Draw/lst'));
				return $data;
			}
			if($userInfo['draw_money_lock']=='1'){		  //锁定提现		
				$data = array('status'=>0,'info' => '商户资金暂时冻结,请联系客服!', 'url' => U('Draw/lst'));
				return $data;
			}			
			
			if($userInfo['user_name']!='271466'){
				if($data['amount']>50002){
					$data = array('status'=>0,'info' => '单笔提现金额不得高于5万', 'url' => U('Draw/lst'));
					return $data;
				}				
				
			}
			

						
			$db = M('drawlist');			
			if (!$db->validate($rule)->create()) {
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('Draw/add'));
				return $data;
			} 
		
			//$bankInfo= M('bank')->where(array('id'=>$data['bank_id']))->find();  //找出银行			
			//$data['bank'] = $bankInfo['bankname'];
			//$data['bank_card_num'] = $bankInfo['bank_card_num'];	

			
			
			//$data['bank_account'] = $data['user_name'];
			$data['user_id'] = $userInfo['id'];
			$data['addtime'] = strtotime($data['addtime']);	
			$data['order_num'] = date('YmdHis').rand(100000,999999);	
			
			//var_dump($data);die;
			$id = $db->add($data);
			$res = M('user')->where(array('id'=>$data['user_id']))->setDec('balance',$data['amount']);  //减余额	
			toarr('id:'.$id.';减余额:'.$res,'txcj');
			if($id && $res){
				$data = array('status'=>1,'info' => '提现成功', 'url' => U('Draw/lst'));
				return $data;
			}else{
				$data = array('status'=>0,'info' => '提现失败', 'url' => U('Draw/lst'));
				return $data;				
			}
			
		}
		catch(Exception $e){
			$data['status'] = 0;
			$data['info'] = $e->getMessage();
			return $data;
		}
		
		return null;
	}

	//发起代付
    public function pay2()
    {

        if (IS_POST) {
			$data  = I('post.');
			//var_dump($data);die;
			
 			$yzmCode = $data['yzmCode'];
/* 			if(empty($yzmCode)){
				$data = array('status'=>0,'info' => '短信验证码不能为空', 'url' => U('Draw/pay2'));
				$this->ajaxReturn ($data,'JSON');
			}	 */		
			
			//if($yzmCode!=$_SESSION['message_rand']){
/* 			if($yzmCode!='123456'){
				$data = array('status'=>0,'info' => '短信验证码不正确', 'url' => U('Draw/pay2'));
				$this->ajaxReturn ($data,'JSON');
			}	 */

			$tdData  = M('platform')->where(array('id'=>$data['platform']))->find();	
			$c = $tdData['controller'];   //控制器名称
			$n = $tdData['platform'];         //通道名称
			$data['txorderId'] = date('YmdHis').rand(10000,99999);         //代付流水号
			
			$data_t['id'] = $data['txid'];         //修改通道名称和代付流水号
			$data_t['platform_order_num'] = $data['txorderId'];
			$data_t['platform'] = $n;
			$txData['id'] = $data['txid'];

			M()->startTrans();

			try{

				$checker = $this->canDraw(false);
				if( $checker['status'] == 1){ //双重检查
			
					M('drawlist')->save($data_t);
					
					var_dump($c);die;
					
					$res = A('Pay2/'.$c)->dopay($data);    //传送代付流水号
				}
				
				//var_dump($res);

				if($res['result']=='1'){   //交易成功
					M()->commit();
					$this->payOk($txData);
				}else{    //交易失败
					$txData['reason'] = $res['desc'];
					M()->rollback();
					$this->payFail($txData);	
				}					
			} catch( Exception  $e ) {
				M()->rollback();
				$this->payFail($txData);
			}
        }
		
		$id         = I('id', 0, 'intval');
		$dfInfo = M('drawlist')->where(array('id'=>$id))->find();
		//var_dump($dfInfo);
		$userInfo = M('user')->field('id,user_name')->where(array('id'=>$dfInfo['user_id']))->find();
		//var_dump($userInfo);die;
	   $payTotal = M('orderlist')->where(array('user_id'=>$userInfo['user_name'], 'pay_state' => '1'))->sum('pay_to_member');      //所有应结算	   
	   $payTotal = sprintf("%.2f", $payTotal);
	   $payoutTotal = M('drawlist')->where(array('user_id' => $userInfo['id'], 'status' => '已支付'))->sum('amount');   //所有支付总计	  
	   $payoutTotal = sprintf("%.2f", $payoutTotal);	
	   
		//var_dump($payTotal);
		//var_dump($payoutTotal);
	   
		$arrayUser = array('admin','677368','666888','449533');
		
		if(!in_array($userInfo['user_name'],$arrayUser)){
			if($payoutTotal>$payTotal){
				$data = array('status'=>0,'info' => '金额明细异常,请检查!', 'url' => U('Draw/lst'));
				$this->ajaxReturn ($data,'JSON');			   
			}
		}
			
		$this->assign('dfInfo', $dfInfo);
		
		$tdList  = M('platform')->field('id,platform')->where(array('is_open'=>'1'))->order('id asc')->select();	//找出通道
		$this->assign('tdList', $tdList);		
		
		$sendid = getChar(20);
		session('sendid', $sendid);			
		$this->assign('sendid',$sendid);
        $this->display();
    }

    public function payOk($data)  //支付成功
    {
		$data_e['id'] = $data['id'];
		$data_e['status'] = '已支付';
		$data_e['reason'] = '已支付';			
		$data_e['pay_time'] = time();	
 		if (false !== M('drawlist')->save($data_e)) {
			$data = array('status'=>1,'info' => '操作成功请查看最新状态', 'url' => U('Draw/lst',array('status'=>'待处理')));
			$this->ajaxReturn ($data,'JSON');	
		} else {
			$data = array('status'=>0,'info' => '操作失败', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');	
		}
	}

    public function payFail($data)  //支付失败
    {
		$data_e['id'] = $data['id'];
		$data_e['status'] = '上游处理失败';
		$data_e['reason'] = $data['reason'];			
 		if (false !== M('drawlist')->save($data_e)) {
			$data = array('status'=>1,'info' => '操作成功请查看最新状态', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');	
		} else {
			$data = array('status'=>0,'info' => '操作失败', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');	
		}
	}


	
	
	//验证码
    public function regSms(){
		$mobile='18589052556';
		//$mobile='13168426687';
		$sendid = $_POST['sendid'];
		
		if($sendid == $_SESSION['sendid']){
			$message_rand=rand(100000,900000);
			$_SESSION['message_rand'] = $message_rand;
			$sms_template_code="SMS_120411635";  //支付
			$mobile = $mobile;
			$sms_param ="{'code':'$message_rand'}";
			$res = SmsSend($mobile,$sms_template_code,$sms_param);  
			if($res == "OK"){
				session($_SESSION['payid'], null);
				echo "发送成功";
				exit();
			}else{
				echo "发送失败";
				exit();
			} 
		}else{
			echo "禁止外部发送";
			exit();
		}
    }	
	
	//返回金额汇总
    public function tajax()
    {
       
 		$auth = new \Think\Auth();   
		$auth_id = session('auth_id');  	//接受session	
		//var_dump($auth_id);
		if($auth_id!=1){   				//超级管理员不参与验证
			if($auth->check('dftd', $auth_id)){				
				$dftd = '1';
			}			
		}else{
			$dftd = '1';
		}
		//var_dump($dftd);die;
		if($dftd=='1'){
		   $id         = I('id', 0, 'intval');
		   $txData  = M('drawlist')->field('id,user_id')->where(array('id'=>$id ))->find();

		   
		   $txUser  = M('user')->field('id,user_name,balance')->where(array('id'=>$txData['user_id']))->find();   //提现人
		   $real_balance = $txUser['balance'];  //实际余额
		   
		   //$jsTotal = M('closelist')->where(array('username'=>$txUser['user_name']))->sum('real_amount');      //所有结算总计	   
		   //$jsTotal = sprintf("%.2f", $jsTotal);

		   $payTotal = M('orderlist')->where(array('user_id'=>$txUser['user_name'], 'pay_state' => '1'))->sum('pay_to_member');      //历史已总收款   
		   $payTotal = sprintf("%.2f", $payTotal);

		   $jsTotal = M('orderlist')->where(array('user_id'=>$txUser['user_name'], 'pay_state' => '1', 'status' => '1'))->sum('pay_to_member');      //历史已结算   
		   $jsTotal = sprintf("%.2f", $jsTotal);

		   $nojsTotal = M('orderlist')->where(array('user_id'=>$txUser['user_name'], 'pay_state' => '1', 'status' => '2'))->sum('pay_to_member');      //历史待结算   
		   $nojsTotal = sprintf("%.2f", $nojsTotal);
		   
		   
		   $txTotal = M('drawlist')->where(array('user_id' => $txUser['id'], 'status' => '已支付'))->sum('amount');   //所有支付总计	  
		   $txTotal = sprintf("%.2f", $txTotal);

		   $pretxTotal = M('drawlist')->where(array('user_id' => $txUser['id'], 'status' => '待处理'))->sum('amount');   //所有待处理总计	  
		   $pretxTotal = sprintf("%.2f", $pretxTotal);
		   
		   $maxTotal = bcsub($payTotal,$txTotal,2); 
		   $realTotal = $jsTotal - $txTotal- $pretxTotal;
		   $realTotal = sprintf("%.2f", $realTotal);
		   
		   $data = array(
			   'real_balance'=>$real_balance,
			   'payTotal' => $payTotal,
			   'jsTotal' =>$jsTotal,
			   'nojsTotal' =>$nojsTotal,
			   'txTotal' =>$txTotal,
			   'pretxTotal' =>$pretxTotal,
			   'maxTotal' =>$maxTotal,
			   'realTotal' =>$realTotal
		   );
		   $this->ajaxReturn ($data,'JSON');			
			
		}
		
	}

	public function ajaxCanDraw()
	{
		return canDraw(true);
	}
	

	//返回是否可以提现
    public function canDraw($return_ajax_result)
    {
	   $txUser  = M('user')->field('id,user_name,balance')->where(array('id'=>$_SESSION['auth_id']))->find();   //提现人
	   $real_balance = $txUser['balance'];  //实际余额
	   
	   $payTotal = M('orderlist')->where(array('user_id'=>$txUser['user_name'], 'pay_state' => '1'))->sum('pay_to_member');      //历史已总收款   
	   $payTotal = sprintf("%.2f", $payTotal);

	   $jsTotal = M('orderlist')->where(array('user_id'=>$txUser['user_name'], 'pay_state' => '1', 'status' => '1'))->sum('pay_to_member');      //历史已结算   
	   $jsTotal = sprintf("%.2f", $jsTotal);

	   $nojsTotal = M('orderlist')->where(array('user_id'=>$txUser['user_name'], 'pay_state' => '1', 'status' => '2'))->sum('pay_to_member');      //历史待结算   
	   $nojsTotal = sprintf("%.2f", $nojsTotal);
	   
	   
	   $txTotal = M('drawlist')->where(array('user_id' => $txUser['id'], 'status' => '已支付'))->sum('amount');   //所有支付总计	  
	   $txTotal = sprintf("%.2f", $txTotal);

	   $pretxTotal = M('drawlist')->where(array('user_id' => $txUser['id'], 'status' => '待处理'))->sum('amount');   //所有待处理总计	  
	   $pretxTotal = sprintf("%.2f", $pretxTotal);
	   
	   $maxTotal = bcsub($payTotal,$txTotal,2); 
	   $realTotal = $jsTotal - $txTotal- $pretxTotal;
	   $realTotal = sprintf("%.2f", $realTotal);
	   
	   $data = array(
		   'real_balance'=>$real_balance,   //真实余额
		   'payTotal' => $payTotal,         //历史收款
		   'jsTotal' =>$jsTotal,            //历史结算
		   'nojsTotal' =>$nojsTotal,        //待结算
		   'txTotal' =>$txTotal,            //提现已经支付
		   'pretxTotal' =>$pretxTotal,      //提现待处理
		   'maxTotal' =>$maxTotal,          //理论最大
		   'realTotal' =>$realTotal         //理论账户余额
	   );
	   $cha1 =$real_balance-$realTotal ;
	   if($realTotal>0 && $cha1>0 ){ //不为负，但实际余额大于真实余额	   
		   
		   $edit['balance']= $realTotal;  
		   $res = M('user')->where(array('id'=>$id))->save($edit); //强制一致
		   if($res){
			  $arr = array('status'=>'1');			  
		   }else{
			  $arr = array('status'=>'0');			  
		   }
	   }

	   if( !$return_ajax_result ){
		   return $arr;
	   }

	   $this->ajaxReturn ($arr,'JSON');	
	}

	
	//银行列表
    public function bankajax()
    {
       $bankList  = M('bankcode')->field('bankname')->order('id asc')->select();	   
  	   $this->ajaxReturn ($bankList,'JSON');		
	}
		
	


    public function denied($data)  //拒绝
    {
		$data_e['id'] = $data['id'];
		$data_e['status'] = '被拒绝';
		$data_e['reason'] = $data['description'];
 		if (false !== M('drawlist')->save($data_e)) {
			$data = array('status'=>1,'info' => '操作成功', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');	
		} else {
			$data = array('status'=>0,'info' => '操作失败', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');	
		}
	}
	
	//审核
    public function pass()
    {
		if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);die;
			
			$status = $data['status'];
			switch ($status) {
				case '已支付':     
					$data_e['id'] = I('id', 0, 'intval');    //得到id
					$data_e['status'] = '已支付';
					$data_e['reason'] = '已支付';			
					$data_e['pay_time'] = time();	
					break;
				case '拒绝':    //更改拒绝理由
					$data_e['id'] = I('id', 0, 'intval');    //得到id
					$data_e['status'] = '被拒绝';
					$data_e['reason'] = $data['description'];			
					$data_e['pay_time'] = '';					
					M('user')->where(array('id'=>$data['user_id']))->setInc('balance',$data['amount']);  //加余额					
					break;
				default:
					$data_e['id'] = I('id', 0, 'intval');    //得到id
					$data_e['status'] = '被拒绝';
					$data_e['reason'] = $data['description'];			
					$data_e['pay_time'] = '';	
			}
			if (false !== M('drawlist')->save($data_e)) {
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Draw/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} else {
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Draw/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}			
		}

		
		//当前控制器名称
		$id         = I('id', 0, 'intval');		
		$tixianData = M('drawlist')->where(array('id'=>$id))->find();
		$this->assign('tixianData', $tixianData);
		$this->display();
	}
	
	
	//退回
    public function reject()
    {
		
		//当前控制器名称
		$txid         = I('txid', 0, 'intval');
		//var_dump($txid);die;
		$thData = M('drawlist')->field('fail_amount,success_result')->where(array('id'=>$txid))->find();
		if($thData['fail_amount'] =='0' &&$thData['success_result'] =='代付失败'){
			$data_pay['id'] = $txid;   //修改支付状态
			$data_pay['status'] = '被拒绝';
			$data_pay['reason'] = '上游复核失败';			
			$data_pay['pay_time'] = '';	
			$res = M('drawlist')->save($data_pay);
			$txData  = M('drawlist')->field('user_id,amount')->where(array('id'=>$txid))->find();
			$user_id = $txData['user_id'];
			$total = $txData['amount'];
			//var_dump($txData);die;
			$add = M('user')->where(array('id'=>$user_id))->setInc('balance',$total);  //加余额
			if(false !==$add){
				$data_th['id'] = $txid;   //修改支付状态
				$data_th['fail_state'] = '1';	
				$res = M('drawlist')->save($data_th);
				$data = array('status'=>1,'info' => '退回成功,余额已返回', 'url' => U('Draw/lst'));
				$this->ajaxReturn ($data,'JSON');
			}else{
				$data = array('status'=>0,'info' => '退回失败', 'url' => U('Draw/lst'));
				$this->ajaxReturn ($data,'JSON');				
			}
		}else{
			$data = array('status'=>0,'info' => '当前订单状态不支持退回', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');
		}
	}

	//复核
    public function verify()
    {
		
		//当前控制器名称
		$txid         = I('txid', 0, 'intval');		
		$fhData = M('drawlist')->field('amount,platform_order_num,platform')->where(array('id'=>$txid))->find();
		if($fhData['platform']==''){
			$data = array(
			   "status" =>'11',
			   "money" => '未知',
			   "desc"=>'代付流水号为空'	  //失败原因	
			);	
			$this->ajaxReturn ($data,'JSON');			
		}
		
		$tdData  = M('platform')->where(array('platform'=>$fhData['platform']))->find();	
		$c = $tdData['controller'];   //控制器名称
		$orderId = $fhData['order_num'];
		//var_dump($orderId);die;
		$res = A('Pay2/'.$c)->query($orderId);    //传送代付流水号	
		//var_dump($res);die;
		$data_e['id'] = $txid;  
		$data_e['success_state'] = '已复核';
		$data_e['success_pay_time'] = time();
		$data_e['fail_amount'] = $res['money'];		
		$data_e['success_result'] = $res['desc'];
		$result = M('drawlist')->save($data_e);
	    $this->ajaxReturn ($res,'JSON');
	}
	
	

	
    public function fqdf($data)  //发起代付
    {
		//var_dump($data);die;
		$txInfo = M('drawlist')->where(array('id'=>$data['id']))->find();   //找出提现相关信息
		$dfData['tranAmt'] = $txInfo ['amount'];
		$dfData['accName'] = $txInfo ['bank_account'];
		$dfData['accNo'] = $txInfo ['bank_card_num'];
		
		
		//$rs = sdstartPay($dfData);	
		//$obj=json_decode($rs); 
		//$result = $obj->respDesc ;  //返回结果
		
		$result ='成功';    //暂时改为手动
		if($result=='成功'){
			$data_e['id'] = $data['id'];    //更改状态
			$data_e['status'] = '已支付';
			$data_e['reason'] = '已支付';			
			$data_e['pay_time'] = time();	
			$res = M('drawlist')->save($data_e);
			
			//M('user')->where(array('id'=>$txInfo['user_id']))->setDec('balance',$dfData['tranAmt']);  //减余额
			
			$data = array('status'=>1,'info' =>'支付成功', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');			
		}else{	
			$data_e['id'] = $data['id'];
			$data_e['status'] = '支付失败';
			$data_e['reason'] = $result;			
			$res = M('drawlist')->save($data_e);			
			$data = array('status'=>0,'info' =>'支付失败,原因:'.$result, 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');				
		}
		
		
		
		
	}	
	

    public function detail()
    {
        //当前控制器名称
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;
        $detaillist = M('drawlist')->field('drawlist.*,user.id as user_id,user.user_name,user.company_name')->join('left join user on drawlist.user_id=user.id')->where(array('drawlist.id'=>$id))->find();   
		//var_dump($detaillist);die;
        $this->assign('detaillist', $detaillist);
        $this->display();
    }	
	
	
	
	
	
    //删除
    public function del()
    {

        $id         = I('id', 0, 'intval');    //得到id
        //$batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
		// if ($batchFlag) {
           // $this->delBatch();
            //return;
        //}
		
		//drawlist
		
		$del = M('drawlist')->delete($id);

        if ($del) {
            //M('memberdetail')->delete($id);
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');	
			//echo "<script>alert('删除成功!');location.href='{:U('Inventory/lst')}'</script>";
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }

    public function delBatch()
    {

        $idArr = I('key', 0, 'intval');
        if (!$idArr) {
            //$this->error('请选择要彻底删除的项');
			$data = array('status'=>0,'info' => '请选择要删除的项目', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
        $where = array('id' => array('in', $idArr));

        if ( M('drawlist')->where(array('id' => array('in', $idArr)))->delete()) {
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '删除成功', 'url' => U('Draw/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }
}
