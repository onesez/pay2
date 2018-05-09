<?php
namespace Admin\Controller;
use Think\Controller;
class PlatformController extends CommonController {


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
		$condition['status'] = array('eq', '1');
       // I('name') ? $condition['name'] = I('name', '', 'htmlspecialchars,trim') : false;
        //I('handler') ? $condition['handler'] = I('handler', '', 'htmlspecialchars,trim') : false;
        //I('khqq') ? $condition['khqq'] = I('khqq', '', 'htmlspecialchars,trim') : false;
        //I('khqq') ? $condition['khqq'] = I('khqq', '', 'htmlspecialchars,trim') : false;
        //I('khgsmc') ? $condition['khgsmc'] = I('khgsmc', '', 'htmlspecialchars,trim') : false;

        $model = M('platform');
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
        $this->assign('page',$show);
        $this->assign('memberlist',$memberlist);
    	$this->display();
    }
	
    public function add()
    {

        if (IS_POST) {
			$data  = I('post.');
			//var_dump($data);
			
 			//M验证
			 $rule = array(
				//array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱
				array('platform', 'require', '通道名称不能为空'),
				array('controller', 'require', '控制名称不能为空'),
				array('platform', '', '通道名称已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
				array('controller', '', '控制名称已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
			); 
		
			$db = M('platform');	
			if (!$db->validate($rule)->create()) {
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('Platform/add'));
				$this->ajaxReturn ($data,'JSON');	
			}
			//var_dump($_FILES['td_file']);die;  //上传的文件信息
		
			if($_FILES['td_file']['size']>0){
				$config = array(
					'maxSize'    =>    3145728,
					'rootPath'   =>    './Application/Home/Controller/',   //远程文件夹
					'savePath'   =>    '',
					'saveName'   =>    '',     //保持原文件不变
					'exts'       =>    array('php'),
					'replace'    =>    true,   //覆盖
					'autoSub'    =>    false,
				);
				$ftpConfig     =    array(        
						'host'     => '106.14.206.106', //服务器
						'port'     => 21, //端口
						'timeout'  => 90, //超时时间
						'username' => 'qux815470602', //用户名
						'password' => 'qux815470602@qq.com**', );
				$upload = new \Think\Upload($config,'Ftp',$ftpConfig);// 实例化上传类			
				// 上传单个文件 
				$info   =   $upload->uploadOne($_FILES['td_file']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else{// 上传成功 获取上传文件信息
					$data['td_file'] = $info['savename'];
				}				
			}else{
				$data = array('status'=>0,'info' => '接口类文件不能为空', 'url' => U('Platform/add'));
				$this->ajaxReturn ($data,'JSON');					
			}
			$td_controller_name = substr($data['td_file'], 0, -20);   //取得接口类前缀
			if($data['controller']!==$td_controller_name){
				$data = array('status'=>0,'info' => '控制器名称与接口类名称前缀不一致', 'url' => U('Platform/add'));
				$this->ajaxReturn ($data,'JSON');					
			}
			//var_dump($platform);die;	
			//$data['create_date'] = strtotime($data['create_date']);
			//var_dump($data);die;		
			if ($id = $db->add($data)) {
				
					$canshu1 = $data['canshu1'];            //添加
					$canshu2 = $data['canshu2'];					
					$length=count($canshu2);    //取得数组长度
					$dataList  =  array();    	//生成新的数组
					for($i = 0;$i<$length;$i++){
					  $t = array();
					  $t['platform_id'] = $id ;        			//Client表中的id插入到bank中
					  $t['product_id'] =$canshu1[$i];    //追加
					  $t['rote'] =$canshu2[$i];    //追加
					  $dataList[$i] = $t;
					  if($t['rote']==''){
						 unset($dataList[$i]);  
					  }
					}				
					$dataList = array_values($dataList);   //重写索引
					$add = M('platform_profile')->addAll($dataList);
					
				$data = array('status'=>1,'info' => '操作成功', 'url' => U('Platform/lst'));
				$this->ajaxReturn ($data,'JSON');					
			} else {
				$data = array('status'=>0,'info' => '操作失败', 'url' => U('Platform/lst'));
				$this->ajaxReturn ($data,'JSON');					
			}
        }
		
        $productList     = M('product')->order('id asc')->select();  
		$this->assign('productList',$productList);			
		//$create_date = date('Y-m-d H:i:s');
		//$this->assign('create_date', $create_date);				
		
        $this->display();
    } 

	public function edit()
    {

        if (IS_POST) {
			$data  = I('post.');		
			//var_dump($data);die;			
 			//M验证
			 $rule = array(
				//array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱
				array('platform', 'require', '通道名称不能为空'),
				array('controller', 'require', '控制名称不能为空'),
				array('platform', '', '通道名称已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
				array('controller', '', '控制名称已经存在！', 0, 'unique', 1), //使用这个是否存在，auto就不能自动完成
			); 
		
			$db = M('platform');	
			if (!$db->validate($rule)->create()) {
				$data = array('status'=>0,'info' => $db->getError(), 'url' => U('Platform/add'));
				$this->ajaxReturn ($data,'JSON');	
			} 
			if (false !== $db->save($data)) {
				$id = $data['id'];
				$del = M('platform_profile')->where(array('platform_id' => $id))->delete();   	 //先删除再添加	
				$canshu1 = $data['canshu1'];            //添加
				$canshu2 = $data['canshu2'];					
				$canshu3 = $data['canshu3'];					
				$length=count($canshu2);    //取得数组长度
				$dataList  =  array();    	//生成新的数组
				for($i = 0;$i<$length;$i++){
				  $t = array();
				  $t['platform_id'] = $id ;        			//Client表中的id插入到bank中
				  $t['product_id'] =$canshu1[$i];    //追加
				  $t['rote'] =$canshu2[$i];    //追加
				  $t['is_run'] =$canshu3[$i];    //追加
				  $dataList[$i] = $t;
				  if($t['rote']==''){
					 unset($dataList[$i]);  
				  }
				}				
				$dataList = array_values($dataList);   //重写索引
				$add = M('platform_profile')->addAll($dataList);				
				
				
				$data = array('status'=>1,'info' => '修改成功', 'url' => U('Platform/lst'));
				$this->ajaxReturn ($data,'JSON');
			} else {
				$data = array('status'=>0,'info' => '修改失败', 'url' => U('Platform/lst'));
				$this->ajaxReturn ($data,'JSON');	
			}


        }
        //当前控制器名称
		$id = I('id', 0, 'intval');
        $editlist = M('platform')->where(array('id'=>$id))->find();   //找出通道信息
        $this->assign('editlist', $editlist);	
		
        $productData= M('platform_profile')->field('platform_profile.*,product.product_name')->join('left join product on platform_profile.product_id=product.id')->where(array('platform_id'=>$editlist['id']))->order('id asc')->select();  //找出通道附属产品
		//var_dump(M('platform_profile')->_sql());
		//var_dump($productData);		
		
		
        $productList     = M('product')->order('id asc')->select();    //取出所有产品信息
		//var_dump(M('product')->_sql());
		//var_dump($productList);
		

        foreach ($productList as $key => $value) {
			foreach ($productData as $keys => $vals) {
				if($vals['product_id']==$value['id']){
					$productList[$key]['rote']= $productData[$keys]['rote'];	
					$productList[$key]['is_run']= $productData[$keys]['is_run'];	
				}	
			}
			
        }			
		//var_dump($productList);
		$this->assign('productData', $productData);	
		$this->assign('productList',$productList);	
        $this->display();
    }	

	
    public function detail()
    {
        //当前控制器名称
        $id = I('id', 0, 'intval');
        $detaillist = M('platform')->where(array('id'=>$id))->find();    //找出通道信息
		
        $productList= M('platform_profile')->field('platform_profile.*,product.product_name')->join('left join product on platform_profile.product_id=product.id')->where(array('platform_id'=>$detaillist['id']))->order('id asc')->select();  //找出通道附属产品
		$this->assign('productList', $productList);					
		
        $this->assign('detaillist', $detaillist);
        $this->display();
    }


	
    //删除
    public function del()
    {

        $id         = I('id', 0, 'intval');    //得到id
		
        $tdInfo = M('platform')->where(array('id'=>$id))->find();    //找出通道信息
		$td_c_name = $tdInfo['controller'].'Controller.class.php';
		
		//var_dump($td_c_name);die;
		
		$conn = ftp_connect("106.14.206.106") or die("Could not connect");  //远程删除
		ftp_login($conn,"qux815470602","qux815470602@qq.com**");
		$res = ftp_delete($conn,"./Application/Home/Controller/".$td_c_name);
		ftp_close($conn);		
		
		$del = M('platform')->delete($id);

        if ($del && $res=='1') {
			$del = M('platform_profile')->where(array('platform_id' => $id))->delete();   	 
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Platform/lst'));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '删除失败', 'url' => U('Platform/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }

    public function delBatch()
    {

        $idArr = I('key', 0, 'intval');
        if (!$idArr) {
			$data = array('status'=>0,'info' => '请选择要删除的项目', 'url' => U('Platform/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
        $where = array('id' => array('in', $idArr));

        if ( M('platform')->where(array('id' => array('in', $idArr)))->delete()) {
			$data = array('status'=>1,'info' => '删除成功', 'url' => U('Platform/lst'));
			$this->ajaxReturn ($data,'JSON');	
        } else {
			$data = array('status'=>0,'info' => '删除成功', 'url' => U('Platform/lst'));
			$this->ajaxReturn ($data,'JSON');	
        }
    }
	
	


}