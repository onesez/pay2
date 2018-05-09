<?php
namespace Pay2\Controller;
use Think\Controller;
class ShengpayController extends Controller{


	
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
		header("Content-type:text/html;charset=utf-8");    //务必添加此行
		vendor('Shengpay.spay');		
	}

	
    //dopay方法
    public function dopay($Sdata)
	{	   
        
		//var_dump($Sdata);die;
	     //提交
		
		$url = 'http://mtc.shengpay.com/services/BatchPayment/BatchPayment?wsdl';
		$data =array();

		$data['batchNo'] = 'BN'.date("YmdHis");
		$data['callbackUrl'] = 'https://www.baidu.com/';
		$data['totalAmount'] = self::getTotalAmount($Sdata["WITHDRAW_MONEY"]);
		$data['customerNo'] = '11088332';
		$data['charset'] = 'utf-8';
		$data['signType'] = 'MD5';
		$data['remark'] = '劳务费';
			
		$details = array(
			'id' 			=> time(),
			'province' 		=> '湖北省',
			'city' 			=> '武汉市',
			'branchName'	=> '中国建设银行阳逻支行',
			'bankName' 		=> $Sdata["BNK_NM"],
			'accountType' 	=> 'C',
			'bankUserName' 	=> $Sdata["PERSON_NM"],
			'bankAccount' 	=> $Sdata["CARD_NO"],
			'amount' 		=> self::getTotalAmount($Sdata["WITHDRAW_MONEY"]),
			'remark' 		=> '劳务费'
		); 
		
		$detailsStr = $details['id'].$details['province'].$details['city'].$details['branchName'].$details['bankName'].$details['accountType'].$details['bankUserName'].$details['bankAccount'].$details['amount'].$details['remark'];

		//var_dump($detailsStr); 
		$forSign = $data['charset'].$data['signType'].$data['customerNo'].$data['batchNo'].$data['callbackUrl'].$data['totalAmount'].$detailsStr;
		$data['details'] = $details;		
		$key = 'aNupMAVegpKQwwkokK';
		
		$data['sign']= strtoupper(md5($forSign . $key));
		
		
		
		$data_t['id'] = $Sdata['txid'];         //修改批次和商户流水号
		$data_t['batch_order_num'] = $data['batchNo'];
		$data_t['order_id'] = $details['id'];			
		M('drawlist')->save($data_t);		
		
		
		//执行请求
		//var_dump($data);die;
        $paySubmit = new \BatchPayment();
        $res = $paySubmit->apply('directApply',$data);
        //var_dump($res);die;	
		if($res['return']['resultCode']=='00'){	
			$mess = '代付请求已受理';
		}else{
			$mess = $res['return']['resultMessage'];			
		}
		return $mess ;
    }


    //代付查询
    public function query($orderId)
	{
		//var_dump($orderId);
		$txInfo  = M('drawlist')->field('batch_order_num,order_id')->where(array('platform_order_num'=>$orderId))->find();   //找出批次和商户流水号
		
		$data['batchNo'] = $txInfo['batch_order_num'];
		$data['order_id'] = $txInfo['detailid'];
		$data['customerNo'] = '11088332';
		$data['charset'] = 'utf-8';
		$data['signType'] = 'MD5';
		$data['remark'] = '劳务费';
		$key = 'aNupMAVegpKQwwkokK';

		$forSign = $data['charset'].$data['signType'].$data['customerNo'].$data['batchNo'].$data['order_id'];
		$data['sign']= strtoupper(md5($forSign . $key));
		$query = new \BatchPayment();
		$res = $query->apply('Query',$data);

		//var_dump($res);die;
		
		if($res['return']['resultCode']=='00'){	
			if($res['return']['resultInfo']['payStatus']=='全部付款成功'){	
				$data = array(
				   "status" =>'11',
				   "money" => $res['return']['resultInfo']['totalAmount'],
				   "desc"=>'代付成功'	  
				);
			}
		}else{
		    $data = array(
			   "status" =>'00',
			   "money" => '0',
			   "desc"=>'代付失败'	  //失败原因	
			);		
		}
		return $data ;			
		
	}	
	
	
	
	/****相关函数开始****/
	
	function getTotalAmount($total) {
		return number_format($total, 2, '.', ''); 
	}	
	
	
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