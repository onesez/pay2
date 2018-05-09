<?php
namespace Admin\Controller;
use Think\Controller;
class AcountController extends CommonController {



	
    public function password()
    {
        //当前控制器名称
        //$id         = I('id', 0, 'intval');
		//var_dump($id);die;


        if (IS_POST) {
			$data          = I('post.');
			//sleep(2);
			//var_dump($data);die;
			//$id            = $data['id'] = I('id', 0, 'intval');   //
			$user_name = trim($data['user_name']);
			$nowpassword = trim($data['nowpassword']);
			$newpassword = trim($data['newpassword']);
			$renewpassword = trim($data['renewpassword']);

			//判断当前的密码
			//$data = M('member')->where(array('password' => md5($data['nowpassword']), 'username' => array('eq', $username)))->find();
			//var_dump(M('member')->_sql());die;
			if (!(M('user')->where(array('password' => md5($data['nowpassword']), 'user_name' => array('eq', $user_name)))->find())) {
				$data = array('status'=>0,'info' => '修改失败，当前密码不正确！', 'url' => U('Member/repass'));
				$this->ajaxReturn ($data,'JSON');					
			}
			
			 if ($newpassword!=$renewpassword) {
				$data = array('status'=>0,'info' => '重复密码不正确', 'url' => U('Member/repass'));
				$this->ajaxReturn ($data,'JSON');	
			}
			

			$data_id = M('user')->where(array('user_name'=>$user_name))->find();   //TP框架save 方法必须传id值
			
			$data['id']=$data_id['id'];         //先查询再放入到data中。
			$data['password']  = md5($newpassword);


			if (false !== M('user')->save($data)) {
				session(null); 
				$data = array('status'=>1,'info' => '修改成功,请重新登录!', 'url' => U('Home/Index/index')); //跳回登录页面
				$this->ajaxReturn ($data,'JSON');	
			} else {
				$data = array('status'=>0,'info' => '修改失败,请重新输入!', 'url' => U('Acount/edit'));
				$this->ajaxReturn ($data,'JSON');	
			}
        }

        $this->display();
    }

	public function mobile()
    {
        $userData= M('user')->field('mobile')->where(array('user_name'=>$_SESSION['user_name']))->find();
		//var_dump($userData);
        $this->assign('userData', $userData);  //因为TP框架save方法的时候必须
        $this->display();


    }

	public function demo()
    {
        //$userData= M('user')->field('mobile')->where(array('user_name'=>$_SESSION['user_name']))->find();
		//var_dump($userData);
        //$this->assign('userData', $userData);  //因为TP框架save方法的时候必须
        $this->display();


    }
	
	//实名认证
	public function realname()
    {
        if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);die;
			

			$userInfo= M('user')->where(array('user_name'=>$_SESSION['user_name']))->find(); 
			$sid = $userInfo['id'] ;
			$data['id'] = $userInfo['id'] ; //必须传入修改条件,否则修改不成功
			
			
			$del = M('bank')->where(array('sid' => $sid))->delete();   	//先删除原有银行再添加			
			
			$canshu1 = $data['canshu1'];
			$canshu2 = $data['canshu2'];			
			$length=count($canshu1);    //取得数组长度
			$dataList  =  array();    	//生成新的数组
			for($i = 0;$i<$length;$i++){
			  $t = array();
			  $t['sid'] = $sid ;        	   //admin表中的id插入到bank中
			  $t['bankname'] =$canshu1[$i];    //追加
			  $t['bank_card_num'] =$canshu2[$i];   //追加
			  $dataList[$i] = $t;
			}
			//var_dump($dataList);die;
			
