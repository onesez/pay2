<?php


class BatchPayment {
	
	public function apply($method,$data) {
		
		require_once __DIR__ . '/libs/nusoap/nusoap.php';
		$url =  'http://mtc.shengpay.com/services/BatchPayment/BatchPayment?wsdl';
		$soapClient = new nusoap_client($url, 'wsdl');	// 连接 web service
		
		// 设置字符集
		$soapClient->soap_defencoding = 'utf-8';
		$soapClient->decode_utf8 = false;
		$soapClient->xml_encoding = 'utf-8';
		
/* 		if($this->getIsDebug()) {	// -- 调试
			$err = $soapClient->getError();
			if ($err) {
				echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';return ;
			}
		} */
		
		$parameter = array('arg0'=>$data);
		$result = $soapClient->call($method, $parameter);	// 调用  web service
		
		
		
		

		
		return $result;
	}



	
	
}






?>