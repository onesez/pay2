<?php
namespace Admin\Controller;
use Think\Controller;
class NoticeController extends CommonController {


    public function lst()
    {

        $condition = array();
		
        I('start')? $start = strtotime(I('start', '', 'htmlspecialchars,trim')): false;  //添加日期
        I('end')  ? $end = strtotime(I('end', '', 'htmlspecialchars,trim')) : false;
		
		if($start && $end){
        	$condition['create_date'] = array('between',"$start,$end");
			$this->assign('start',I('start', '', 'htmlspecialchars,trim'));
			$this->assign('end',I('end', '', 'htmlspecialchars,trim'));
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
		
		
		//var_dump($condition);
		//($_SESSION['act_list']!='all')?$condition['handler'] = $_SESSION['truename']:false; //只能查看自己录入的
        $model = M('notice');
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
		
     
        $customerList     = M('notice')->order('id asc')->select();  //找出客户列表
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

		
			//var_dump($data);die;			
 			//M验证
			 $rule = array(
				//array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱
				array('content', 'require', '公告内容不能为空'),
				//array('name', '', '该客户姓名已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
			); 
		
			$db = M('notice');	
			if (!$db->validate($rule)->create()) {
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('Notice/add'));
				$this->ajaxReturn ($data,'JSON');	
			} 
			
			$data['create_date'] = strtotime($data['create_date']);
			//var_dump($data);die;
			$db = M('notice');			
			if ($id = $db->add($data)) {
				sleep(1);
				$data = array('status'=>1,'info' => '添加成功', 'url' => U('Notice/lst'));
				$this->ajaxReturn ($data,'JSON');					
			} else {
				sleep(1);
				$data = array('status'=>0,'info' => '添加失败', 'url' => U('Notice/lst'));
				$this->ajaxReturn ($data,'JSON');					
			}
        }			

        //$bankList     = M('bankcode')->order('id asc')->select();  
		//$this->assign('bankList',$bankList);	

		$create_date = date('Y-m-d H:i:s');
		$this->assign('create_date', $create_date);				
		
        $this->display();
    }	

    public function bankajax()
    {
       $bankList  = M('bankcode')->field('bankname')->order('id asc')->select();	   
  	   $this->ajaxReturn ($bankList,'JSON');		
	}
		
		
    public function edit()
    {
        if (IS_POST) {
			$data          = I('post.');
			//var_dump($data);die;
			$id   = $data['id'] = I('id', 0, 'intval');  //修改必须传ID，否则不会成功。
			//var_dump($data);die;		

			$data['create_date'] = strtotime($data['create_date']);		
			

			if (false !== M('notice')->save($data)) {
				$data = array('status'=>1,'info' => '修改成功', 'url' => U('Notice/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} else {
				$data = array('status'=>0,'info' => '修改失败', 'url' => U('Notice/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
			exit();
        }

		
        //当前控制器名称
        $id         = I('id', 0, 'intval');
		//var_dump($id);die;
        //$yuefenList     = M('setting')->field("yuefen")->order('id asc')->select();  //找出月份	
		
        $editlist = M('notice')->where(array('id'=>$id))->find();
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
        $detaillist = M('notice')->where(array('id'=>$id))->find();    //找出客户信息
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
		
		//notice
		
		$del = M('notice')->delete($id);

        if ($del) {
            //M('memberdetail')->delete($id);
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Notice/lst'));
			$this->ajaxReturn ($data,'JSON');	
			//echo "<script>alert('删除成功!');location.href='{:U('Inventory/lst')}'</script>";
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Notice/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }

    public function delBatch()
    {

        $idArr = I('key', 0, 'intval');
        if (!$idArr) {
            //$this->error('请选择要彻底删除的项');
			$data = array('status'=>0,'info' => '请选择要删除的项目', 'url' => U('Notice/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
        $where = array('id' => array('in', $idArr));

        if ( M('notice')->where(array('id' => array('in', $idArr)))->delete()) {
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Notice/lst'));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '删除成功', 'url' => U('Notice/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }
	
	


}