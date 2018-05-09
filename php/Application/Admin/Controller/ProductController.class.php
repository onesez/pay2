<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends CommonController {


    public function lst()
    {

        $condition = array();
		
		$user_name = I('user_name', '', 'htmlspecialchars,trim');   //用户名
        if (!empty($user_name)) {
			$condition['user_name'] = array('LIKE', "%{$user_name}%");
			$this->assign('user_name',$user_name);
        }

		$truename = I('truename', '', 'htmlspecialchars,trim');   //交易人
        if (!empty($truename)) {
			$condition['truename'] = array('LIKE', "%{$truename}%");
			$this->assign('truename',$truename);
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

        $model = M('product');
		$count = $model->order('id asc')->where($condition)->count();		
		//var_dump($model->_sql());die;		
        $Page = new \Think\Page($count,100);
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
        $memberlist = $model->order('id asc')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();
        // $this -> assign("order", $result);
		//echo $show;die;
		
     
        $customerList     = M('product')->order('id asc')->select();  //找出客户列表
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
				array('productname', 'require', '银行名称不能为空'),
				//array('name', '', '该客户姓名已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
			); 
		
			$db = M('product');	
			if (!$db->validate($rule)->create()) {
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('product/add'));
				$this->ajaxReturn ($data,'JSON');	
			} 
			
			//$data['create_date'] = strtotime($data['create_date']);
			//var_dump($data);die;		
			if ($id = $db->add($data)) {
				sleep(1);
				$data = array('status'=>1,'info' => '添加成功', 'url' => U('product/lst'));
				$this->ajaxReturn ($data,'JSON');					
			} else {
				sleep(1);
				$data = array('status'=>0,'info' => '添加失败', 'url' => U('product/lst'));
				$this->ajaxReturn ($data,'JSON');					
			}
        }			

        //$productList     = M('product')->order('id asc')->select();  
		//$this->assign('productList',$productList);	

		//$create_date = date('Y-m-d H:i:s');
		//$this->assign('create_date', $create_date);				
		
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
		
		$del = M('product')->delete($id);

        if ($del) {
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('product/lst'));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('product/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }

    public function delBatch()
    {

        $idArr = I('key', 0, 'intval');
        if (!$idArr) {
			$data = array('status'=>0,'info' => '请选择要删除的项目', 'url' => U('product/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
        $where = array('id' => array('in', $idArr));

        if ( M('product')->where(array('id' => array('in', $idArr)))->delete()) {
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('product/lst'));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '删除成功', 'url' => U('product/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }
	
	


}