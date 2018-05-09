<?php
/**
 * 阿里云短信验证码发送类
 * @author Administrator
 *
 */
class Sms {
    // 保存错误信息
    public $error;
    // Access Key ID
    private $accessKeyId = '';
    // Access Access Key Secret
    private $accessKeySecret = '';
    // 签名
    private $signName = '';
    // 模版ID
    private $templateCode = '';
    public function __construct($cofig = array()) {
        $cofig = array (
                'accessKeyId' => 'LTAIhcT7WAsxmud3',
                'accessKeySecret' => 'hsiBThPQ6cabIumL9UK9jX4RzikgJ6',
                'signName' => '郭贞亮',
                //'templateCode' => 'SMS_76510109' 
        );
        // 配置参数
        $this->accessKeyId = $cofig ['accessKeyId'];
        $this->accessKeySecret = $cofig ['accessKeySecret'];
        $this->signName = $cofig ['signName'];
        //$this->templateCode = $cofig ['templateCode'];
    }
    private function percentEncode($string) {
        $string = urlencode ( $string );
        $string = preg_replace ( '/\+/', '%20', $string );
        $string = preg_replace ( '/\*/', '%2A', $string );
        $string = preg_replace ( '/%7E/', '~', $string );
        return $string;
    }
    /**
     * 签名
     *
     * @param unknown $parameters            
     * @param unknown $accessKeySecret            
     * @return string
     */
    private function computeSignature($parameters, $accessKeySecret) {
        ksort ( $parameters );
        $canonicalizedQueryString = '';
        foreach ( $parameters as $key => $value ) {
            $canonicalizedQueryString .= '&' . $this->percentEncode ( $key ) . '=' . $this->percentEncode ( $value );
        }
        $stringToSign = 'GET&%2F&' . $this->percentencode ( substr ( $canonicalizedQueryString, 1 ) );
        $signature = base64_encode ( hash_hmac ( 'sha1', $stringToSign, $accessKeySecret . '&', true ) );
        return $signature;
    }
    /**
     * 发送验证码 https://help.aliyun.com/document_detail/44364.html?spm=5176.doc44368.6.126.gSngXV
     *
     * @param unknown $mobile            
     * @param unknown $verify_code            
     *
     */
    public function send_sms($mobile,$TemplateCode,$TemplateParam) {
        $params = array (
                // 公共参数
                'SignName' => $this->signName,
                'Format' => 'JSON',
                'Version' => '2017-05-25',
                'AccessKeyId' => $this->accessKeyId,
                'SignatureVersion' => '1.0',
                'SignatureMethod' => 'HMAC-SHA1',
                'SignatureNonce' => uniqid (),
                'Timestamp' => gmdate ( 'Y-m-d\TH:i:s\Z' ),
                // 接口参数
                'Action' => 'SendSms',
                'TemplateCode' => $TemplateCode,
                'PhoneNumbers' => $mobile,
                'TemplateParam' => $TemplateParam, 
        );
		//var_dump($params);die;
        // 计算签名并把签名结果加入请求参数
        $params ['Signature'] = $this->computeSignature ( $params, $this->accessKeySecret );
        // 发送请求
        //$url = 'https://sms.aliyuncs.com/?' . http_build_query ( $params );
        $url = 'http://dysmsapi.aliyuncs.com/?' . http_build_query ( $params );
        
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
        $result = curl_exec ( $ch );
        curl_close ( $ch );
        $result = json_decode ( $result, true );
		//var_dump($result);die;
        if ($result ['Code']!='OK') {
            $this->error = $this->getErrorMessage ( $result ['Code'] );
            return $this->error;
        }else{
			return $result ['Code'];
		}
        //return true;
    }
    /**
     * 获取详细错误信息
     *
     * @param unknown $status            
     */
    public function getErrorMessage($status) {
		//var_dump($status);die;
        $message = array (
                'isv.INVALID_JSON_PARAM' => 'JSON参数不合法，只接受字符串值',
                'isv.OUT_OF_SERVICE' => '业务停机',
                'isv.AMOUNT_NOT_ENOUGH' => '账户余额不足',
                'isv.SMS_SIGNATURE_ILLEGAL' => '短信签名不合法',
                'isv.SMS_TEMPLATE_ILLEGAL' => '短信模板不合法',
                'isv.INVALID_PARAMETERS' => '参数异常',
                'isv.BUSINESS_LIMIT_CONTROL' => '触发业务流控',
                'isv.MOBILE_NUMBER_ILLEGAL' => '非法手机号' 
        );
        if (isset ( $message [$status] )) {
			//var_dump($message [$status]);die;
            return $message [$status];
			
        }
        //return $status;
    }
}