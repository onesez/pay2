<?php

namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller
{

    //_initialize自动运行方法，在每个方法前，系统会首先运动这个方法
    public function _initialize()
    {
     	$ctl = CONTROLLER_NAME;
    	$act = ACTION_NAME;
		
		$auth_id = session('auth_id');  //接受session
		
		//var_dump($auth_id);die;
		if($auth_id==null){			
			//$this->redirect("/Home/index");
			$this->error('请先登录以后再操作!',U('/Home/index'));
		}		
		
		R('Public/base');  //继承模版
		

		
		
		//无需验证的操作
		$uneed_check = array('login','logout','vertifyHandle','vertify','imageUp','upload','login_task');
		$uneed_check_cont = array('Index','Main');
		
    	if(in_array($ctl,$uneed_check_cont) || $auth_id == '1'){
    		//后台首页控制器无需验证,超级管理员无需验证
    		return true;
    	}elseif(strpos($act,'ajax') || in_array($act,$uneed_check)){
    		//所有ajax请求不需要验证权限
    		return true;
    	}else{
			$auth = new \Think\Auth();    
			if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, $auth_id)){
				$this->error('没有权限');
			}			
    	}
		 

    }
}
