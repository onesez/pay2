<?php


$Collection = array(
	'transCode' => 'RTCO',
	'merId' => '12282271',   
	'url' => 'https://caspay.sandpay.com.cn/agent-main/openapi/collection',
	'pt' => array(
		'orderCode' => date("YmdHis").mt_rand(100000, 999999),
		'version' => '01',
		'productId' => '00000002',
		'tranTime' => date('YmdHis', time()),
		'timeOut' => '20161024120000',
		'tranAmt' => substr(strval($_POST['tranAmt']*100+1000000000000),1,12),
		'currencyCode' => '156',
		'accAttr' => '0',
		'accType' => '4',
		'accNo' => $_POST['accNo'],   
		'accName' => $_POST['accName'],       
		//'bankName' => '全渠道',
		'provNo' => '010000',
		'cityNo' => '010000',
		'certType' => '0101',
		'certNo' => $_POST['certNo'],     
		//'cardId' => $_POST['cardId'],              
		'cardId' => $_POST['certNo'],              
		'phone' => $_POST['phone'],          
		'purpose' => '代收',
	)
);
?>