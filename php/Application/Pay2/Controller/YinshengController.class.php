<?php
namespace Pay2\Controller;
use Think\Controller;
class YinshengController extends Controller{


	
/* 	private $arr;
	function __construct(){
		$this->arr = array(
			'url' => 'http://hyapi.kspay.net:8190/ks_dfpay/mopay/pay', //代付地址
			'versionId'=>'470000',
			'merId'=>'936177846590000',
			'merPubKey'=>'1ABFEC02E13D461B',
			'signType'=>'MD5',
			'pfxpath'=>'./Public/Cert/936177846590000.pfx',
			'cerpath'=>'./Public/Cert/936177846590000.cer',
		);
	} */
	
    function __construct()
    {
        $this->config();        
    }	
	
	
	function config()
	{
		date_default_timezone_set('PRC');
		$this->config = array();
		$this->config['pfxpath'] = './Public/Cert/PLGS.pfx';
		$this->config['businessgatecerpath'] = './Public/Cert/PLGS.cer';
		$this->config['pfxpassword'] = "plgs12";
		$this->config['notify_url'] ='http://www.baidu.com';
		$this->config['charset'] = "utf-8";
		$this->config['partner_id'] = "PLGS";
		$this->config['sign_type'] = "RSA";
		$this->config['version'] = "3.0";
		$this->config['business_code'] = "01000009";
		$this->config['currency'] = "CNY";
		$this->config['subject'] = "其它";
		$this->config['bank_account_type'] = "personal";
		$this->config['bank_card_type'] = "debit";
		
	}




	
	
	
	
    //dopay方法
    public function dopay($data)
	{	   
		//var_dump($data);die;
		$total_amount = $data["WITHDRAW_MONEY"];
		$bank_account_name = $data["PERSON_NM"];
		$bank_account_no = $data["CARD_NO"];
		$bank_name = $data["BNK_NM"];
		$bnkNo = $data["BNK_NO"];
		$bnkCd = $data["BNK_CD"];
		$idNo = $data["CRP_ID_NO"];
		$phoneNo = $data["PHONE_NO"];
		$payId = $data["PAY_ID"];	 
		$orderId = $data["txorderId"];
		
		$myParams = array();
		$myParams['charset'] = $this->config['charset'];
		$myParams['method'] = 'ysepay.df.single.quick.accept';
		$myParams['notify_url'] = $this->config['notify_url'];
		$myParams['partner_id'] = $this->config['partner_id'];
		$myParams['sign_type'] = $this->config['sign_type'];
		$myParams['timestamp'] = date('Y-m-d H:i:s', time());
		$myParams['version'] = $this->config['version'];
		$biz_content_arr = array(
			"out_trade_no" => $orderId,
			"business_code" => $this->config['business_code'],
			"currency" => $this->config['currency'],
			"total_amount" => $total_amount,
			"subject" => $this->config['subject'],
			"bank_name" => $bank_name,
			"bank_city" => "武汉",
			"bank_account_no" => $bank_account_no,
			"bank_account_name" => $bank_account_name,
			"bank_account_type" => $this->config['bank_account_type'],
			"bank_card_type" => $this->config['bank_card_type']
		);
		$myParams['biz_content'] = json_encode($biz_content_arr, JSON_UNESCAPED_UNICODE);//构造字符串
		ksort($myParams);
		$signStr = "";
		foreach ($myParams as $key => $val) {
			$signStr .= $key . '=' . $val . '&';
		}
		$signStr = rtrim($signStr, '&');
		$sign = $this->sign_encrypt(array('data' => $signStr));
		$myParams['sign'] = trim($sign['check']);
		$url= 'https://df.ysepay.com/gateway.do';
		$response = $this->curl_https($myParams,$url);	
		$res = json_decode($response, true);
		$data = json_encode($res['ysepay_df_single_quick_accept_response'], JSON_UNESCAPED_UNICODE);
		$arr = json_decode($data, true);
		//var_dump($arr);die;	
		
		if($arr['code']=='10000'){
			 $res=array(		
				'result'=>'1',   //交易成功
				'desc'=>'ok',   
			);
		}else{
			$res=array(		
				'result'=>'0',   //交易失败
				'desc'=>$arr['sub_msg'],   
			);			
		}
		return $res;		
		
/* 		if($arr['code']=='10000'){  
			return $arr['trade_status_description'];
		}else{
			return $arr['sub_msg'];
		} */
    }


