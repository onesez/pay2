<?php
namespace lib;

class errorHandle {
    public static function log($msg) {
       // error_log(date("[Y-m-d H:i:s]") . " -[ error : " . $msg . " \n", 3, "/tmp/sd_plug_err.log");
		$fp = fopen("log.txt","a");
		flock($fp, LOCK_EX) ;
		fwrite($fp,"执行日期：".strftime("%Y%m%d%H%M%S",time())."\n".$msg."\n");
		flock($fp, LOCK_UN);
		fclose($fp);
    }

    public static function throwException(\Exception $e) {
        echo json_encode(
            array(
                'respCode' => $e->getCode(),
                'respDesc' => $e->getMessage()
            )
        );
        exit;
    }
}