<?php

use lib\certUtil, lib\cryptUtil, lib\randomStr, lib\httpClient, lib\errorHandle;

define('DK_ROOT', dirname(__FILE__) . '/');

class handle {
    private $AESKey;
    private $cert;
    private $crypt;

    function __construct($config) {
		require_once(DK_ROOT.'sdk/autoload.php');	
		$cert = require_once(DK_ROOT.'cert.php');
		//var_dump($cert);
        if (empty($config['pubPath']) || empty($config['priPath']) || empty($config['certPwd'])) {
            errorHandle::throwException(new \Exception('证书配置有误'));
        }
        //生成AESKey
        $this->AESKey = randomStr::generate(16);
        //加载公私钥
        $this->cert = new certUtil($config['pubPath'], $config['priPath'], $config['certPwd']);
        //初始化加解密辅助类
        $this->crypt = new cryptUtil($this->cert->getPublicKey(), $this->cert->getPrivateKey());
    }







   public function execute($params) {
		//var_dump($params);die;
		require_once(DK_ROOT.'params_collection.php');
		$params = $Collection ;
		//var_dump($params);die;
        try {
			//var_dump($params);die;
            //发送加密数据
            $res = httpClient::request_post($params['url'], $this->pre($params));
            //解密返回数据并验签
            $result = $this->after($res);
			return $result;
			//var_dump($result);die;
			
        } catch (\Exception $e) {
            errorHandle::throwException($e);
        }
    }

	public function execute_df($params) {
		//var_dump($params);
		require_once(DK_ROOT.'params_df.php');
		$params = $dfData ;
		//var_dump($params);die;
        try {
			//var_dump($params);die;
            //发送加密数据
            $res = httpClient::request_post($params['url'], $this->pre($params));
            //解密返回数据并验签
            $result = $this->after($res);
			return $result;
			//var_dump($result);die;
			
        } catch (\Exception $e) {
            errorHandle::throwException($e);
        }
    }

    private function pre($params) {
        if (empty($params['pt']) || empty($params['transCode']) || empty($params['merId'])) {
            throw new \Exception('入参配置有误');
        }

        //入参json格式化
        $params['pt'] = json_encode($params['pt']);

        //AESKey 加密
        $encryptKey = $this->crypt->RSAEncryptByPub($this->AESKey);
        //报文加密
        $encryptData = $this->crypt->AESEncrypt($params['pt'], $this->AESKey);
        //签名
        $sign = $this->crypt->sign($params['pt']);

        //post数据
        $returnData['transCode'] = $params['transCode'];
        $returnData['merId'] = $params['merId'];
        $returnData['encryptKey'] = $encryptKey;
        $returnData['encryptData'] = $encryptData;
        $returnData['sign'] = $sign;
        $returnData = http_build_query($returnData);

        return $returnData;
    }

    private function after($res) {
        parse_str($res, $arr);

        if (empty($arr['encryptKey']) || empty($arr['encryptData']) || empty($arr['sign'])) {
            throw new \Exception('数据返回格式有误');
        }

        //AESKey 解密
        $decryptAESKey = $this->crypt->RSADecryptByPri($arr['encryptKey']);

        //报文解密
        $decryptPlainText = $this->crypt->AESDecrypt($arr['encryptData'], $decryptAESKey);

        //验签
        $verify = $this->crypt->verify($decryptPlainText, $arr['sign']);
        if ($verify) {
			//var_dump($decryptPlainText);die;
			return $decryptPlainText;
            //echo '报文验签通过<br>';
           // echo '返回报文：' . $decryptPlainText;
        }
    }
}	
	




?>