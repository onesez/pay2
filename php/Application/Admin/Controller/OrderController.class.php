<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController {


    public function lst()
    {

		$condition = array();
		
		
        I('start')? $start = strtotime(I('start', '', 'htmlspecialchars,trim')): false;  //订单发起日期
        I('end')  ? $end = strtotime(I('end', '', 'htmlspecialchars,trim')) : false;
		
		if($start && $end){
        	$condition['pay_date'] = array('between',"$start,$end");
			$this->assign('start',I('start', '', 'htmlspecialchars,trim'));
			$this->assign('end',I('end', '', 'htmlspecialchars,trim'));
        }			

		I('totalstart')? $totalstart = I('totalstart', '', 'htmlspecialchars,trim'): false;  //金额
        I('totalend')  ? $totalend = I('totalend', '', 'htmlspecialchars,trim') : false;
		
		if($totalstart && $totalend){
        	$condition['pay_amount'] = array('between',"$totalstart,$totalend");
			$this->assign('totalstart',I('totalstart', '', 'htmlspecialchars,trim'));
			$this->assign('totalend',I('totalend', '', 'htmlspecialchars,trim'));
        }
		
        I('pay_order_id') ? $condition['pay_order_id'] = I('pay_order_id', '', 'htmlspecialchars,trim') : false;	
	    $this->assign('pay_order_id',I('pay_order_id'));

		I('pay_user') ? $condition['pay_user'] = I('pay_user', '', 'htmlspecialchars,trim') : false;	
	    $this->assign('pay_user',I('pay_user')); 

		I('order_num') ? $condition['order_num'] = I('order_num', '', 'htmlspecialchars,trim') : false;	
	    $this->assign('order_num',I('order_num'));

		I('user_id') ? $condition['user_id'] = I('user_id', '', 'htmlspecialchars,trim') : false;	
	    $this->assign('user_id',I('user_id'));

		I('pay_state') ? $condition['pay_state'] = I('pay_state', '', 'htmlspecialchars,trim') : false;	
	    $this->assign('pay_state',I('pay_state'));

		I('status') ? $condition['status'] = I('status', '', 'htmlspecialchars,trim') : false;	
	    $this->assign('status',I('status'));

		I('pay_product') ? $condition['pay_product'] = I('pay_product', '', 'htmlspecialchars,trim') : false;	
	    $this->assign('pay_product',I('pay_product'));	   
		

		//$status = I('status', '', 'htmlspecialchars,trim');   //客服模糊查询
        //if (!empty($status)) {
			//$condition['status'] = array('LIKE', "%{$status}%");
			//$this->assign('status',$status);
       // }	

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
			if($auth->check('dls', $auth_id)){				
				$rolename = '代理商';
				$dls = '1';
			}
			if($auth->check('price', $auth_id)){				
				$ddprice = '1';
			}			
		}else{
			$rolename = '高级';
			$ddprice = '1';
		}		
		//var_dump($rolename);
		switch ($rolename) {
			case '代理商':
				$condition['pay_user'] = array('eq', $_SESSION['auth_id']);
				break;
			case '高级':
				$condition['_string'] = '1=1';
				break;
			default:
				$condition['user_id'] = array('eq', $_SESSION['user_name']);
		}
		
		
		//var_dump($condition);
        $model = M('orderlist');
		//$count = $model->order('id desc')->where($condition)->count();
		
        $count = $model
            ->table('orderlist as a')
			->where($condition)
            ->join("left join `user` b on a.pay_user=b.user_name")
            ->field('a.*,b.id as adminid ,b.truename as parent_name')
			->count();
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
		
		$total1 = $model -> where($condition)->sum('pay_total');     	 //成功支付金额
		$total1 = sprintf("%.2f", $total1);
		
		$total2 = $model -> where($condition)->sum('pay_sell_fee');     
		$total2 = sprintf("%.2f", $total2);

		$total3 = $model -> where($condition)->sum('pay_to_member');     //应结算给客户金额
		$total3 = sprintf("%.2f", $total3);	

		$total4 = $model -> where($condition)->sum('pay_platform_fee');    //成本手续费
		$total4 = sprintf("%.2f", $total4);
		
		$total5 = $model -> where($condition)->sum('pay_to_boss');     //应收三方金额
		$total5 = sprintf("%.2f", $total5);	
		
		$total6 = $model -> where($condition)->sum('profit');    //单笔利润
		$total6 = sprintf("%.2f", $total6);	
		
		$total7 = $model -> where($condition)->sum('pay_user_commission');     //代理佣金
		$total7 = sprintf("%.2f", $total7);	
		
		$this->assign('total1',$total1);		
		$this->assign('total2',$total2);		
		$this->assign('total3',$total3);		
		$this->assign('total4',$total4);		
		$this->assign('total5',$total5);		
		$this->assign('total6',$total6);		
		$this->assign('total7',$total7);		
		
		//var_dump($model->_sql());
        $memberlist = $model 
            ->table('orderlist a')
			->where($condition)
            ->join("left join user b on a.pay_user=b.id")
            ->field('a.*,b.id as adminid ,b.truename as parent_name')	
			->order('id desc')
			->limit($Page->firstRow.','.$Page->listRows)
			->select();	
        //var_dump($model->_sql());
		// $this -> assign("order", $result);
		//echo $show;die;
		
        $productData = M('product')->field('product_name')->order('id asc')->select();  //找出产品类型
		$this->assign('productData',$productData);		
		
		
		session('condition',$condition);   //存入session便于导出

		$dailiData = M('user')->field('id,truename')->where(array('role_id'=>30))->select();   //所有代理商
        $this->assign('dailiData',$dailiData);			
		
		
        $this->assign('dls',$dls);
        $this->assign('ddprice',$ddprice);
        $this->assign('page',$show);
        $this->assign('memberlist',$memberlist);
    	$this->display();
    }
	
    public function miss()
    {

        $condition = array();
		//$_POST['user_id']= '677368';
		if(I('user_id')){
			$condition['closelist.username'] = I('user_id', '', 'htmlspecialchars,trim');
			$map['user_id'] = I('user_id', '', 'htmlspecialchars,trim');			
		}else{
			$condition['closelist.username'] = '677368';
			$map['user_id'] = '677368';
		}
	

		//I('user_id') ? $user_id= I('user_id', '', 'htmlspecialchars,trim') : false;	
	    //$this->assign('user_id',I('user_id'));
	
		
		
/*  		$auth = new \Think\Auth();   
		$auth_id = session('auth_id');  	//接受session	
		//var_dump($auth_id);
		if($auth_id!=1){    				//超级管理员不参与验证
			if($auth->check('gr', $auth_id)){				
				$rolename = '高级';
			}
			if($auth->check('price', $auth_id)){				
				$ddprice = '1';
			}			
		}else{
			$rolename = '高级';
			$ddprice = '1';
		}		
		//var_dump($rolename);
		switch ($rolename) {
			case '高级':
				$condition['_string'] = '1=1';
				break;
			default:
				$condition['user_id'] = array('eq', $_SESSION['user_name']);
		} */

				

		//$condition['closelist.username'] = array('eq', $user_id);		
		$subsql = M('closelist')->field('order_num')->where($condition)->buildSql();
		$map['pay_state'] = array('eq', '1');
		//$map['user_id'] = array('eq', $user_id);
		$map['order_num']  = array('exp','not in ('.$subsql.')');		
		//$memberlist = M('orderlist')->where($map)->select();		
		//var_dump(M('orderlist')->_sql());
		//var_dump($noJsdata);die;
		
		//var_dump($condition);

		
        $model = M('orderlist');
		$count = $model->order('id desc')->where($map)->count();
		
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
		
		$total1 = $model -> where($map)->sum('pay_total');     	 //成功支付金额
		$total1 = sprintf("%.2f", $total1);
		
		$total2 = $model -> where($map)->sum('pay_sell_fee');     
		$total2 = sprintf("%.2f", $total2);

		$total3 = $model -> where($map)->sum('pay_to_member');     //应结算给客户金额
		$total3 = sprintf("%.2f", $total3);	

		$total4 = $model -> where($map)->sum('pay_platform_fee');    //成本手续费
		$total4 = sprintf("%.2f", $total4);
		
		$total5 = $model -> where($map)->sum('pay_to_boss');     //应收三方金额
		$total5 = sprintf("%.2f", $total5);	


		
		$total6 = $model -> where($map)->sum('profit');    //单笔利润
		$total6 = sprintf("%.2f", $total6);	
		
		$this->assign('total1',$total1);		
		$this->assign('total2',$total2);		
		$this->assign('total3',$total3);		
		$this->assign('total4',$total4);		
		$this->assign('total5',$total5);		
		$this->assign('total6',$total6); 	
		
		//var_dump($model->_sql());
        $memberlist = $model ->order('id desc')->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
        //var_dump($model->_sql());
		// $this -> assign("order", $result);
		//echo $show;die;
		
        //$productData = M('product')->field('product_name')->order('id asc')->select();  //找出产品类型
		//$this->assign('productData',$productData);		
		
		
		//session('condition',$condition);   //存入session便于导出

		
        $this->assign('ddprice',$ddprice);
        $this->assign('page',$show);
        $this->assign('memberlist',$memberlist);
    	$this->display();
    }	
	
	//导出
    public function expOrder()
    {
		$condition = $_SESSION['condition'];
		$count = M('orderlist')->order('id desc')->where($condition)->count();
		if($count>10000){
			header("Content-Type: text/html; charset=UTF-8");
			echo exit("<script>alert('单次导出记录不得超过10000条');history.back();</script>");
		}		
		$xlsData = M('orderlist') ->order('id desc')->where($condition)->select();	
		//var_dump(count($xlsData));die;
		

        $xlsName  = 'Order';
        $xlsCell  = array(
            array('pay_date','商家订单提交日期'),
            array('user_id','商户ID'),
            array('pay_order_id','商家订单号'),
            array('pay_amount','商家提交金额'),
            array('order_num','系统订单号'),
            array('pay_state','支付状态'),
            array('pay_time','成功支付时间'),
            array('pay_time','理论结算时间'),
            array('pay_total','成功支付金额(元)'),
            array('pay_sell_rote','费率(‰)'),
            array('pay_sell_fee','手续费(元)'),
            array('pay_to_member','应结算金额'),
        );
  		//时间戳转日期格式
		foreach($xlsData as $key=>$val){
			$xlsData[$key]['pay_date'] = date('Y-m-d H:i:s',$xlsData[$key]['pay_date']);
			$xlsData[$key]['pay_time'] = date('Y-m-d H:i:s',$xlsData[$key]['pay_time']);
			$xlsData[$key]['pay_time'] = date('Y-m-d H:i:s',$xlsData[$key]['pay_time']);
			$xlsData[$key]['pay_state'] = ($xlsData[$key]['pay_state']==1)?'支付成功':'待支付';
		}
		
		//权限控制
 		$auth = new \Think\Auth();   
		$auth_id = session('auth_id');  	//接受session	
		if($auth_id!=1){    				//超级管理员不参与验证
		   $expp    = $auth->check('expp', $auth_id) ? 1 : 0;
		   $expdl    = $auth->check('expdl', $auth_id) ? 1 : 0;
		}else{
			$expp = '1';
			$expdl = '1';
		}

		if($expdl == '1'){			
            $xlsCell [] = array('pay_company_rote','代理费率');
            $xlsCell [] = array('pay_user_commission','代理佣金');		
		}
		if($expp == '1'){			
            $xlsCell [] = array('pay_platform_name','通道名称');	
            $xlsCell [] = array('pay_product','产品类型');	
            $xlsCell [] = array('pay_platform_rote','成本费率(‰)');	
            $xlsCell [] = array('pay_platform_fee','成本手续费(元)');	
            $xlsCell [] = array('pay_to_boss','三方应结算金额');	
            $xlsCell [] = array('profit','单笔利润');				
		}
		//var_dump($expp);
		//var_dump($xlsCell);die;
        exportExcel($xlsName,$xlsCell,$xlsData);
		session('condition', null);
		
	}	
	
	//添加
    public function add()
    {

        if (IS_POST) {
			$data  = I('post.');
			//var_dump($data);die;
			//sleep(1);				


			$url1=$_FILES['url1'];
			$url2=$_FILES['url2'];
			$url3=$_FILES['url3'];
			$url4=$_FILES['url4'];

			if($url1!=''){
				if($_FILES['url1']['error'] == 0)
				{
					$ret = uploadOne('url1', '', array());
					$data['url1'] = $ret['images'][0];
				}
			}

			$url2=$_FILES['url2'];		
			if($url2!=''){
				if($_FILES['url2']['error'] == 0)
				{
					$ret = uploadOne('url2', '', array());
					$data['url2'] = $ret['images'][0];
				}
			}

			$url3=$_FILES['url3'];	
			if($url3!=''){
				if($_FILES['url3']['error'] == 0)
				{
					$ret = uploadOne('url3', '', array());
					$data['url3'] = $ret['images'][0];
				}
			}

			$url4=$_FILES['url4'];		
			if($url4!=''){
				if($_FILES['url4']['error'] == 0)
				{
					$ret = uploadOne('url4', '', array());
					$data['url4'] = $ret['images'][0];
				}
			}
		
			//var_dump($data);die;			
 			//M验证
			 $rule = array(
				//array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱
				array('create_date', 'require', '请填写日期！'),
				array('name', 'require', '请填写姓名！'),
				array('mobile', 'require', '请填写手机号！'),
				array('id_card_num', 'require', '请填写身份证'),
				array('bank_card_num', 'require', '请填写银行卡号'),
				array('amount', 'require', '请填写授权金额'),
				array('pass_begin', 'require', '请填写授权起始日期'),
				array('pass_end', 'require', '请填写授权结束日期'),
				//array('name', '', '该客户姓名已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
			); 

			if (M('orderlist')->where(array('name' => $data['name'], 'id_card_num' => $data['id_card_num']))->find()){
				$data = array('status'=>0,'info' => '该客户已经存在', 'url' => U('Order/lst'));
				$this->ajaxReturn ($data,'JSON');						
			}			
			
			
			$db = M('orderlist');	
			if (!$db->validate($rule)->create()) {
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('Order/add'));
				$this->ajaxReturn ($data,'JSON');	
			} 

			$id = $db->add($data);   //插入客户表得到id值	
			
			$canshu1 = $data['canshu1'];
			$canshu2 = $data['canshu2'];			
			$length=count($canshu1);    //取得数组长度
			$dataList  =  array();    	//生成新的数组
			for($i = 0;$i<$length;$i++){
			  $t = array();
			  $t['sid'] = $id ;        			//order表中的id插入到bank中
			  $t['bankname'] =$canshu1[$i];    //追加
			  $t['bank_card_num'] =$canshu2[$i];    //追加
			  $dataList[$i] = $t;
			}	
			
			$db = M('bank');			
			if ($id = $db->addAll($dataList)) {
				$data = array('status'=>1,'info' => '添加成功', 'url' => U('Order/lst'));
				$this->ajaxReturn ($data,'JSON');					
			} else {
				$data = array('status'=>0,'info' => '添加失败', 'url' => U('Order/lst'));
				$this->ajaxReturn ($data,'JSON');					
			}
        }			

        $bankList     = M('bankcode')->order('id asc')->select();  
		$this->assign('bankList',$bankList);	

		$create_date = date('Y-m-d H:i:s');
		$this->assign('create_date', $create_date);				
		
        $this->display();
    }	

    public function bankajax()
    {
       $bankList  = M('bankcode')->field('bankname')->order('id asc')->select();	   
  	   $this->ajaxReturn ($bankList,'JSON');		
	}
		
	
	//审核
    public function pass()
    {
		if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);die;
			$id            = $data['id'] = I('id', 0, 'intval');  //修改必须传ID，否则不会成功。
			
			($data['status']=='通过')?$data['description'] = '审核通过':$data['description'] = $data['description'] ; //通过情况下原因为空
			
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
			//var_dump($data);die;
			if (false !== M('orderlist')->save($data)) {
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Order/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} else {
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Order/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
			exit();
		}

		
		//当前控制器名称
		$id         = I('id', 0, 'intval');
		//var_dump($id);die;
		//$yuefenList     = M('setting')->field("yuefen")->order('id asc')->select();  //找出月份	
		
		$editlist = M('orderlist')->where(array('id'=>$id))->find();
		$this->assign('editlist', $editlist);
		$this->display();
	}

	//补结算
    public function bjs()
    {
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;		
		$data_edit['status']= '2';
		$edit = M('orderlist')->where(array('id' => array('eq', $id)))->save($data_edit);	
        if(false!==$edit){
			$data = array('status'=>1,'info' => '操作成功', 'url' => U('Order/miss'));
			$this->ajaxReturn ($data,'JSON');				
		}else{
			$data = array('status'=>0,'info' => '操作失败', 'url' => U('Order/miss'));
			$this->ajaxReturn ($data,'JSON');			
		}		
	}
	
	//标记退款
    public function tuik()
    {
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;	
		
		$ddData = M('orderlist')->field('id,user_id,pay_to_member')->where(array('id' => array('eq', $id)))->find();	
		
		M()->startTrans();		
		$data = $this->tk_apply($ddData);		
		//var_dump($data);die;
		
		if($data['status'] && $data['status'] == 1){
			M()->commit(); 
		}else{
			M()->rollback(); 
		}	
		$this->ajaxReturn ($data,'JSON');
	}

	public function tk_apply($data){
		try {			
			$data_edit['pay_total']= '0';
			$data_edit['pay_company_rote']= '0';
			$data_edit['pay_sell_rote']= '0';
			$data_edit['pay_platform_fee']= '0';
			$data_edit['profit']= '0';
			$data_edit['pay_platform_rote']= '0';
			$data_edit['pay_platform_name']= '';
			$data_edit['pay_product']= '';
			$data_edit['pay_sell_fee']= '0';
			$data_edit['pay_to_member']= '0';
			$data_edit['pay_to_boss']= '0';
			$data_edit['pay_user']= NULL;
			$data_edit['pay_time']= NULL;
			$data_edit['pay_time']= NULL;
			$data_edit['pay_state']= '2';
			
			$edit = M('orderlist')->where(array('id' => array('eq', $data['id'])))->save($data_edit);	

			if ($edit) {
				$res = M('user')->where(array('user_name'=>$data['user_id']))->setDec('balance',$data['pay_to_member']);  //减余额	
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Order/lst'));
				return $data;		
			} else {	
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Order/lst'));
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
	

	//批量补结算
    public function bjs_Batch()
    {
        $idArr = I('key', 0, 'intval');
		//var_dump($idArr);die;
        if (!$idArr) {
            //$this->error('请选择要彻底删除的项');
			$data = array('status'=>0,'info' => '请选择需要补结的项目', 'url' => U('Order/miss'));
			$this->ajaxReturn ($data,'JSON');	
        }
        $where = array('id' => array('in', $idArr));
		$data_edit['status']= '2';
		$edit = M('orderlist')->where($where)->save($data_edit);
		//var_dump(M('orderlist')->_sql());die;
        if ($edit) {
			$data = array('status'=>1,'info' => '操作成功', 'url' => U('Order/miss'));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '操作失败', 'url' => U('Order/miss'));
			$this->ajaxReturn ($data,'JSON');	
        }	
	}	


	//补单
    public function reboot()
    {
		
		if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);die;
			if(empty($data['order_num'])){
				$data = array('status'=>0,'info' => '系统订单号不能为空', 'url' => U('Order/bd'));
				$this->ajaxReturn ($data,'JSON');
			}
			if(empty($data['pay_amount'])){
				$data = array('status'=>0,'info' => '金额不能为空', 'url' => U('Order/bd'));
				$this->ajaxReturn ($data,'JSON');
			}
			
			$yzmCode = $data['yzmCode'];
			if(empty($yzmCode)){
				$data = array('status'=>0,'info' => '短信验证码不能为空', 'url' => U('Order/bd'));
				$this->ajaxReturn ($data,'JSON');
			}
			
			
			//if($yzmCode!=$_SESSION['msg_rand']){
			if($yzmCode!='123456'){
				$data = array('status'=>0,'info' => '短信验证码不正确', 'url' => U('Order/bd'));
				$this->ajaxReturn ($data,'JSON');
			}	
			$id = $data['id'];
				
			$ddData = M('orderlist')->where(array('id' => array('eq', $id)))->find();    //得到订单信息	
			$payerData = M('user')->field('id,user_name,platform,period')->where(array('user_name' => array('eq', $ddData['user_id'])))->find(); //通过商户号找出付款人的id及结算周期	
			
			$data_edit['pay_time']= time();
			$data_edit['pay_total']= $ddData['pay_amount'];      //支付到国彩的金额
			//$data_edit['pay_total']= $request['TXN_AMT'];     //支付到国彩的金额
			
			//$map['user_id']  = array('eq',$payerData['id']);                //用户id
			//$map['platform_id']  = array('eq',$payerData['platform']);            //通道id
			//$map['product_sid']  = array('eq',$ddData['product_sid']); //业务类型id
			
			//$feilvData = M('rate')->where($map)->find(); //通过用户id,通道id,业务类型精确查找出本次交易的费率、手续费、利润
			$feilvData = M('rate')->where(array('id' => array('eq', $ddData['rote_id'])))->find(); //查找出本次交易的费率、手续费、结算周期
			//tolog(M('rate')->_sql());
			//toarr($feilvData);
			
			$data_edit['pay_platform_rote']= $feilvData['platform_rote'];      //成本费率                
			$data_edit['pay_sell_rote']= $feilvData['sell_rote'];        //销售费率			
			$data_edit['pay_platform_name']= $feilvData['platform_name'];        //通道名称
			$data_edit['pay_product']= $feilvData['product_name'];        //产品名称
			$period = $feilvData['period']; //结算周期
			
			$data_edit['pay_platform_fee']= bcdiv($data_edit['pay_total']*$data_edit['pay_platform_rote'],1000,6);    //成本手续费                
			$data_edit['pay_sell_fee']= bcdiv($data_edit['pay_total']*$data_edit['pay_sell_rote'],1000,6);   //销售手续费
			
			$data_edit['pay_to_boss']= $data_edit['pay_total']-$data_edit['pay_platform_fee'];    //显示给boss金额              
			$data_edit['pay_to_member']= $data_edit['pay_total']-$data_edit['pay_sell_fee'];    //显示给客户金额 
			
			

			//echo bcsub($a, $b, 5);  // -3.7660
			$data_edit['profit']= bcsub($data_edit['pay_to_boss'],$data_edit['pay_to_member'], 5);    //单笔利润 
			
			$data_edit['pay_time'] = $data_edit['pay_time'] + $period*60*60*24;  //理论结算时间
			
			$data_edit['pay_state']= '1';
			$edit = M('orderlist')->where(array('id' => array('eq', $id)))->save($data_edit);
			
			//$out_trade_no = $_POST['out_trade_no'];
			//$trade_no = $_POST['trade_no'];
			//$trade_status = $_POST['trade_status'];  
			//$sign = md5($out_trade_no."sign".$trade_no);
			
			$post_data = array(
				"pay_order_id" => $ddData['pay_order_id'],         //下家订单号
				"pay_amount" => $ddData['pay_amount'],             //下家金额
				"pay_remark" => $ddData['pay_remark'],             //下家备注
				"pay_product_name" => $ddData['pay_product_name'] //下家商品名称
			);
			$key = $ddData['md5key'];
			$post_data['sign'] = createSign($post_data,$key);	//签名		
			//toarr($post_data);
			$post_data = http_build_query($post_data);
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $ddData['pay_notify_url']);
			curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
			$data = curl_exec($curl);
			curl_close($curl);
			
			$res = array('status'=>1,'info' => '操作成功', 'url' => U('Order/lst'));
			$this->ajaxReturn ($res,'JSON');			
			
			
		}
        //当前控制器名称
        $id         = I('id', 0, 'intval');		
        $editlist = M('orderlist')->where(array('id'=>$id))->find();
        $this->assign('editlist', $editlist);	
		
		$codeid = getChar(20);
		session('codeid', $codeid);			
		$this->assign('codeid',$codeid);		
		
		$this->display();
		
	}
	
	
	//验证码
    public function regSms(){
		$arr = array(
			'a' => 50 ,    //比例
			'b' => 50
		);
		$result = randomSelect($arr);		
		if($result== 'a'){
			$mobile='18589052556';	
		}else{			
			$mobile='17666291925';			
		}		
		
		
		//$mobile='18589052556';
		
		//$mobile='13168426687';
		$codeid = $_POST['codeid'];
		
		if($codeid == $_SESSION['codeid']){
			$msg_rand=rand(100000,900000);
			$_SESSION['msg_rand'] = $msg_rand;
			$sms_template_code="SMS_120411635";  
			$mobile = $mobile;
			$sms_param ="{'code':'$msg_rand'}";
			$res = SmsSend($mobile,$sms_template_code,$sms_param);  
			//var_dump($res);die;
			if($res == "OK"){
				session($_SESSION['payid'], null);
				echo "发送成功";
				exit();
			}else{
				echo $res;
				exit();
			} 
		}else{
			echo "禁止外部发送";
			exit();
		}
    }

	
	

	//修改
    public function edit()
    {
        if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);die;
			
			$url1=$_FILES['url1'];	
			//var_dump($url1);die;
			if($url1!=''){
				if($_FILES['url1']['error'] == 0)
				{
					$ret = uploadOne('url1', '', array());
					$data['url1'] = $ret['images'][0];
				}
			}else{
				$order_edit  = M('orderlist')->where(array('id' => $id))->find();     //取出原有的
				$data['url1'] = $order_edit['url1'];
			}


			$url2=$_FILES['url2'];	
			//var_dump($url2);die;
			if($url2!=''){
				if($_FILES['url2']['error'] == 0)
				{
					$ret = uploadOne('url2', '', array());
					$data['url2'] = $ret['images'][0];
				}
			}else{
				$order_edit  = M('orderlist')->where(array('id' => $id))->find();     //取出原有的
				$data['url2'] = $order_edit['url2'];
			}

			$url3=$_FILES['url3'];	
			//var_dump($url3);die;
			if($url3!=''){
				if($_FILES['url3']['error'] == 0)
				{
					$ret = uploadOne('url3', '', array());
					$data['url3'] = $ret['images'][0];
				}
			}else{
				$order_edit  = M('orderlist')->where(array('id' => $id))->find();     //取出原有的
				$data['url3'] = $order_edit['url3'];
			}


			$url4=$_FILES['url4'];	
			//var_dump($url4);die;
			if($url4!=''){
				if($_FILES['url4']['error'] == 0)
				{
					$ret = uploadOne('url4', '', array());
					$data['url4'] = $ret['images'][0];
				}
			}else{
				$order_edit  = M('orderlist')->where(array('id' => $id))->find();     //取出原有的
				$data['url4'] = $order_edit['url4'];
			}
			
			$id   = $data['id'] = I('id', 0, 'intval');  //修改必须传ID，否则不会成功。
			//var_dump($data);die;
			

			$del = M('bank')->where(array('sid' => $id))->delete();   	//先删除再添加
			
			$canshu1 = $data['canshu1'];
			$canshu2 = $data['canshu2'];			
			$length=count($canshu1);    //取得数组长度
			$dataList  =  array();    	//生成新的数组
			for($i = 0;$i<$length;$i++){
			  $t = array();
			  $t['sid'] = $id ;        			//order表中的id插入到bank中
			  $t['bankname'] =$canshu1[$i];    //追加
			  $t['bank_card_num'] =$canshu2[$i];    //追加
			  $dataList[$i] = $t;
			}
			
			

			if (false !== M('orderlist')->save($data)) {
				M('bank')->addAll($dataList);     //修改银行
				$data = array('status'=>1,'info' => '修改成功', 'url' => U('Order/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} else {
				$data = array('status'=>0,'info' => '修改失败', 'url' => U('Order/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
			exit();
        }

		
        //当前控制器名称
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;
        //$yuefenList     = M('setting')->field("yuefen")->order('id asc')->select();  //找出月份	
		
        $editlist = M('orderlist')->where(array('id'=>$id))->find();
        $this->assign('editlist', $editlist);
		
		$editlist_edit = M('bank')->where(array('sid'=>$editlist['id']))->select();   //找出银行卡信息
        $this->assign('editlist_edit',$editlist_edit);			
		
        $this->display();		

    }

	//添加银行卡
    public function edit_ka()
    {
        if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);die;
			
			
			$id   = $data['id'] = I('id', 0, 'intval');  //修改必须传ID，否则不会成功。
			//var_dump($data);die;
			

			$del = M('bank')->where(array('sid' => $id))->delete();   	//先删除再添加			
			$canshu1 = $data['canshu1'];
			$canshu2 = $data['canshu2'];			
			$length=count($canshu1);    //取得数组长度
			$dataList  =  array();    	//生成新的数组
			for($i = 0;$i<$length;$i++){
			  $t = array();
			  $t['sid'] = $id ;        			//order表中的id插入到bank中
			  $t['bankname'] =$canshu1[$i];    //追加
			  $t['bank_card_num'] =$canshu2[$i];    //追加
			  $dataList[$i] = $t;
			}
			
			

			if (false !== M('orderlist')->save($data)) {
				M('bank')->addAll($dataList);     //修改银行
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Order/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} else {
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Order/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
			exit();
        }

		
        //当前控制器名称
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;
        //$yuefenList     = M('setting')->field("yuefen")->order('id asc')->select();  //找出月份	
		
        $editlist = M('orderlist')->where(array('id'=>$id))->find();
        $this->assign('editlist', $editlist);
		
		$editlist_edit = M('bank')->where(array('sid'=>$editlist['id']))->select();   //找出银行卡信息
        $this->assign('editlist_edit',$editlist_edit);			
		
        $this->display();		

    }

	

    public function detail()
    {
        //当前控制器名称
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;
        $detaillist = M('orderlist')->where(array('id'=>$id))->find();    //找出客户信息
        $this->assign('detaillist', $detaillist);
		
		$bankData = M('bank')->where(array('sid'=>$detaillist['id']))->select();   //找出银行卡信息
		//var_dump($bankData);
        $this->assign('bankData',$bankData);				
		
		
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
		
		//order
		
		$del = M('orderlist')->delete($id);

        if ($del) {
            //M('memberdetail')->delete($id);
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Order/lst'));
			$this->ajaxReturn ($data,'JSON');	
			//echo "<script>alert('删除成功!');location.href='{:U('Inventory/lst')}'</script>";
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Order/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }

    public function delBatch()
    {

        $idArr = I('key', 0, 'intval');
        if (!$idArr) {
            //$this->error('请选择要彻底删除的项');
			$data = array('status'=>0,'info' => '请选择要删除的项目', 'url' => U('Order/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
        $where = array('id' => array('in', $idArr));

        if ( M('orderlist')->where(array('id' => array('in', $idArr)))->delete()) {
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Order/lst'));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '删除成功', 'url' => U('Order/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }
	
	


}