<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends CommonController {

	//用户列表
    public function lst()  
    {

        $condition = array();				
        I('user_name') ? $condition['user_name'] = I('user_name', '', 'htmlspecialchars,trim') : false;
		$this->assign('user_name',I('user_name'));
		

		
		$truename = I('truename', '', 'htmlspecialchars,trim');   //
        if (!empty($truename)) {
			$condition['truename'] = array('LIKE', "%{$truename}%");
			$this->assign('truename',$truename);
        }

		$company_name = I('company_name', '', 'htmlspecialchars,trim');   //
        if (!empty($company_name)) {
			$condition['company_name'] = array('LIKE', "%{$company_name}%");
			$this->assign('company_name',$company_name);
        }			
		
        I('bumen') ? $condition['bumen'] = I('bumen', '', 'htmlspecialchars,trim') : false;
		$this->assign('bumen',I('bumen')); 

		I('title') ? $condition['title'] = I('title', '', 'htmlspecialchars,trim') : false;
		$this->assign('title',I('title'));

		I('is_lock') ? $condition['is_lock'] = I('is_lock', '', 'htmlspecialchars,trim') : false;
		$this->assign('is_lock',I('is_lock'));
		
		//var_dump($condition);
		
		
		//$data = M('user  as  a')->join('jifen  as  b  on b.id = a.id')->where('a.id  =  1')->select();
		
        $model = M('user');
		
        $count = $model
            ->table('user a')
            //->where("a.uid='$uid' and g.status='1'")
			->where($condition)
            ->join("auth_group_access b on a.id=b.uid")
            ->join("role c on b.group_id=c.id")
            ->field('a.id as id,user_name,truename,company_name,mobile,balance,title')->count();		
		//var_dump($count);die;
		
		//var_dump($model->_sql());
		
        $Page = new \Think\Page($count,300);
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
		
        $memberlist = $model
            ->table('user a')
            //->where("a.uid='$uid' and g.status='1'")
			->where($condition)
            ->join("auth_group_access b on a.id=b.uid")
            ->join("role c on b.group_id=c.id")
            ->field('a.id as id,user_name,truename,company_name,mobile,balance,title,is_lock,draw_money_lock')
			->order('id desc')
			->limit($Page->firstRow.','.$Page->listRows)
			->select();	
			
        $balanceTotal = $model
            ->table('user a')
			->where($condition)
            ->join("auth_group_access b on a.id=b.uid")
            ->join("role c on b.group_id=c.id")
			->sum('balance');				
		//var_dump($balanceTotal);
			
		//$total1 = $model -> where($condition)->sum('pay_total');     	 //成功支付金额
		$balanceTotal = sprintf("%.2f", $balanceTotal);
			
		
		//var_dump($model->_sql());
        $roleList     = M('role')->field('title')->order('id asc')->select();  //找出角色	
		$this->assign('roleList',$roleList);
		
		//$bumenList     = M('bumen')->field('id,bmname')->order('id asc')->select();   //找出小组名称
		//$this->assign('bumenList',$bumenList);		
		
		session('condition',$condition);   //存入session便于导出
		
        $this->assign('balanceTotal',$balanceTotal);
        $this->assign('page',$show);
        $this->assign('memberlist',$memberlist);
    	$this->display();		
	
    }
	
	//导出
    public function expClient()
    {
		$condition = $_SESSION['condition'];
		//var_dump($condition);die;
        $xlsData = M('user')
            ->table('user a')
            //->where("a.uid='$uid' and g.status='1'")
			->where($condition)
            ->join("auth_group_access b on a.id=b.uid")
            ->join("role c on b.group_id=c.id")
            ->field('a.id as id,user_name,truename,company_name,mobile,balance,title,is_lock,draw_money_lock')
			->order('id asc')
			->limit($Page->firstRow.','.$Page->listRows)
			->select();			
		
		//var_dump(count($xlsData));die;

        $xlsName  = 'Member';
        $xlsCell  = array(
            array('user_name','用户名'),
            array('company_name','商户名称'),
            array('truename','真实姓名'),
            array('mobile','手机号码'),
            array('balance','账户余额(元)'),
            array('title','用户角色'),
        );
  		//时间戳转日期格式
/* 		foreach($xlsData as $key=>$val){
			$xlsData[$key]['pay_date'] = date('Y-m-d H:i:s',$xlsData[$key]['pay_date']);
			$xlsData[$key]['pay_time'] = date('Y-m-d H:i:s',$xlsData[$key]['pay_time']);
			$xlsData[$key]['pay_time'] = date('Y-m-d H:i:s',$xlsData[$key]['pay_time']);
			$xlsData[$key]['pay_state'] = ($xlsData[$key]['pay_state']==1)?'支付成功':'待支付';
		} */
        exportExcel($xlsName,$xlsCell,$xlsData);
		session('condition', null);
		
	}	
	
	
	//通道ajax
    public function tdajax()
    {
	   $tdid = I('tdid', 0, 'intval');
	   $tdDetail = M('platform')->field('id,period')->where(array('id'=>$tdid))->find();  //找出通道结算属性
	   //var_dump($tdDetail);die;
	   $tdData['draw_mode'] =  $tdDetail['period'];
	   $tdData['info']= M('platform_profile')->field('platform_profile.*,product.product_name')->join('left join product on platform_profile.product_id=product.id')->where(array('platform_id'=>$tdid))->order('id asc')->select();  //找出通道附属产品
  	   
  	   //var_dump($tdData);die;
	   $this->ajaxReturn ($tdData,'JSON');		
	}

	
	
	//返回金额汇总
    public function totalajax()
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
		   
		   $txUser  = M('user')->field('id,user_name,balance')->where(array('id'=>$id))->find();   //查询人
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
		   $cha1 =$real_balance-$realTotal ;
		   if($realTotal>0 && $cha1>0 ){ //不为负，但实际余额大于真实余额
			   $edit['balance']= $realTotal;  //强制一致
			   $res = M('user')->where(array('id'=>$id))->save($edit); 
			   toarr(M('user')->_sql());
		   }
		   $this->ajaxReturn ($data,'JSON');			
			
		}
		
	}
	
	

	//添加用户
    public function add()
    {
        if (IS_POST) {
        
			$data  = I('post.');
			//var_dump($data);die;
			
			$role_id= $data['role_id'];     //接收角色id			
			//$platform_id= $data['platform_id'];     //通道名称			
			
			//$_POST['role_id'] = $role_id;	              //一定要改为POST,否则data无法添加
			$_POST['password'] = md5(I('password', ''));  //一定要改为POST,否则data无法添加
			
			
			//var_dump($data);die;
			

			//M验证
			 $validate = array(
				//array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱
				array('user_name', 'require', '请填写用户名！'),
				array('md5key', 'require', '请填写商户密钥！'),
				//array('user_name','/^[u4E00-u9FA5]+$/','请填写非中文的用户名！'),
				array('password', 'require', '请填写密码！'),
				array('truename', 'require', '请填写真实姓名！'),
				array('role_id', 'require', '请填写角色'),
				//array('platform_id', 'require', '请填写通道名称'),
				array('user_name', '', '用户名已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
				array('md5key', '', '商户密钥已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
			);

			$db = M('user');
			if (!$db->validate($validate)->create()) {
				//$this->error($db->getError());
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} 

			if ($id = $db->add()) {                                 //不能用add(data),否则密码不会被md5
					$gr_data['uid'] = $id;            				//admin用户表返回的id
					$gr_data['group_id'] = $role_id;				//角色id
					$res = M('auth_group_access')->add($gr_data);  //插入到auth_group_access中	
					
					//添加银行信息
					$canshu1 = $data['canshu1'];            
					$canshu2 = $data['canshu2'];			
					$length=count($canshu1);    //取得数组长度
					$dataList  =  array();    	//生成新的数组
					for($i = 0;$i<$length;$i++){
					  $t = array();
					  $t['sid'] = $id ;        			//admin表中的id插入到bank中
					  $t['bankname'] =$canshu1[$i];    //追加
					  $t['bank_card_num'] =$canshu2[$i];    //追加
					  $dataList[$i] = $t;
					}	
					$add = M('bank')->addAll($dataList);
					//添加银行信息end


					
				$data = array('status'=>1,'info' => '添加成功', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');				
			} else {
				$data = array('status'=>0,'info' => '添加失败', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
        }
		
        $roleList     = M('role')->field('id,title')->order('id asc')->select();   //找出角色id和角色名称
		$this->assign('roleList',$roleList); 

		$md5key = getChar('32');   //生成key
		$this->assign('md5key',$md5key);
		
		$user_name = getChar('6','1');   //生成用户名
		$this->assign('user_name',$user_name);
		
        $platformList     = M('platform')->order('id asc')->select();   //找出通道
	    $this->assign('platformList',$platformList);	
		
		$dailiData = M('user')->field('id,truename')->where(array('role_id'=>30))->select();   //所有代理商
		//var_dump($dailiData);die;
        $this->assign('dailiData',$dailiData);			
		
        $this->display();
    }	

	//通道选择
    public function status()
    {
        if (IS_POST) {
			$data  = I('post.');
			$uid = $data['user_id'];
			//var_dump($data);die;
			//var_dump(implode(",",$data));die;
			$map['is_use'] = '2';   //先全部取消变成2
			if (false !== M('rate')->where(array('user_id' => array('eq', $data['user_id'])))->save($map)) {
				unset($data['user_id']);  //务必去掉userid
				$idArr = implode(",",$data);	
				$where = array('id' => array('in', $idArr));
				$data['is_use'] = '1';
				$res = M('rate')->where($where)->save($data);   //更新选中的通道为1
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Member/channel_set',array("id"=>$uid)));
				$this->ajaxReturn ($data,'JSON');
			}else{
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');
			}

		}		
		
	}
	
	//配置通道
    public function channel_set()
    {
		if (IS_POST) {
			$data  = I('post.');
			if($data['user_id']==''){
				$data['user_id']='0' ;
			}
			if(empty($data['platform_id'])){
				$data = array('status'=>0,'info' => '请选择通道', 'url' => U('Member/channel_set'));
				$this->ajaxReturn ($data,'JSON');				
			}
			
			//先删除再添加	
			$del = M('rate')->where(array('user_id' => $data['user_id'], 'platform_id' => $data['platform_id']))->delete();   	 
			

			$tdData = M('platform')->where(array('id'=>$data['platform_id']))->find();    //找出通道信息
			$platform_name = $tdData['platform'];
			$canshu11 = $data['sell_rote'];      //销售费率      
			$canshu22 = $data['product_sid'];	
			$canshu33 = $data['rote'];	  //成本费率
			$canshu44 = $data['product_name'];	  //产品名称
			$canshu55 = $data['period'];      //结算周期   
			$canshu66 = $data['company_rote'];      //代理费率  
			//var_dump($canshu11);
			//var_dump($canshu22);die;	
			$length=count($canshu11);    //取得数组长度
			$dataList  =  array();    	//生成新的数组
			for($i = 0;$i<$length;$i++){					
			  $t = array();
			  $t['user_id'] = $data['user_id'] ;        	         //代理id插入到feilv中
			  $t['user_id'] = $data['user_id'] ;        	         //admin表中的id插入到feilv中
			  $t['platform_id'] = $data['platform_id'] ;        	     //通道id插入到feilv中
			  $t['draw_mode'] = $data['period'] ;        	 //通道结算属性插入到feilv中
			  $t['platform_name'] = $platform_name ;   //通道名称插入到feilv中
			  $t['sell_rote'] =$canshu11[$i];     //追加
			  $t['product_sid'] =$canshu22[$i];    //追加
			  $t['platform_rote'] =$canshu33[$i];    //追加
			  $t['product_name'] =$canshu44[$i];    //追加
			  $t['period'] =$canshu55[$i];    //追加
			  $t['company_rote'] =$canshu66[$i];    //追加
			  $dataList[$i] = $t;
			  if($t['sell_rote']==''){
				 unset($dataList[$i]);  
			  }			  
			}	
			//添加费率信息end	
			
			if(M('rate')->addAll($dataList)){                          
				$data = array('status'=>1,'info' => '操作成功11', 'url' => U('Member/channel_set',array("id"=>$data['user_id'])));
				$this->ajaxReturn ($data,'JSON');
			}else{				
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');				
			}
			
		}		
		
        //当前控制器名称
        $id         = I('id', 0, 'intval');	
		$userData= M('user')->where(array('id'=>$id))->find();  //找出用户信息
        $this->assign('userData', $userData); 
		
		$dailiUser= M('user')->field('id,truename')->where(array('id'=>$userData['parent_name']))->find();  //找出此用户上级代理信息		
		//var_dump($dailiUser);
		$this->assign('dailiUser',$dailiUser);	
		
        $platformInfo     = M('platform')->where(array('status'=>'1'))->order('id asc')->select();   //找出通道
	    $this->assign('platformInfo',$platformInfo);	

        //找出通道
		$platformList=M('rate')
		->field("rate.*,platform_profile.product_id,platform_profile.platform_id,platform_profile.is_run")
		->join('left join platform_profile ON rate.platform_id = platform_profile.platform_id and rate.product_sid = platform_profile.product_id')	
		->where(
			array(
				'platform_profile.is_run' => array('eq', 1),
				'user_id' => array('eq', $userData['id'])
			)
		)->order('id asc')->select();

		//var_dump($platformList);die;
		$this->assign('platformList',$platformList);
		
		
        $productList     = M('product')->order('id asc')->select();  //找出所有产品		
        $rate=M('rate');  
        foreach ($productList as $key => $value) {
			$productList[$key]['info']=$rate
			->field("rate.*,platform_profile.product_id,platform_profile.platform_id,platform_profile.is_run")
			->join('left join platform_profile ON rate.platform_id = platform_profile.platform_id and rate.product_sid = platform_profile.product_id')		
			->where(
				array(
					'platform_profile.is_run' => array('eq', 1),
					'product_sid' => $value['id'], 
					'user_id' => array('eq', $userData['id'])
				)
			)			
			->select();
			//var_dump($rate->_sql());die;
        }
		//print_r($productList);die;
		$this->assign('productList',$productList);
        $this->display();		
	}	
	
    //删除费率
    public function fldel_ajax()
    {

        $uid         = I('uid', 0, 'intval');    
        $tdid         = I('tdid', 0, 'intval');  
		
		$del = M('rate')->where(array('user_id' => $uid, 'platform_id' => $tdid))->delete();

        if ($del) {
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Member/edit',array("id"=>$uid)));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Member/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }	
	
	
	//系统调账
    public function fixbalance()
    {

        if (IS_POST) {
			$data  = I('post.');
			//var_dump($data);die;	

			$_POST['jsaddtime'] = time();
			$_POST['jsjine'] = $data['tzjine'];

			
 			//M验证
			 $rule = array(
				//array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱
				//array('jsaddtime', 'require', '调账日期不能为空！'),
				//array('user_name', 'require', '申请人姓名不能为空！'),
				//array('mobile', 'require', '申请人手机不能为空！'),
				array('jsjine', 'require', '调账金额不能为空'),
				array('jsjine','/^([0-9]+(.[0-9]{1,2})?)|(-[0-9]+(.[0-9]{1,2})?)$/','调账金额格式不正确'),				
				//array('name', '', '该客户姓名已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
			); 
			
			
			$db = M('closelist');			
			if (!$db->validate($rule)->create()) {
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('Member/fixbalance'));
				$this->ajaxReturn ($data,'JSON');	
			} 
		
			$userInfo= M('user')->field("id,user_name,truename,company_name,balance")->where(array('id'=>$data['id']))->find();
			//var_dump($jsdata);die;
			if(!empty($_POST['jsjine'])) {    
				$data_edit['balance'] = $userInfo['balance']+$data['tzjine'];				
				M('user')->where(array('id'=>$data['id']))->save($data_edit);  //更改余额			
				sleep(1);
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');					
			} else {
				sleep(1);
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');					
			}
        }			

        //当前控制器名称
        $id         = I('id', 0, 'intval');	
		$userData= M('user')->where(array('id'=>$id))->find();
        $this->assign('userData', $userData); 
		
		$tzriqi = date('Y-m-d H:i:s');
		$this->assign('tzriqi', $tzriqi);				
		
        $this->display();
    }	
	
	
	
	//修改用户
    public function edit()
    {		
		
        if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);die;
			//sleep(1);
			
			$id            = $data['id'] = I('id', 0, 'intval');   //一定要传id，否则无法使用save方法。
			$data['user_name'] = trim($data['user_name']);
			$role_id = $data['role_id'];
			$password = $data['password'];
			
			if (empty($data['user_name'])) {
				$data = array('status'=>0,'info' => '用户名必须填写', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');				
			}
			if (empty($data['role_id'])) {
				$data = array('status'=>0,'info' => '角色必须填写', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');				
			}	
			
			if($password==''){  		//如果密码为空，则表示未修改密码
				$adminData = M('user')->where(array('id'=>$id))->find();	//找出原有的密码
				$data['password'] = $adminData['password'];  
			}else{
				$data['password'] = md5(I('password', '', 'htmlspecialchars,trim'));   //否则等于新密码
			}	
			
			//如果其它id下面存在相同的用户则提示存在
			if (M('user')->where(array('user_name' => $data['user_name'], 'id' => array('neq', $id)))->find()) {
				$data = array('status'=>0,'info' => '用户已经存在', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');
			}


			if (false !== M('user')->save($data)) {
				
				//$gr_data['uid'] = $id;            				//admin用户表返回的id
				$gr_data['group_id'] = $role_id;				//角色id
				$res = M('auth_group_access')->where(array('uid'=>$id))-> save($gr_data);  //修改auth_group_access中

				$del = M('bank')->where(array('sid' => $id))->delete();   	//先删除再添加				
				$canshu1 = $data['canshu1'];
				$canshu2 = $data['canshu2'];			
				$length=count($canshu1);    //取得数组长度
				$dataList  =  array();    	//生成新的数组
				for($i = 0;$i<$length;$i++){
				  $t = array();
				  $t['sid'] = $id ;        			//Client表中的id插入到bank中
				  $t['bankname'] =$canshu1[$i];    //追加
				  $t['bank_card_num'] =$canshu2[$i];    //追加
				  $dataList[$i] = $t;
				}
				M('bank')->addAll($dataList);     //执行添加
				
				
				$data = array('status'=>1,'info' => '修改成功', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');
			} else {
				$data = array('status'=>0,'info' => '修改失败', 'url' => U('Member/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
        }

        //当前控制器名称
        $id         = I('id', 0, 'intval');		
        $roleList     = M('role')->field('id,title')->order('id asc')->select();   //找出角色id和角色名称供下拉框使用
		$this->assign('roleList',$roleList);	
		
		//$bumenList     = M('bumen')->field('id,bmname')->order('id asc')->select();   //找出小组名称
		//$this->assign('bumenList',$bumenList);		
		
		//联合查询得到用户名和角色名字
		$model = M('user');
        $editlist = $model
            ->table('user a')
            //->where("a.uid='$uid' and g.status='1'")
			->where(array('a.id'=>$id))
            ->join("auth_group_access b on a.id=b.uid")
            ->join("role c on b.group_id=c.id")
            ->field('a.id as id,user_name,truename,company_name,mobile,address,platform,period,rate,id_card_num,title,md5key,is_lock,draw_money_lock,lock_ratio,parent_name')->find();  //find 方法
		//var_dump($model->_sql());die;
		$this->assign('editlist', $editlist);   
		//var_dump($editlist);
		
		$bankData = M('bank')->where(array('sid'=>$editlist['id']))->select();   //找出银行卡信息
        $this->assign('bankData',$bankData);

		$feilvData = M('rate')->where(array('user_id'=>$editlist['id']))->select();   //找出费率信息
        $this->assign('feilvData',$feilvData);

        $platformList     = M('rate')->field('id,user_id,platform_id,platform_name,period')->where(array('user_id'=>$editlist['id']))->group('platform_id')->order('id asc')->select();   //找出通道
        // $rate=M('rate');  
        // foreach ($platformList as $key => $value) {
		// 	$platformList[$key]['rate']=$rate->where(array('platform_id' => $value['platform_id'], 'user_id' => array('eq', $editlist['id'])))->select();
        // }
		//print_r($platformList);die;

		$dailiData = M('user')->where(array('role_id'=>30))->select();   //找出所有代理商
        $this->assign('dailiData',$dailiData);		
		
		$this->assign('platformList',$platformList);
        $this->display();
    }

	//用户详情
    public function detail()
    {		
		
        //当前控制器名称
        $id         = I('id', 0, 'intval');			
        $user_name         = I('user_name', '', 'htmlspecialchars,trim');	
		//var_dump($user_name);die;
        $roleList     = M('role')->field('id,title')->order('id asc')->select();   //找出角色id和角色名称供下拉框使用
		$this->assign('roleList',$roleList);	
		
		//$bumenList     = M('bumen')->field('id,bmname')->order('id asc')->select();   //找出小组名称
		//$this->assign('bumenList',$bumenList);		
		

		$condition['a.id']  = array('eq',$id);
		$condition['user_name']  = array('eq',$user_name);
		$condition['_logic'] = 'OR';
		
		
		//联合查询得到用户名和角色名字
		$model = M('user');
        $detaillist = $model
            ->table('user a')
            //->where("a.uid='$uid' and g.status='1'")
			->where($condition)
            ->join("auth_group_access b on a.id=b.uid")
            ->join("role c on b.group_id=c.id")
            ->field('a.id as id,user_name,truename,company_name,balance,mobile,address,period,rate,id_card_num,title,md5key,is_lock,platform')->find();  //find 方法
		//var_dump($model->_sql());die;
		$this->assign('detaillist', $detaillist);   
		//var_dump($detaillist);
		
		
		$bankData = M('bank')->where(array('sid'=>$detaillist['id']))->select();   //找出银行卡信息
        $this->assign('bankData',$bankData);

        $platformList     = M('rate')->field('id,user_id,platform_id,platform_name,period')->where(array('user_id'=>$detaillist['id']))->order('id asc')->select();   //找出通道
        // $rate=M('rate');  
        // foreach ($platformList as $key => $value) {
		// 	$platformList[$key]['rate']=$rate->where(array('platform_id' => $value['platform_id'], 'user_id' => array('eq', $detaillist['id'])))->select();
        // }
		// //print_r($platformList);	die;		
		
		$this->assign('platformList',$platformList);	
        $this->display();
    }

	//删除用户
    public function del()
    {

        $id         = I('id', 0, 'intval');    //得到id
        //$batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
		// if ($batchFlag) {
           // $this->delBatch();
            //return;
        //}
		
		//Client
		
		$del = M('user')->delete($id);

        if ($del) {
            M('auth_group_access')->where(array('uid'=>$id))->delete();   //同时删除auth_group_access
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Member/lst'));
			$this->ajaxReturn ($data,'JSON');
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Member/lst'));
			$this->ajaxReturn ($data,'JSON');
        }
    }

	//批量删除
    public function delBatch()
    {

        $idArr = I('key', 0, 'intval');
        if (!$idArr) {
            //$this->error('请选择要彻底删除的项');
			//echo json_encode('请选择要删除的项目！');
			$data = array('status'=>0,'info' => '请选择要删除的项目', 'url' => U('Member/lst'));
			$this->ajaxReturn ($data,'JSON');			
			exit;
        }
        $where = array('id' => array('in', $idArr));

        if ( M('user')->where(array('id' => array('in', $idArr)))->delete()) {
			M('auth_group_access')->where(array('uid' => array('in', $idArr)))->delete();   //同时删除auth_group_access
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Member/lst'));
			$this->ajaxReturn ($data,'JSON');
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Member/lst'));
			$this->ajaxReturn ($data,'JSON');
        }
    }

	
	


}