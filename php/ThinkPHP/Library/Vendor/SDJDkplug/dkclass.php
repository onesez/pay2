<?php


define('DK_ROOT', dirname(__FILE__) . '/');


class dkpost
{


	
	public function make_encrypt($data){

			//$puk = file_get_contents("sdj.cer");	
			$puk = file_get_contents(DK_ROOT . 'cert/sdj.cer');	
			$public_key = openssl_pkey_get_public($puk);	
			//$pvk = file_get_contents("sdj.pfx");
			$pvk = file_get_contents(DK_ROOT . 'cert/sdj.pfx');
			openssl_pkcs12_read($pvk, $certs, "123456"); 
			//$public_key = $certs["cert"];
			openssl_public_encrypt($data, $encrypted,$public_key);
			return base64_encode($encrypted);
	}

	public function make_openssl_sign($data){
		
			//$puk = file_get_contents("sdj.cer");	
			$puk = file_get_contents(DK_ROOT . 'cert/sdj.cer');		
			$public_key = openssl_pkey_get_public($puk);	
			//$pvk = file_get_contents("sdj.pfx");
			$pvk = file_get_contents(DK_ROOT . 'cert/sdj.pfx');		
			openssl_pkcs12_read($pvk, $certs, "123456"); 		
			$private_key = $certs["pkey"];
			//openssl_sign($data, $signMsg, $private_key, OPENSSL_ALGO_SHA1); //注册生成加密信息
			openssl_sign($data, $signMsg, $private_key, OPENSSL_ALGO_SHA256); //注册生成加密信息
			
			$signMsg = base64_encode($signMsg); //base64转码加密信息
			return $signMsg;
	}

	public function request_post($url = '',$ispost=true, $post_data = array()) {
		if (empty($url) || empty($post_data)) {
			return false;
		}
		$o = "";
		foreach ( $post_data as $k => $v ) 
		{ 
			$o.= "$k=" . urlencode( $v ). "&" ;
		}
		$post_data = substr($o,0,-1);
		if($ispost){
			$url=$url;
		}else{
			$url = $url.'?'.$post_data;
		}
		
	   
		header("Content-type: text/html; charset=utf-8");
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
		curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		if($ispost){
			curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		}
		$data = curl_exec($ch);//运行curl
		curl_close($ch);
		return $data;
	}	
	
	public function POSTdata($data) {
		//var_dump($data);die;
		require_once(DK_ROOT.'config.php');		
		//构造要加密的参数数组
		$data_jm['certNo'] = $data['certNo'];
		$data_jm['inputCharset'] = $payconfig['inputCharset'];
		$data_jm['interfaceVersion'] = $payconfig['interfaceVersion'];
		$data_jm['orderNo'] = $data['orderNo'];
		$data_jm['payAmount'] = $data['payAmount'];
		$data_jm['payeeId'] = $payconfig['payeeId'];
		$data_jm['payerAcc'] = $data['payerAcc'];
		$data_jm['serviceType'] = $payconfig['serviceType'];
		//var_dump($data_jm);die;
		
		foreach($data_jm as $k=>$v)
		{ 
				if(empty($v)) continue;
				@$str .="{$k}={$v}&";
		}
		$key='g3aumh9psg5en7nh';	
		$str .="merKey=".$key;	
		//logResult($str);	
		
		//var_dump($str);die;
		$str=md5($str);
		//var_dump($str);die;		

		$data_jm['notifyUrl']= $payconfig['notifyUrl'];	   //追加
		$data_jm['signType']= $payconfig['signType'];	
		$data_jm['sign']= '';	
		$data_jm['signature']= '';	
		$data_jm['payerName']= $data['payerName'];	 //接收值，不参与加密
		$data_jm['bankCode']= $data['bankCode'];	 //接收值，不参与加密

		$data_jm['signature']=$this->make_encrypt($str);               //公钥加密
		$data_jm['sign']=$this->make_openssl_sign($data_jm['signature']);   //私钥加密
				//var_dump($data);die;
	//建立请求
	//$pay_url = 'http://183.11.223.20:12586/api/commNewDk/CommDkNewPay';   //代扣接口
	$pay_url = 'https://api.jiajiepay.com/v2/commNewDk/CommDkNewPay';   //代扣接口
	//$pay_url = 'https://api-test.jiajiepay.com/';   //代扣接口
	$rs = $this->request_post($pay_url,1,$data_jm);
	
	return $rs;
	//$obj=json_decode($rs); 
	//echo $obj->execMsg; //prints foo 
	//var_dump($rs);	
}
	
	
	

	
	
}
?>