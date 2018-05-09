<?php
namespace Admin\Controller;
use Think\Controller;
class ClientController extends CommonController {


    public function lst()
    {

        $condition = array();
		
		$name = I('name', '', 'htmlspecialchars,trim');   //客服模糊查询
        if (!empty($name)) {
			$condition['name'] = array('LIKE', "%{$name}%");
			$this->assign('name',$name);
        }

		$mobile = I('mobile', '', 'htmlspecialchars,trim');   //客服模糊查询
        if (!empty($mobile)) {
			$condition['mobile'] = array('LIKE', "%{$mobile}%");
			$this->assign('mobile',$mobile);
        }

		$handler = I('handler', '', 'htmlspecialchars,trim');   //客服模糊查询
        if (!empty($handler)) {
			$condition['handler'] = array('LIKE', "%{$handler}%");
			$this->assign('handler',$handler);
        }

		$status = I('status', '', 'htmlspecialchars,trim');   //客服模糊查询
        if (!empty($status)) {
			$condition['status'] = array('LIKE', "%{$status}%");
			$this->assign('status',$status);
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
				$condition['handler'] = array('eq', $_SESSION['truename']);
		}		
		
		
		
		
		//var_dump($condition);
		//($_SESSION['act_list']!='all')?$condition['handler'] = $_SESSION['truename']:false; //只能查看自己录入的
        $model = M('Client');
		$count = $model->order('id desc')->where($condition)->count();
		
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
		
		//var_dump($model->_sql());die;
        $memberlist = $model ->order('id desc')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
        // $this -> assign("order", $result);
		//echo $show;die;
		
     
        $customerList     = M('Client')->order('id asc')->select();  //找出客户列表
		$this->assign('customerList',$customerList);		
		
		
		
        $this->assign('page',$show);
        $this->assign('memberlist',$memberlist);
    	$this->display();
    }
	
    public function add()
    {

        if (IS_POST) {
			$data  = I('post.');
			//var_dump($data);die;
			sleep(1);				


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

			if (M('Client')->where(array('name' => $data['name'], 'id_card_num' => $data['id_card_num']))->find()){
				$data = array('status'=>0,'info' => '该客户已经存在', 'url' => U('Client/lst'));
				$this->ajaxReturn ($data,'JSON');						
			}			
			
			
			$db = M('Client');	
			if (!$db->validate($rule)->create()) {
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('Client/add'));
				$this->ajaxReturn ($data,'JSON');	
			} 

			$id = $db->add($data);   //插入客户表得到id值	
			
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
			
			$db = M('bank');			
			if ($id = $db->addAll($dataList)) {
				$data = array('status'=>1,'info' => '添加成功', 'url' => U('Client/lst'));
				$this->ajaxReturn ($data,'JSON');					
			} else {
				$data = array('status'=>0,'info' => '添加失败', 'url' => U('Client/lst'));
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
			if (false !== M('Client')->save($data)) {
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Client/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} else {
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Client/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
			exit();
		}

		
		//当前控制器名称
		$id         = I('id', 0, 'intval');
		//var_dump($id);die;
		//$yuefenList     = M('setting')->field("yuefen")->order('id asc')->select();  //找出月份	
		
		$editlist = M('Client')->where(array('id'=>$id))->find();
		$this->assign('editlist', $editlist);
		$this->display();
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
				$order_edit  = M('Client')->where(array('id' => $id))->find();     //取出原有的
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
				$order_edit  = M('Client')->where(array('id' => $id))->find();     //取出原有的
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
				$order_edit  = M('Client')->where(array('id' => $id))->find();     //取出原有的
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
				$order_edit  = M('Client')->where(array('id' => $id))->find();     //取出原有的
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
			  $t['sid'] = $id ;        			//Client表中的id插入到bank中
			  $t['bankname'] =$canshu1[$i];    //追加
			  $t['bank_card_num'] =$canshu2[$i];    //追加
			  $dataList[$i] = $t;
			}
			
			

			if (false !== M('Client')->save($data)) {
				M('bank')->addAll($dataList);     //修改银行
				$data = array('status'=>1,'info' => '修改成功', 'url' => U('Client/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} else {
				$data = array('status'=>0,'info' => '修改失败', 'url' => U('Client/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
			exit();
        }

		
        //当前控制器名称
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;
        //$yuefenList     = M('setting')->field("yuefen")->order('id asc')->select();  //找出月份	
		
        $editlist = M('Client')->where(array('id'=>$id))->find();
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
			  $t['sid'] = $id ;        			//Client表中的id插入到bank中
			  $t['bankname'] =$canshu1[$i];    //追加
			  $t['bank_card_num'] =$canshu2[$i];    //追加
			  $dataList[$i] = $t;
			}
			
			

			if (false !== M('Client')->save($data)) {
				M('bank')->addAll($dataList);     //修改银行
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Client/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} else {
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Client/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
			exit();
        }

		
        //当前控制器名称
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;
        //$yuefenList     = M('setting')->field("yuefen")->order('id asc')->select();  //找出月份	
		
        $editlist = M('Client')->where(array('id'=>$id))->find();
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
        $detaillist = M('Client')->where(array('id'=>$id))->find();    //找出客户信息
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
		
		//Client
		
		$del = M('Client')->delete($id);

        if ($del) {
            //M('memberdetail')->delete($id);
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Client/lst'));
			$this->ajaxReturn ($data,'JSON');	
			//echo "<script>alert('删除成功!');location.href='{:U('Inventory/lst')}'</script>";
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Client/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }

    public function delBatch()
    {

        $idArr = I('key', 0, 'intval');
        if (!$idArr) {
            //$this->error('请选择要彻底删除的项');
			$data = array('status'=>0,'info' => '请选择要删除的项目', 'url' => U('Client/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
        $where = array('id' => array('in', $idArr));

        if ( M('Client')->where(array('id' => array('in', $idArr)))->delete()) {
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Client/lst'));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '删除成功', 'url' => U('Client/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }
	
	


}