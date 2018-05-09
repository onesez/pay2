<?php

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = ''){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}


//获得ip
function getIP(){            
	if (getenv("HTTP_CLIENT_IP"))
		 $ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR"))
		 $ip = getenv("REMOTE_ADDR");
	else $ip = "Unknow";
	return $ip;
}
//登录日志
function adminLog($log_info){
    $add['log_time'] = time();
    $add['user_id'] = session('auth_id');
    $add['log_info'] = $log_info;
    $add['log_ip'] = getIP();
    //$add['log_url'] = __ACTION__;
    M('admin_log')->add($add);
}





//把数组写入txt
function toarr($data,$name=''){	
	$name = ($name=='')?'arr.txt':$name.'.txt';
	file_put_contents($name, var_export($data,true)."\r\n",FILE_APPEND);

}
//把变量写入txt
function tolog($word='',$name=''){
	$name = ($name=='')?'log.txt':$name.'.txt';
	$fp = fopen($name,"a");
	flock($fp, LOCK_EX) ;
	fwrite($fp,"执行日期：".strftime("%Y%m%d%H%M%S",time())."\n".$word."\r\n");
	flock($fp, LOCK_UN);
	fclose($fp);
}

//返回错误
function showmsg($status='0',$error_desc='' ){
	header('Content-Type:application/json; charset=utf-8');
	$data = array('status'=>$status,'error_desc'=>$error_desc);
	echo exit(json_encode($data,320));
}

//打印数组
function parr($data=array()){
	 print_r('<pre>');
	 print_r($data);
}

//生成签名
function createSign($data,$Md5key){
	$signPars = "";
	ksort($data);
	foreach($data as $k => $v) {
		if("" != $v && "pay_sign" != $k) {
				$signPars .= $k . "=" . $v . "&";
		}
	}
	$signPars .= "key=" . $Md5key;
	$sign = strtoupper(md5($signPars));
	return $sign;
}

//发送短信
function SmsSend($mobile, $TemplateCode,$TemplateParam){

    vendor("AliSms.sms");
    $send = new sms();        
    $res = $send->send_sms($mobile, $TemplateCode,$TemplateParam);
	//var_dump($res);die;
	return $res;


}

//概率发生
function randomSelect( &$array ){
    $datas = $array ;
    if( !is_array($datas) || count($datas) == 0 )
        return ;
    asort($datas); //按照大小排序
    $random = rand(1,100);
    $sum = 0 ;

    $flag = '';
    foreach($datas as $key => $data ){
        $sum += $data ;
        if( $random <= $sum ){
            $flag = $key;
            break ;
        }
    }
    if( $flag == '' ){ // 如果传递进来的值的和小于100 ，则取概率最大的。
        $keys = array_keys($datas);
        $flag = $keys[count($keys) - 1] ;
    }
    return $flag;
}

?>
