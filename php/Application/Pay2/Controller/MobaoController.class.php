<?php
namespace Pay2\Controller;
use Think\Controller;
class MobaoController extends Controller{


	
	private $arr;
	function __construct(){
		$this->arr = array(
			'url' => 'http://hyapi.kspay.net:8190/ks_dfpay/mopay/pay', //代付地址
			'versionId'=>'001',
			'businessType'=>'470000',
			'merId'=>'936177846590000',
			'merPubKey'=>'1ABFEC02E13D461B',
			'signType'=>'MD5',
			'pfxpath'=>'./Public/Cert/936177846590000.pfx',
			'cerpath'=>'./Public/Cert/936177846590000.cer',
		);
	}
	
	
    //dopay方法
    public function dopay($data)
	{	   

		//var_dump($data);die;  
		$config = $this->arr;
		header("Content-type:text/html;charset=utf-8");    //务必添加此行
		/**************************请求参数**************************/
		
		//$orderId = 'tx' . date('Ymds') . mt_rand(1000, 9999);           
		$orderId = $data["txorderId"];           
		$transDate = date('YmdHis',time());           
		$transAmount = $data['WITHDRAW_MONEY'];	                     //金额	
		$accName = urlencode(iconv('UTF-8','GBK',$data['PERSON_NM']));	       //姓名	
		$accNo = $data['CARD_NO'];	       //卡号

	   $transBody=array(
		   "accName" => $accName,
		   "accNo"=>$accNo ,
		   "orderId"=>$orderId,
		   "transDate"=>$transDate,
		   "transAmount"=>$transAmount
	   );
	   $transBody =json_encode($transBody);
       $transBody = self::cfcasign_pkcs12(trim($transBody),$config['pfxpath']);		
       //var_dump($transBody);die;
	   $str = "businessType" ."=". $config['businessType'] . "&merId" ."=". $config['merId']
	   . "&transBody" ."=". $transBody . "&versionId"."=".$config['versionId']."&key"."=".$config['merPubKey'];
		
	   $sign = strtoupper(md5($str));
	   $arr = array(
			'signData' => $sign,
			'versionId' => $config['versionId'],
			'businessType' => $config['businessType'],
			'merId' => $config['merId'],
			'transBody' => $transBody, 
			'signType' => $config['signType']
	   );	   
       $result=self::array_to_json($arr);	   
       $returns=self::http_post_json($config['url'], $result);	  
	   //var_dump($returns);die;	   
       $returns = json_decode($returns,true);	   
	   $resBody = $returns['resBody'];
	   $resa = self::cer_public_decrypt(trim($resBody),$config['cerpath']);
	   //var_dump($resa);die;
	   $res = json_decode($resa,true);
	   $refMsg = iconv('GB2312', 'UTF-8',urldecode($res['refMsg']));
	   return $refMsg;
	   //var_dump($resa);die;
	  //var_dump($refMsg);	   
    }


	
	/****相关函数开始****/
	
	//私钥加密
	function cfcasign_pkcs12($plainText,$pfxpath){
		//echo '加密前:'.$plainText;
		//die;
		//echo "<br/>";
		$p12cert = array();
		if (!$cert_store = file_get_contents($pfxpath)) {
		echo "Error: Unable to read the cert file\n";
		exit;
		}

		$pi_key;
		if (openssl_pkcs12_read($cert_store, $cert_info, "111111")) {
			//echo "Certificate Information\n";
			$pi_key=$cert_info['pkey'];
			//print_r($cert_info);
		} else {
			echo "Error: Unable to read the cert store.\n";
			exit;
		}
		
		$encrypted;
		if(openssl_private_encrypt( $plainText,$encrypted,$pi_key)){
			}
		

		$signMsg = base64_encode($encrypted); //base64转码加密信息
		//echo "加密后:".$signMsg;
		//exit;
		return $signMsg;
	}
	
	//公钥解密
	function cer_public_decrypt ($signMsg,$cerpath){
		
		//base64解密
		$finaltext=base64_decode($signMsg);
		
		$certificateCAcerContent = file_get_contents($cerpath);
		$certificateCApemContent =  '-----BEGIN CERTIFICATE-----'.PHP_EOL
		.chunk_split(base64_encode($certificateCAcerContent), 64, PHP_EOL)
		.'-----END CERTIFICATE-----'.PHP_EOL;
		
		openssl_public_decrypt ($finaltext,$source,$certificateCApemContent);
		return    $source;

	}
	function array_to_json( $array ){
		global $result;
		if( !is_array( $array ) ){
			return false;
		}
		$associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));
		if( $associative ){
			$construct = array();
			foreach( $array as $key => $value ){
				// We first copy each key/value pair into a staging array,
				// formatting each key and value properly as we go.
				// Format the key:
				if( is_numeric($key) ){
					$key = "key_$key";
				}
				$key = "'".addslashes($key)."'";
				// Format the value:
				if( is_array( $value )){
					$value = array_to_json( $value );
				} else if( !is_numeric( $value ) || is_string( $value ) ){
					$value = "'".addslashes($value)."'";
				}
				// Add to staging array:
				$construct[] = "$key: $value";
			}
			// Then we collapse the staging array into the JSON form:
			$result = "{ " . implode( ", ", $construct ) . " }";
		} else { // If the array is a vector (not associative):
			$construct = array();
			foreach( $array as $value ){
				// Format the value:
				if( is_array( $value )){
					$value = array_to_json( $value );
				} else if( !is_numeric( $value ) || is_string( $value ) ){
					$value = "'".addslashes($value)."'";
				}
				// Add to staging array:
				$construct[] = $value;
			}
			// Then we collapse the staging array into the JSON form:
			$result = "[ " . implode( ", ", $construct ) . " ]";
		}

		return $result;
	}

	function http_post_json($url, $jsonStr)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json; charset=gbk',
				'Content-Length: ' . strlen($jsonStr)
		)
		);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
		//var_dump($httpCode);
		//var_dump($response);die;
		return $response;
		//echo "<br>";
		//echo $response;
		
		
		//公钥解密信息 
		//RSA_SHA::cer_public_decrypt(resBody,$cerpath);
		
		//return array($httpCode, $response);
	}	
	
}
?>