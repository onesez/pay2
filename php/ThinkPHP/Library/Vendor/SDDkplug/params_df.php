<?php

$dfData = array(
        'transCode' => 'RTPM',
        'merId' => '12282271',
		'url' => 'https://caspay.sandpay.com.cn/agent-main/openapi/agentpay',
        'pt' => array(
            'orderCode' => date("YmdHis").mt_rand(100000, 999999),
            'version' => '01',
            'productId' => '00000004',
            'tranTime' => date('YmdHis', time()),
            'timeOut' => '20161024120000',
            'busiType' => '1',
            'tranAmt' => substr(strval($params['tranAmt']*100+1000000000000),1,12),
            'currencyCode' => '156',
	//      'accAttr' => '1',
            'accAttr' => '0',
            'accNo' => $params['accNo'],
            'accType' => '4',
            'accName' => $params['accName'],
	//      'provNo' => 'sh',
	//      'cityNo' => 'sh',
            //'bankName' => '',
            //'bankType' => '',
            'remark' => '代付测试'
	)
);


?>