<?php
//$host = 'http://61.129.71.103:7970/agent-main/openapi';
$host = 'https://caspay.sandpay.com.cn/agent-main/openapi';

return array(
    'AgentPay' => array(
        'transCode' => 'RTPM',
        'merId' => '888800000000001',
        'url' => $host . '/agentpay',
        'pt' => array(
            'orderCode' => '000000001062',
            'version' => '01',
            'productId' => '00000003',
            'tranTime' => date('YmdHis', time()),
            'timeOut' => '20161024120000',
            'busiType' => '1',
            'tranAmt' => '000000000001',
            'currencyCode' => '156',
//        'accAttr' => '1',
            'accAttr' => '0',
            'accNo' => '6216261000000000018',
            'accType' => '4',
            'accName' => '全渠道',
//        'provNo' => 'sh',
//        'cityNo' => 'sh',
            'bankName' => 'cbc',
            'bankType' => '1',
            'remark' => 'pay'
        )
    ),
    'Collection' => array(
        'transCode' => 'RTCO',
        //'merId' => '10250476',   
        'merId' => '12282271',   
        'url' => $host . '/collection',
        'pt' => array(
            'orderCode' => date("YmdHis").mt_rand(100000, 999999),
            'version' => '01',
            'productId' => '00000002',
            'tranTime' => date('YmdHis', time()),
            'timeOut' => '20161024120000',
            'tranAmt' => '000000250000',
            'currencyCode' => '156',
            'accAttr' => '0',
            'accType' => '4',
            'accNo' => '6230582000052138172',   
            'accName' => '陈鸿辉',       
            //'bankName' => '全渠道',
            'provNo' => '010000',
            'cityNo' => '010000',
            'certType' => '0101',
            'certNo' => '440782199109278010',     
            'cardId' => '440782199109278010',              
            'phone' => '18002659533',          
            'purpose' => '代收',
        )
    ),
    'IdCardVerify' => array(
        'transCode' => 'RNAU',
        'merId' => '888800000000001',
        'url' => $host . '/idCardVerify',
        'pt' => array(
            'orderCode' => '400000000011',
            'version' => '01',
            'productId' => '00000003',
            'tranTime' => date('YmdHis', time()),
            'name' => '罗福',
            'certType' => '0001',
            'certNo' => '350424198806210053',
            'returnPic' => '1',
        )
    ),
    'QueryBalance' => array(
        'transCode' => 'MBQU',
        'merId' => '888800000000001',
        'url' => $host . '/queryBalance',
        'pt' => array(
            'orderCode' => '200000001048',
            'version' => '01',
            'productId' => '00000003',
            'tranTime' => date('YmdHis', time())
        )
    ),
    'QueryFee' => array(
        'transCode' => 'PTFQ',
        'merId' => '888800000000001',
        'url' => $host . '/queryAgentpayFee',
        'pt' => array(
            'orderCode' => '100000011178',
            'version' => '01',
            'productId' => '00000003',
            'tranTime' => date('YmdHis', time()),
            'tranAmt' => '000000020000',
            'currencyCode' => '156',
            'accAttr' => '0',
            'accType' => '4',
            'accNo' => '5187180008861234'
        )
    ),
    'QueryOrder' => array(
        'transCode' => 'ODQU',
        'merId' => '888800000000001',
        'url' => $host . '/queryOrder',
        'pt' => array(
            'orderCode' => '000000001051',
            'version' => '01',
            'productId' => '00000003',
            'tranTime' => date('YmdHis', time())
        )
    ),
    'RealNameVerify' => array(
        'transCode' => 'RNAU',
        'merId' => '888800000000001',
        'url' => $host . '/realNameVerify',
        'pt' => array(
            'orderCode' => '300000000039',
            'version' => '01',
            'productId' => '00000001',
            'tranTime' => date('YmdHis', time()),
            'accAttr' => '0',
            'accType' => '4',
            'accNo' => '6216261000000000018',
            'accName' => '汪中',
            'certType' => '01',
            'certNo' => '350821198706134513',
            'phone' => '15980847045',
        )
    ),
);