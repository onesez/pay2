<?php
namespace Admin\Controller;
use Think\Controller;
class DeductController extends CommonController {


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
		
		
		$payment_name = I('payment_name', '', 'htmlspecialchars,trim');   
        if (!empty($payment_name)) {
			$condition['payment_name'] = array('LIKE', "%{$payment_name}%");
			$this->assign('payment_name',$payment_name);
        }

		$payment_id_card = I('payment_id_card', '', 'htmlspecialchars,trim');   
        if (!empty($payment_id_card)) {
			$condition['payment_id_card'] = array('LIKE', "%{$payment_id_card}%");
			$this->assign('payment_id_card',$payment_id_card);
        }

		$deductor_name = I('deductor_name', '', 'htmlspecialchars,trim');  
        if (!empty($deductor_name)) {
			$condition['deductor_name'] = array('LIKE', "%{$deductor_name}%");
			$this->assign('deductor_name',$deductor_name);
        }

        I('status') ? $condition['status'] = I('status', '', 'htmlspecialchars,trim') : false;
		$this->assign('status',I('status')); 

		I('close_state') ? $condition['close_state'] = I('close_state', '', 'htmlspecialchars,trim') : false;
		$this->assign('close_state',I('close_state'));
        //I('khdianhua') ? $condition['khdianhua'] = I('khdianhua', '', 'htmlspecialchars,trim') : false;
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
				$condition['deductor_name'] = array('eq', $_SESSION['truename']);
		}



		
		//var_dump($condition);

		
        $model = M('deduct');
		$count = $model->order('id desc')->where($condition)->count();
		
		//var_dump($model->_sql());die;
		
        $Page = new \Think\Page($count,10);
        $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        
        $Page->setConfig('header','<span class="rows">共 %TOTAL_ROW% 条记录</span>');
        $Page->setConfig('first','首页');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('end','尾页');
        //$Page->setConfig('num','尾页');
        //$Page->setConfig('current','尾页');

      	//var_dump($Page);die;
        $show = $Page->show();
		
		//var_dump($model->_sql());die;
        $memberlist = $model ->order('id desc')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
        // $this -> assign("order", $result);
		//echo $show;die;
		
		$kktotal = $model -> where($condition)->sum('amount');      //所有的订单总计			
		$this->assign('kktotal',$kktotal);		
		
     
        //$customerList     = M('deduct')->order('id asc')->select();  //找出客户列表
		//$this->assign('customerList',$customerList);		
		
		
		
        $this->assign('page',$show);
        $this->assign('memberlist',$memberlist);
    	$this->display();
    }
	
	
	//执行代扣
    public function apply()
    {
	    if (IS_POST) {
			$data  = I('post.');
			//var_dump($data);die;
			
			$platform = $data['platform'];
			
			switch ($platform) {
				case '1':  //杉德
					$this->sdkk($data);
					break;
				case '2':  //圣迪佳
					$this->sdjkk($data);
					break;
				default:
					$this->sdkk($data);
			} 
			
		}
        //当前控制器名称
        $id         = I('id', 0, 'intval');		
        $koukData = M('deduct')->where(array('id'=>$id))->find();
		//var_dump($koukData);
        $this->assign('koukData', $koukData);
		
        $bankList     = M('bankcode')->order('id asc')->select();  //找出编码列表
		$this->assign('bankList',$bankList);	
		
		$orderNo = date("YmdHis").mt_rand(100000, 999999);
		$this->assign('orderNo', $orderNo);
		
		$action_time = date('Y-m-d H:i:s');
		$this->assign('action_time', $action_time);			
		
        $this->display();		
		
	}	

    public function sdkk($data)  //杉德
    {	
		//var_dump($data);die;
		$dkdata = array(		//重新组装
			"tranAmt"	=> $data['tranAmt'],	 
			"accName"	=> $data['accName'],		
			"accNo"	=> $data['accNo'],
			"certNo"	=> $data['certNo'],
			"phone"	=> $data['phone'],
		);		
		
		$rs = sdfqdk($dkdata);	
		$obj=json_decode($rs); 
		$result = $obj->respDesc ;  //返回结果
		if($result=='成功'){
			//短信通知
 			$lrrData = M('deduct')->field("deductor_name,deductor_id")->where(array('id'=>$data['id']))->find();   //找出下级的姓名
			//var_dump(M('deduct')->_sql());
			$khname = $lrrData['deductor_name'];
			$lrrInfo = M('user')->field("period,balance,rate,mobile")->where(array('id'=>$lrrData['deductor_id']))->find();   //找出下级
			$mobile = $lrrInfo['mobile'];
			$total = $data['tranAmt'];
			$TemplateCode = 'SMS_76960031';
			$TemplateParam = '{"khname":"'.$khname.'","total":"'.$total.'"}';
			$code =  SmsSend($mobile, $TemplateCode,$TemplateParam);	
			//更改扣款状态 
			
			$data_e['id'] = $data['id'];    //更改状态、结算时间
			$data_e['status'] = '成功';
			$data_e['description'] = '无';			
			$data_e['action_time'] = time();	
			$data_e['close_state'] = '待结算';	
			//$fee = $lrrInfo['rate'];		
			//$total = number_format($data['tranAmt'] - $data['tranAmt'] * $fee/1000, 2, '.', '');
			$total = $data['tranAmt'] -$fee;
			$data_e['close_amount'] = $total;	
			$data_e['pre_close_time'] = $data_e['action_time'] + $lrrInfo['period']*60*60*24;	
			$res = M('deduct')->save($data_e);			
			
			
			$data = array('status'=>1,'info' =>'扣款成功', 'url' => U('Deduct/lst'));
			$this->ajaxReturn ($data,'JSON');
		}else{

			$data_e['id'] = $data['id'];    //写入失败原因
			$data_e['status'] = '失败';
			$data_e['description'] = $result;			
			$res = M('deduct')->save($data_e);	
			
			$data = array('status'=>0,'info' =>'扣款失败,原因:'.$result, 'url' => U('Deduct/lst'));
			$this->ajaxReturn ($data,'JSON');				
			
		}		
		
	}

    public function sdjkk($data)   //圣迪加
    {
		if($data['bankCode']==''){						
			$data = array('status'=>0,'info' =>'银行代码不能为空', 'url' => U('Deduct/lst'));
			$this->ajaxReturn ($data,'JSON');							
		}
		$dkdata = array(		//重新组装
			"certNo"	=> $data['certNo'],	 
			"orderNo"	=> $data['orderNo'],		
			"payAmount"	=> $data['payAmount'],
			"payerAcc"	=> $data['payerAcc'],
			"bankCode"	=> $data['bankCode'],
			"payerName"	=> $data['payerName'],
		);		
		
		$rs = sdjfqdk($dkdata);	
		$obj=json_decode($rs); 
		$result = $obj->execMsg ;  //返回结果
		

		if($result=='交易已受理!'){
 			$lrrData = M('deduct')->field("deductor_name,deductor_id")->where(array('id'=>$data['id']))->find();   //找出下级的姓名
			//var_dump(M('deduct')->_sql());
			$khname = $lrrData['deductor_name'];
			$lrrInfo = M('user')->field("period,balance,rate,mobile")->where(array('id'=>$lrrData['deductor_id']))->find();   //找出下级的电话
			$mobile = $lrrInfo['mobile'];
			$total = $data['payAmount'];
			$TemplateCode = 'SMS_76960031';
			$TemplateParam = '{"khname":"'.$khname.'","total":"'.$total.'"}';
			//var_dump($TemplateParam);die;
			$code =  SmsSend($mobile, $TemplateCode,$TemplateParam);	
			//更改扣款状态 			
			$data_e['id'] = $data['id'];    //更改状态结算时间
			$data_e['status'] = '成功';
			$data_e['description'] = '无';			
			$data_e['action_time'] = time();
			$data_e['close_state'] = '待结算';			
			$fee = $lrrInfo['rate'];		
			//$total = number_format($data['tranAmt'] - $data['tranAmt'] * $fee/1000, 2, '.', '');
			$total = $data['payAmount'] -$fee;
			$data_e['close_amount'] = $total;				
			$data_e['pre_close_time'] = $data_e['action_time'] + $lrrInfo['period']*60*60*24;	
			$res = M('deduct')->save($data_e);	
			
			$data = array('status'=>1,'info' =>'扣款成功', 'url' => U('Deduct/lst'));
			$this->ajaxReturn ($data,'JSON');
		}else{	

			$data_e['id'] = $data['id'];    //写入失败原因
			$data_e['status'] = '失败';
			$data_e['description'] = $result;			
			$res = M('deduct')->save($data_e);	
			
			$data = array('status'=>0,'info' =>'扣款失败,原因:'.$result, 'url' => U('Deduct/lst'));
			$this->ajaxReturn ($data,'JSON');				
			
		}			
		
	}	
	
	
	//添加代扣
    public function add()
    {
		
		if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);
			
			$data_add['amount'] = $data['amount'];
			
			if($data_add['amount']==''){
				$data = array('status'=>0,'info' => '代扣金额不能为空', 'url' => U('Deduct/lst'));
				$this->ajaxReturn ($data,'JSON');
			}
			
			$khData = M('Client')->where(array('id'=>$data['kh_id']))->find();   //找出客户信息
			$data_add['payment_name'] = $khData['name'];
			$data_add['payment_mobile'] = $khData['mobile'];
			$data_add['payment_id_card'] = $khData['id_card_num'];
			
			$bankData = M('bank')->where(array('id'=>$data['bank_id']))->find();   //找出银行卡信息
			$data_add['bank']  = $bankData['bankname'];
			$data_add['bank_card_num'] = $bankData['bank_card_num'];
			
			$data_add['addtime'] = time();   
			$data_add['deductor_id'] = $_SESSION['auth_id'];   //提交人id
			$data_add['deductor_name'] = $_SESSION['truename'];   //提交人
			$data_add['close_state'] = '待结算';            //
			//var_dump($data_add);die;
				
			$db = M('deduct');		
			if ($id = $db->add($data_add)) {
				
				$khname = $_SESSION['truename'];   //通知管理员
				$day = date("Y-m-d");
				$time = date("H:i:s");
				//$mobile = '18128559019';
				$mobile = '18128559019';
				$TemplateCode = 'SMS_77005029';
				$TemplateParam = '{"khname":"'.$khname.'","day":"'.$day.'","time":"'.$time.'"}';				
				$code =  SmsSend($mobile, $TemplateCode,$TemplateParam);	
				sleep(1);
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Deduct/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} else {
				sleep(1);
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Deduct/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
		}

		
		//当前控制器名称
		$id         = I('id', 0, 'intval');
		//var_dump($id);die;
		//$yuefenList     = M('setting')->field("yuefen")->order('id asc')->select();  //找出月份	
		
		$ClientData = M('Client')->field('id,name,mobile,id_card_num')->where(array('id'=>$id))->find();
		//var_dump($ClientData);
		$this->assign('ClientData', $ClientData);
		
		$bankData = M('bank')->where(array('sid'=>$ClientData['id']))->select();   //找出银行卡信息
		//var_dump($bankData);
        $this->assign('bankData',$bankData);				
		
		$this->display();

    }	
	
	//找出客户姓名信息
    public function khnameajax()
    {
		$data          = I('post.');
		//print_r($data);die;
		
	    I('txt_search') ? $name = I('txt_search', '', 'htmlspecialchars,trim') : false;	
		$condition['name'] = array('like',"%$name%");	
		
		//print_r($condition);die;
		$condition['status'] = array('eq','通过');	  //通过的客户
		
		$Clientdata  = M('Client')->field("name")->where($condition)->select();     //取出客户信息
		//print_r(M('Client')->_sql());die;
		//print_r($Clientdata);die;
		echo json_encode($Clientdata);
		exit();		
	}	
	
	//找出客户资料信息
    public function Clientajax()
    {
		$name=$_POST['name'];      //传人的客户姓名
        //$id  = I('customerid', 0, 'intval');  //下拉框传入的客户id
		
		$ClientData = M('Client')->where(array('name'=>$name))->select();   //找出缴费人详细资料
		
		echo json_encode($ClientData);
	}	
	
	
	
    public function edit()
    {
        if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);die;
			$id            = $data['id'] = I('id', 0, 'intval');  //修改必须传ID，否则不会成功。
	/*         $data['weixin'] = trim($data['weixin']);

			if (empty($data['weixin'])) {
				$this->error('微信必须填写！');
			} */


			//如果其它id下面存在相同的微信则提示存在
			//if (M('pay')->where(array('weixin' => $data['weixin'], 'id' => array('neq', $id)))->find()) {
				//$this->error('失败，微信已经存在！');
			//}
			//if (M('pay')->where(array('mobile' => $data['mobile'], 'id' => array('neq', $id)))->find()) {
				//$this->error('失败，手机号码已经存在！');
			//}

			if (false !== M('deduct')->save($data)) {
				$data = array('status'=>1,'info' => '修改成功', 'url' => U('Deduct/lst'));
				$this->ajaxReturn ($data,'JSON');					
			} else {
				$data = array('status'=>0,'info' => '修改失败', 'url' => U('Deduct/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
        }

		
        //当前控制器名称
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;
        //$yuefenList     = M('setting')->field("yuefen")->order('id asc')->select();  //找出月份	
		
        $editlist = M('deduct')->where(array('id'=>$id))->find();
		//var_dump($editlist);
        //$this->assign('yuefenList', $yuefenList);
        $this->assign('editlist', $editlist);
        $this->display();		

    }

	

    public function detail()
    {
        //当前控制器名称
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;
        $detaillist = M('deduct')->where(array('id'=>$id))->find();
		//var_dump($detaillist);
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
		
		//deduct
		
		$del = M('deduct')->delete($id);

        if ($del) {
            //M('memberdetail')->delete($id);
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Deduct/lst'));
			$this->ajaxReturn ($data,'JSON');				
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Deduct/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }

    public function delBatch()
    {

        $idArr = I('key', 0, 'intval');
        if (!$idArr) {
			$data = array('status'=>0,'info' => '请选择要彻底删除的项', 'url' => U('Deduct/lst'));
			$this->ajaxReturn ($data,'JSON');
			exit;
        }
        $where = array('id' => array('in', $idArr));

        if ( M('deduct')->where(array('id' => array('in', $idArr)))->delete()) {
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Deduct/lst'));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Deduct/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }
	
	


}