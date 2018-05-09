<?php
namespace Admin\Controller;
use Think\Controller;
class SettlementController extends CommonController {

    $KEY = '51709394L';
    public function index(){

        if(empty(I('sign'))){
            return;
        }

        //校验签名
        $Crypt::decrypt(I('sign'), $KEY);
		
		$model = M('orderlist');
		$map['pay_state'] = array('eq','1'); 	//支付成功的订单
		$map['status'] = array('eq','2'); 	 //未结算的订单	
		$map['_string'] = "unix_timestamp()-pay_time>=0";	 	//超过结算时间
		//$start = "1521907200";
		//$end = "1522166400";
		//$map['creat_time'] = array('between',"$start,$end");

        //待结算的订单(每次500条)
		$data = $model->field('id,user_id,pay_total,pay_sell_fee,order_num,pay_to_member,pay_state,status,pre_pay_time')->where($map)->order('id asc')->limit(500)->select();
		//print_r($model->_sql());
		
		$success_count = 0;
		//$count1 = 0;
		$total=count($data);    //取得数组长度
		//print_r($total);die;
		foreach($data as $k => $v){
			$data[] = $v;
		}		
		$dataList  =  array();    //生成新的数组
		for($i = 0;$i<$total;$i++){
            M()->startTrans(); //批量结算锁单笔记录，防锁表

            try{

              //重新获取待结算的订单，才能在事务中保证是最新的记录
              $m = $model->field('id,user_id,pay_total,pay_sell_fee,order_num,pay_to_member,pay_state,status,pre_pay_time')->where('id='.$data[$i]['id'])->find();	
			  $m['pay_to_member'] = sprintf("%.2f", $m['pay_to_member']);     			  
			  $res1 = M('user')->where(array('user_name'=>$m['user_id']))->setInc('balance', $m['pay_to_member']);  //加余额

              $status = array( 
                  'status' => '1', 
                  'success_pay_time' => time(), 
              );

              $model->where('id='.$m['id'])->save($status);	//更改状态	
              
              $t = array();
			  $t['addtime'] = time();
			  $t['username'] = $m['user_id'];
			  $t['order_num'] = $m['order_num'];		 
			  $t['amount'] = $m['pay_total'];
			  $t['pay_fee'] = $m['pay_sell_fee'];
			  $t['real_amount'] = $m['pay_to_member'];
			  $t['remark'] = '系统结算' ;   

              $res2 = M('closelist')->add($t);  //插入数据 

			  if($res1 && $res2){
                  M()->commit();
				  $success_count++;
			  }else{
                  M()->rollback();
				  toarr('[结算]修改余额失败');
				  toarr('user_name: '.$m['user_id'].'; money: '.$m['pay_to_member'].'; order_id: '.$m['order_num'],'admin');
			  }
            
            } catch(Exception $e) {
                  M()->rollback();
				  toarr('[结算]修改余额失败');
                  toarr('原因: '.$e->getMessage(),'admin');
				  toarr('user_name: '.$m['user_id'].'; money: '.$m['pay_to_member'].'; order_id: '.$m['order_num'],'admin');
            }
		}

		$this->ajaxReturn('{ "total": "'.$total.'", "success_count":"'.$success_count.'", "fail_count":"'.($total-$success_count).'" }','JSON');
		
    }

    //产生签名
    public function GenSign()
    {
        $this->ajaxReturn($Crypt::encrypt(I('sign'), $KEY),'JSON');
    }
}
