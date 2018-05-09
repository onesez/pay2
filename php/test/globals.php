<?php
header("Content-Type:text/html;Charset=utf-8");

class globals {

    protected $user_id, $key, $user_seller, $body, $notify_url, $out_order_no, $return_url, $subject, $total_fee;

    public function __construct($notify_url,$out_order_no,$return_url,$subject,$total_fee,$body='') {

        //宝宝支付PID
        $this->user_id = '362065605607332';
        //宝宝支付KEY
        $this->key = 'FxVAvcaCZ9tSr5MfpeXCsnXI7gjksFHh';
        //宝宝支付商户号
        $this->user_seller = '662040';
        //购买描述
        $this->body = $body;
        //异步通知
        $this->notify_url = $notify_url;
        //网站订单号
        $this->out_order_no = $out_order_no;
        //返回地址
        $this->return_url = $return_url;
        //订单名称
        $this->subject = $subject;
        //金额
        $this->total_fee = $total_fee;
    }

    //加密签名
    public function signparame() {
        //key码
        $key = $this->key;
        $p = array(
            'body' => $this->body,
            'notify_url' => $this->notify_url,
            'out_order_no' => $this->out_order_no,
            'user_id' => $this->user_id,
            'return_url' => $this->return_url,
            'subject' => $this->subject,
            'total_fee' => $this->total_fee,
            'user_seller' => $this->user_seller,
        );

        //拼接字符串
        if($p['body']==''){
        $para = 'notify_url=' . $p['notify_url'] .
                '&out_order_no=' . $p['out_order_no'] .
                '&user_id=' . $p['user_id'] .
                '&return_url=' . $p['return_url'] .
                '&subject=' . $p['subject'] .
                '&total_fee=' . $p['total_fee'] .
                '&user_seller=' . $p['user_seller'];
        }else{
            $para = 'body=' . $p['body'] .
                '&notify_url=' . $p['notify_url'] .
                '&out_order_no=' . $p['out_order_no'] .
                '&user_id=' . $p['user_id'] .
                '&return_url=' . $p['return_url'] .
                '&subject=' . $p['subject'] .
                '&total_fee=' . $p['total_fee'] .
                '&user_seller=' . $p['user_seller'];
        }
       // return $para;*
	    self::toarr('签名前原始串'.$para.$key);
        return md5($para.$key);
    }

    //提交参数
    public function parame() {
        $parameter = array(
            //pid号
            'user_id' => $this->user_id,
            //商户号
            'user_seller' => $this->user_seller,
			//订单号
            'out_order_no' => $this->out_order_no,
		    //订单名称
            'subject' => $this->subject,
			//金额
            'total_fee' => $this->total_fee,
			//商品描述
            'body' => $this->body,
			//异步返回结果地址
            'notify_url' => $this->notify_url,
			//同步返回结果地址
            'return_url' => $this->return_url,
			//加密字符串
            'sign' => $this->signparame(),
            //支付类型；3网银  4储蓄卡
            'pay_type' => '3',
            //银行
            'banktype' => '',
        );
		self::toarr('请求数组：');
		self::toarr($parameter);
        return $parameter;
    }
	
//把数组写入txt
public function toarr($data,$name=''){	
	$name = ($name=='')?'arr.txt':$name.'.txt';
	file_put_contents($name, var_export($data,true)."\r\n",FILE_APPEND);

}	

}

?>


