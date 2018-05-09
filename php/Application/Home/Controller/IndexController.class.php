<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
    public function index(){
		$this->display();
    }
	
	public function verify(){   
		$Verify = new \Think\Verify(); 
		$Verify->fontSize = 16;
		$Verify->fontttf = "5.ttf";
		$Verify->expire = 60;
		$Verify->useImgBg = true;
		$Verify->useNoise = true;
		$Verify->length   = 4;  
		$Verify->useNoise = false;  
		$Verify->codeSet = 'ACDEFGHJKMNRTUXY134689';  
		$Verify->imageW = 0;  
		$Verify->imageH = 0;
		$Verify->entry();  
	} 

	//登录
	public function login(){		
		
        if (IS_POST) {
			
			//$data = array('status'=>0,'info' => '服务器维护，截止2点', 'url' => U('Index/index'));
			//$this->ajaxReturn ($data,'JSON');			
			
			$user_name    = I('user_name', '', 'htmlspecialchars,trim');
			$password     = I('password', '', 'htmlspecialchars,trim');
			$loginCode    = I('code', '', 'htmlspecialchars,trim');
			
			$condition['user_name'] = $user_name;
			$condition['password'] = md5($password);
			
			if ($user_name == '') {
				$data = array('status'=>0,'info' => '请输入帐号', 'url' => U('Index/index'));
				$this->ajaxReturn ($data,'JSON');	
			}
			if ($password == '') {
				$data = array('status'=>0,'info' => '请输入密码', 'url' => U('Index/index'));
				$this->ajaxReturn ($data,'JSON');	
			}		
			if ($loginCode == '') {
				$data = array('status'=>0,'info' => '请输入验证码', 'url' => U('Index/index'));
				$this->ajaxReturn ($data,'JSON');	
			}

			$Verify = new \Think\Verify(); 
			if(!$Verify->check(strtoupper($loginCode))){
				$data = array('status'=>0,'info' => '验证码不正确', 'url' => U('Index/index'));
				$this->ajaxReturn ($data,'JSON');	
			}	
			
			$userInfo = M('user')->where($condition)->find();
			if (!$userInfo) {
				$data = array('status'=>0,'info' => '账号或密码错误', 'url' => U('Index/index'));
				$this->ajaxReturn ($data,'JSON');	
			}else{
				session('auth_id',$userInfo['id']);          //存入session
				session('truename',$userInfo['truename']);   //真实姓名存入session
				session('user_name',$userInfo['user_name']); //用户名存入session			
				//adminLog('后台登录');  						 //写入登录日志
				$data = array('status'=>1,'info' => '登录成功', 'url' => U('Admin/Main/index'));
				$this->ajaxReturn ($data,'JSON');				
				
			}
        }
		
        $this->display();
		
    }
	
	public function login_out(){
		
		session(null); 
		$data = array('status'=>1,'info' => '您已成功安全退出', 'url' => U('Home/Index/index'));
		$this->ajaxReturn ($data,'JSON');			
		
    }
	
	
}