<?php
namespace Pay2\Controller;
use Think\Controller;
class JingdongController extends Controller{


	
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
	 $money = $data["WITHDRAW_MONEY"];
	 $personNm = $data["PERSON_NM"];
	 $cardNo = $data["CARD_NO"];
	 $bnkNm = $data["BNK_NM"];
	 $bnkNo = $data["BNK_NO"];
	 $bnkCd = $data["BNK_CD"];
	 $idNo = $data["CRP_ID_NO"];
	 $phoneNo = $data["PHONE_NO"];
	 $payId = $data["PAY_ID"];	 
	 $orderId = $data["txorderId"];
	 $params=array(		
		'inputCharset'=>'1',   
		'language'=>'1',  
		'signType'=>'0',
		'merchantId'=>'361935',	
		'payerName'=>$personNm,
		'bankaccount'=>$cardNo,
		'bank_num'=>$bnkCd,
		'bankpoint'=>$bnkNm,
		'accountType'=>'0',
		'orderNo'=>$orderId,		
		'orderAmount'=>$money*100,		
		'orderCurrency'=>'156',		
		'orderDatetime'=>date('YmdHis',time()),
		'productName'=>'劳务费',
		'ext2'=>'361935',
		'W'=>'0',
	);
	$url= 'https://wanshangxing.com/index.php?app=smartedsf';
	$key = 'QURYJNBAHGURLIDHOPNBZXUAI2901' ;
	$params["signMsg"]=self::createSign($params,$key); 
	$response = self::postJsonCurl($params, $url, 30);
	$response = self::xmlToArray(trim($response));
	//var_dump($response);die;
	return $response['payDesc'];
	/* 	if($response['payResult']=='S0000000'){	
			echo '成功';
		}else{
			echo $response['payDesc'];
		} */	
    }


    //代付查询
    public function query($orderId)
	{
		header("Content-type:text/html;charset=utf-8");    //务必添加此行	
		 $params=array(		
			'inputCharset'=>'1',   
			'language'=>'1',  
			'signType'=>'0',
			'merchantId'=>'361935',	
			'mchtOrderId'=>'',
			'orderNo'=>$orderId,
			//'orderNo'=>'d2018020219145847980',
		);
		$url= 'https://wanshangxing.com/index.php?app=smartedsf&act=query';
		$key = 'QURYJNBAHGURLIDHOPNBZXUAI2901' ;
		$params["signMsg"]=self::createSign($params,$key); 
		$response = self::postJsonCurl($params, $url, 30);
		$res = self::xmlToArray(trim($response));
		//var_dump($res);die;		
		if($res['status']=='40'){
			$data = array(
			   "status" =>$res['status'],
			   "money" => $res['fee']/100,
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
	function createSign($data,$Key) 
	{
			$signPars = "";
			foreach($data as $k => $v) {
				if("" != $v && "sign" != $k) {
					$signPars .= $k . "=" .$v . "&";
				}
			}
			$signPars .= "key=" . $Key;
			$sign = strtoupper(md5($signPars));
			return $sign;
	}

	/*作用：以post方式提交data到对应的接口url*/
	function postJsonCurl($post_data,$url,$second=30){
		$header = array('Content-Typel' => 'Content-Typel:application/x-www-form-urlencoded;charset=utf-8'); 
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在 
		curl_setopt($ch, CURLOPT_HEADER, false);//获得head内容
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
		curl_setopt($ch, CURLOPT_POST, true); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data)); 
		//curl_setopt($ch, CURLOPT_POSTFIELDS, $data['params']); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
		curl_setopt($ch, CURLOPT_TIMEOUT, $second); 
	  
		$data = curl_exec($ch); 

		//返回结果
		if($data)
		{
			curl_close($ch);
			return $data;
		}
		else 
		{ 
			$error = curl_errno($ch);
			//echo "curl出错，错误码:$error"."<br>";
			//echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
			curl_close($ch);
			//return false;
			//throw new SDKRuntimeException("curl出错，错误码:$error");
		}
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