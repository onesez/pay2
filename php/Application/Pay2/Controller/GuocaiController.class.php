<?php
namespace Pay2\Controller;
use Think\Controller;
class GuocaiController extends Controller{


	
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
	
	
    //dopay方法
    public function dopay($data)
	{	   

		//var_dump($data);die;  
		header("Content-type:text/html;charset=utf-8");    //务必添加此行
		/**************************请求参数**************************/
		$money = $data["WITHDRAW_MONEY"];
		$personNm = $data["PERSON_NM"];
		$cardNo = $data["CARD_NO"];
		$bnkNm = $data["BNK_NM"];
		$bnkNo = $data["BNK_NO"];
		$bnkCd = $data["BNK_CD"];
		$idNo = $data["CRP_ID_NO"];
		$phoneNo = $data["PHONE_NO"];
		$payId = $data["PAY_ID"];	
		$params=array(		
			'TRDE_CODE'=>'20003',   //交易码
			'PRT_CODE'=>'1000164666',  //机构号
			'VER_NO'=>'1.0',
			'MERC_ID'=>'834421047330002',	
			'NON_STR'=>$this->getNonceStr(),
			'TM_SMP'=>$this->getMillisecond(),
			'SIGN_TYP'=>'MD5',
			//'OUT_WITHDRAW_NO'=>'csdf'.$this->getMillisecond(),
			'OUT_WITHDRAW_NO'=>$data["txorderId"],
			'WITHDRAW_MONEY'=>$money,
			'PERSON_NM'=>$personNm,		
			'CARD_NO'=>$cardNo,		
			'BNK_NM'=>$bnkNm,		
			'BNK_NO'=>$bnkNo,
			'BNK_CD'=>$bnkCd,
			'CRP_ID_NO'=>$idNo,
			'PHONE_NO'=>$phoneNo,
			'PAY_ID'=>$payId,
		);
		//var_dump($params);die;
		$url= 'http://120.77.22.14:8380/pay/gateway/withdraw.do';
		$key = '58e4b9a9d91b49b8a27424ad8a5f5050' ;
		ksort($params);   //三方要求按序提交
		$params["SIGN_DAT"]= self::setSign($params,$key); 
		$jsonStr = json_encode($params);		
		$response = self::postJsonCurl($jsonStr, $url, 30);
		//var_dump($response);die;	
		$res = json_decode($response, true);
		//var_dump($res['RETURNCON']);die;
		return $res['RETURNCON'];
    }


    //代付查询
    public function query($orderId)
	{
		header("Content-type:text/html;charset=utf-8");    //务必添加此行	
		 $params=array(		
			'TRDE_CODE'=>'20004',   //交易码
			'PRT_CODE'=>'1000164666',  //机构号
			'VER_NO'=>'1.0',
			'MERC_ID'=>'834421047330002',	
			'NON_STR'=>$this->getNonceStr(),
			'TM_SMP'=>$this->getMillisecond(),
			'SIGN_TYP'=>'MD5',
			'OUT_WITHDRAW_NO'=>$orderId,
		);
		$url= 'http://120.77.22.14:8380/pay/gateway/query.do';
		$key = '58e4b9a9d91b49b8a27424ad8a5f5050' ;
		ksort($params);   //三方要求按序提交
		$params["SIGN_DAT"]=self::setSign($params,$key); 
		$jsonStr = json_encode($params);	
		$response =self::postJsonCurl($jsonStr, $url, 30);
		//var_dump($response);die;
		$res = json_decode($response, true);
		if($res['BUS_STS']=='00'){
			$data = array(
			   "status" =>$res['BUS_STS'],
			   "money" => $res['WITHDRAW_MONEY'],
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
	function getNonceStr($length = 32) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";  
		$str ="";
		for ( $i = 0; $i < $length; $i++ )  {  
			$str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
		} 
		return $str;
	}
	
	function setSign($data,$Key) 
	{
			$signPars = "";
			//ksort($data);
			foreach($data as $k => $v) {
					if("" != $v && "pay_sign" != $k) {
							$signPars .= $k . "=" . $v . "&";
					}
			}
			
			$signPars .= "KEY=" . $Key;
			//var_dump($signPars);die;
			$sign = md5($signPars);
			return $sign;
	}	
	
	/**获取毫秒级别的时间戳*/
	function getMillisecond()
	{
		//获取毫秒的时间戳
		$time = explode ( " ", microtime () );
		$time = $time[1] . ($time[0] * 1000);
		$time2 = explode( ".", $time );
		$time = $time2[0];
		return $time;
	}	


	function postJsonCurl($jsonStr, $url, $second = 30) {
		$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOPT_TIMEOUT, $second);

	/* 	//如果有配置代理这里就设置代理
		if (PayConfig :: CURL_PROXY_HOST != "0.0.0.0" && PayConfig :: CURL_PROXY_PORT != 0) {
			curl_setopt($ch, CURLOPT_PROXY, PayConfig :: CURL_PROXY_HOST);
			curl_setopt($ch, CURLOPT_PROXYPORT, PayConfig :: CURL_PROXY_PORT);
		} */
		curl_setopt($ch, CURLOPT_URL, $url);

		//设置header
		curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			'Content-Type: application/json; charset=utf-8',
			'Content-Length: ' . strlen($jsonStr)
		));
		//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		//post提交方式
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
		//运行curl
		$data = curl_exec($ch);
		//var_dump(curl_error($ch));
		//var_dump($data);die;
		//返回结果
		if ($data) {
			curl_close($ch);
			return $data;
		}else{
			curl_close($ch);
			return curl_error($ch);			
		}
	}
	
}
?>