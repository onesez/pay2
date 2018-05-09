<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends CommonController {

    //角色列表
	public function lst()
    {
	
        $condition = array();				
        I('title') ? $condition['title'] = I('title', '', 'htmlspecialchars,trim') : false;
		$this->assign('title',I('title'));
        //I('truename') ? $condition['truename'] = I('truename', '', 'htmlspecialchars,trim') : false;
        //I('role_name') ? $condition['role_name'] = I('role_name', '', 'htmlspecialchars,trim') : false;
		
		//var_dump($condition);
		
		
		//$data = M('user  as  a')->join('jifen  as  b  on b.id = a.id')->where('a.id  =  1')->select();
		
        $model = M('role');
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
		
		
        $memberlist = $model->field('id,title,role_desc')->order('id asc')->where($condition)->limit($Page->firstRow.','.$Page->listRows)->select();	
		
		//var_dump($model->_sql());die;
    	$roleList = M('role')->field('id,title,role_desc')->order('id asc')->select();
    	$this->assign('roleList',$roleList);
		
        $this->assign('page',$show);
        $this->assign('memberlist',$memberlist);
    	$this->display();			
		
		
		
		
    }	
	
	//添加角色
    public function add()
    {
        if (IS_POST) {
			$data  = I('post.');
			//var_dump($data);die;
				
			$data['rules']= implode(",",$data['rules']);				
			//var_dump($data['rules']);die;
			//M验证
			 $validate = array(
				//array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱
				array('title', 'require', '请填写角色名称！'),
				//array('rules', 'require', '请填写角色权限！'),
				array('title', '', '角色已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
			);

			$db = M('role');
			if (!$db->validate($validate)->create($data)) {
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('Role/role_add'));
				$this->ajaxReturn ($data,'JSON');		
			} 
			if ($id = $db->add($data)) {
				sleep(1);
				$data = array('status'=>1,'info' => '添加成功', 'url' => U('Role/lst'));
				$this->ajaxReturn ($data,'JSON');						
			} else {
				sleep(1);
				$data = array('status'=>0,'info' => '添加失败', 'url' => U('Role/add'));
				$this->ajaxReturn ($data,'JSON');
			}
        }
		
		$roleList=getAllauthList();    //找出所有权限节点
		//var_dump($roleList);die;
		$this->assign('roleList',$roleList);
        $this->display();
    }	
	
	//编辑角色
    public function edit()
    {
		
        if (IS_POST) {
			$data  = I('post.');
			$id    = $data['id'] = I('id', 0, 'intval');   //必须要传id，用以判断角色名是否存在
						
			$data['rules']= implode(",",$data['rules']);	
			
			//var_dump($data['rules']);die;
			//如果其它id下面存在相同的角色名则提示存在
			if (M('role')->where(array('title' => $data['title'], 'id' => array('neq', $id)))->find()) {
				//var_dump(M('role')->_sql());die;
				$data = array('status'=>0,'info' => '角色名已经存在', 'url' => U('Role/lst'));
				$this->ajaxReturn ($data,'JSON');					
			}

			
			if (false !== M('role')->save($data)) {
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Role/lst'));
				$this->ajaxReturn ($data,'JSON');	
			} else {
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Role/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}
        }
		
		
        //当前控制器名称
        $id         = I('id', 0, 'intval');		
		$editlist = M('role')->where(array('id'=>$id))->find();
		$rules=$editlist['rules'];	
		//var_dump($rules);	
		$authList = explode(',', $rules);   	 //形成数组				
		
		$map['id']=array('in',$authList);			
		$this_role = M('auth_rule')->where($map)->getField('id',true);	 //找出该角色拥有的权限id
		//var_dump($this_role);die;	
		
		$roleList=getAllauthList();    //找出所有权限节点    

		$this->assign('roleList',$roleList);		
		$this->assign('editlist', $editlist);   //赋值角色名称到静态页面
		$this->assign('this_role', $this_role);   //赋值角色id到静态页面
        $this->display();
    }	
	
	//删除角色
    public function del()
    {

        $id        = I('id', 0, 'intval');
        //$batchFlag = I('get.batchFlag', 0, 'intval');
        //批量删除
		// if ($batchFlag) {
           // $this->delBatch();
            //return;
        //}

        if (M('role')->delete($id)) {
			$data = array('status'=>1,'info' => '操作成功', 'url' => U('Role/lst'));
			$this->ajaxReturn ($data,'JSON');
        } else {
			$data = array('status'=>0,'info' => '操作失败', 'url' => U('Role/lst'));
			$this->ajaxReturn ($data,'JSON');
        }
    }

	//批量删除角色
    public function delBatch()
    {

        $idArr = I('key', 0, 'intval');
        if (!$idArr) {
            //$this->error('请选择要彻底删除的项');
			echo json_encode('请选择要删除的项目！');
			exit;
        }
        $where = array('id' => array('in', $idArr));

        if ( M('role')->where(array('id' => array('in', $idArr)))->delete()) {
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Role/lst'));
			$this->ajaxReturn ($data,'JSON');
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Role/lst'));
			$this->ajaxReturn ($data,'JSON');
        }
    }

	
	


}