			if (false !== M('user')->save($data)) {
				M('bank')->addAll($dataList);     //修改银行 
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Acount/realname'));
				$this->ajaxReturn ($data,'JSON');
			} else {
				$data = array('status'=>0,'info' => '修改失败,请重新输入!', 'url' => U('Acount/realname'));
				$this->ajaxReturn ($data,'JSON');	
			}
        }        
		
		
		$userData= M('user')->where(array('user_name'=>$_SESSION['user_name']))->find();
		//var_dump($userData);
        $this->assign('userData', $userData); 
		
		$bankData = M('bank')->where(array('sid'=>$userData['id']))->select();   //找出银行卡信息
        $this->assign('bankData',$bankData);					
		
        $this->display();


    }

	//入金
	public function pay()
    {
        
		if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);die;
			
			$rule = array(
				array('pay_total', 'require', '入金金额不能为空！'),
				array('pay_total','/^(?!0)\d{1,9}$/','入金金额格式不正确'),				
				//array('name', '', '该客户姓名已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
			); 	
			
			$db = M('orderlist');			
			if (!$db->validate($rule)->create()) {
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('Acount/pay'));
				$this->ajaxReturn ($data,'JSON');
			} 	
			
			$userData= M('user')->field('user_name,md5key')->where(array('user_name'=>$_SESSION['user_name']))->find();
			//var_dump($userData);die;
			$payData = array(
				'user_id'=>$userData['user_name'],
				'md5key'=>$userData['md5key'],
				'pay_total'=>$data['pay_total'],
				'product_sid'=>$data['product_sid'],
				'pay_bank_code'=>$data['pay_bank_code']
			);
			$this -> paySend($payData);
        }        
		
		
		$userData= M('user')->where(array('user_name'=>$_SESSION['user_name']))->find();
		//var_dump($userData);
        $this->assign('userData', $userData); 
        $this->display();


    }

	
    //入金执行
    public function paySend($data)
    {
		//var_dump($data);die;
		$user_id = $data['user_id'];
		$md5key = $data['md5key'];
		$product_sid = $data['product_sid'];
		$pay_bank_code = $data['pay_bank_code'];
		$pay_date = time();
		$pay_order_id = getChar('20','');
		$pay_product_name = '其它';
		$pay_amount = $data['pay_total'];
		$pay_remark = '';
		$pay_notify_url = 'http://www.baidu.com';
		$pay_return_url = 'http://'.$_SERVER['HTTP_HOST'].'/index.php/Admin/Acount/pay';
		$pay_extend1 = '';
		$pay_extend2= '';



	//构造要加密的参数数组
		$data = array(
			"user_id"	=> $user_id,
			//"md5key"	=> $md5key,  
			"pay_input_charset"	=> '1',
			"product_sid"	=> $product_sid,
			"pay_date"  =>$pay_date,
			"pay_order_id"  =>$pay_order_id,
			"pay_product_name"  => $pay_product_name,
			"pay_amount"  => $pay_amount,
			"pay_notify_url"	=> $pay_notify_url,	
			"pay_return_url"	=> $pay_return_url,			
		);
		$key = $md5key;
		$sign = createSign($data,$key);
		
		$data['pay_sign'] = $sign;
		$data['pay_bank_code'] = $pay_bank_code;
		$data['pay_remark'] = $pay_remark;
		$data['pay_extend1'] = $pay_extend1;
		$data['pay_extend2'] = $pay_extend2;
		//$data['pay_extend3'] = '1111';
		//$rs = httpClient($data,PAY_URL);
		$url = 'http://106.14.206.106';
		//var_dump($data);die;
		if (count($data) > 0) {
			$string = "<form style='display:none;' id='form1' name='form1' method='post' action='" . $url . "'>";
			foreach ($data as $key => $value) {
				if (!isset($value) || is_null($value) || empty($value)) {
					unset($data[$key]);
					continue;
				} else {
					$string .= "<input name='" . $key . "' type='text' value='" . $value . "' />";
				}
			}
			$string .= "</form>";
			$string .= "<script type='text/javascript'>function load_submit(){document.form1.submit()}load_submit();</script>";
			echo $string;
		}
	}


	
    //删除
    public function del()
    {

        $id        = I('id', 0, 'intval');
        //$batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
		// if ($batchFlag) {
           // $this->delBatch();
            //return;
        //}

        if (M('user')->delete($id)) {
            //M('memberdetail')->delete($id);
            $this->success('彻底删除成功', U('Member/repass'));
        } else {
            $this->error('彻底删除失败');
        }
    }

    public function delBatch()
    {

        $idArr = I('key', 0, 'intval');
        if (!is_array($idArr)) {
            $this->error('请选择要彻底删除的项');
        }
        $where = array('id' => array('in', $idArr));

        if (M('member')->where($where)->delete()) {
            M('memberdetail')->where(array('userid' => array('in', $idArr)))->delete();
            $this->success('彻底删除成功', U('Member/index'));
        } else {
            $this->error('彻底删除失败');
        }
    }
	
	


}