    //代付查询
    public function query($orderId)
	{
		header("Content-type:text/html;charset=utf-8");    //务必添加此行
		$myParams = array();
		$myParams['method'] = 'ysepay.df.single.query';
		$myParams['partner_id'] = $this->config['partner_id'];
		$myParams['timestamp'] = date('Y-m-d H:i:s', time());
		$myParams['charset'] = $this->config['charset'];
		$myParams['sign_type'] = $this->config['sign_type'];
		$myParams['version'] = $this->config['version'];
		$biz_content_arr = array(
			"out_trade_no" => $orderId,
		);
		$myParams['biz_content'] = json_encode($biz_content_arr, JSON_UNESCAPED_UNICODE);//构造字符串
		ksort($myParams);
		$signStr = "";
		foreach ($myParams as $key => $val) {
			$signStr .= $key . '=' . $val . '&';
		}
		$signStr = rtrim($signStr, '&');
		//var_dump($signStr);
		$sign = $this->sign_encrypt(array('data' => $signStr));
		$myParams['sign'] = trim($sign['check']);
		//var_dump($myParams);
		$url= 'https://searchdf.ysepay.com/gateway.do';
		$response = $this->curl_https($myParams,$url);	
		//var_dump($response);die;
		$res = json_decode($response, true);
		$data = json_encode($res['ysepay_df_single_query_response'], JSON_UNESCAPED_UNICODE);
		$arr = json_decode($data, true);
		//var_dump($arr);die;		
		if($arr['trade_status']=='TRADE_SUCCESS'){
			$data = array(
			   "status" =>$arr['code'],
			   "money" => $arr['total_amount'],
			   "desc"=>'代付成功'		
			);			
		}else{   //失败
			$data = array(
			   "status" =>'11',
			   "money" => '0',
			   "desc"=>'代付失败'	  //失败原因	
			);				
		}
		return $data;		
		
	}	
	
	
	
	/****相关函数开始****/
	
	/*RSA加密*/
	function sign_encrypt($input)
	{
		$return = array('success' => 0, 'msg' => '', 'check' => '');
		$pkcs12 = file_get_contents($this->config['pfxpath']); //私钥
		//var_dump($pkcs12);die;
		if (openssl_pkcs12_read($pkcs12, $certs, $this->config['pfxpassword'])) {
			$privateKey = $certs['pkey'];
			$publicKey = $certs['cert'];
			$signedMsg = "";
			if (openssl_sign($input['data'], $signedMsg, $privateKey, OPENSSL_ALGO_SHA1)) {
				$return['success'] = 1;
				$return['check'] = base64_encode($signedMsg);
				$return['msg'] = base64_encode($input['data']);

			}
		}

		return $return;
	}

	/*提交*/
    function curl_https($data,$url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        //var_dump($response);die;
		return $response;
/*         if (curl_errno($ch)) {
            var_dump($ch);
        } else {
            $response = json_decode($response, true);
            var_dump($response);
            $sign = $response['sign'];
            echo $sign;
            $data = json_encode($response['ysepay_df_single_quick_accept_response'], JSON_UNESCAPED_UNICODE);
            $data = $this->arrayToString($data);
            var_dump($data);
            if ($this->sign_check($sign, $data) == true) {
                echo "验证签名成功!";
            } else {
                echo '验证签名失败!';
            }
        } */
    }

	//将XML转为array
	function xmlToArray($xml)
	{    
		//禁止引用外部xml实体
		libxml_disable_entity_loader(true);
		$values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);        
		return $values;
	}
	
}
?>