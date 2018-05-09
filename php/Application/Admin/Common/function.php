<?php

//传递一个父级分类ID返回所有子分类
function getChilds ($cate, $pid) {
	$arr = array();
	foreach ($cate as $v) {
		if ($v['pid'] == $pid) {
			$arr[] = $v;
			$arr = array_merge($arr, getChilds($cate, $v['id']));
		}
	}
	return $arr;
}

//传递一个父级分类ID返回所有子分类ID
function getChildsId ($cate, $pid) {
	$arr = array();
	foreach ($cate as $v) {
		if ($v['pid'] == $pid) {
			$arr[] = $v['id'];
			$arr = array_merge($arr, getChildsId($cate, $v['id']));
		}
	}
	return $arr;
}

//返回所有菜单分类
function unlimitedForLayer ($cate, $name = 'child', $pid = 0) {
	$arr = array();
	foreach ($cate as $v) {
		if ($v['pid'] == $pid) {
			$v[$name] = unlimitedForLayer($cate, $name, $v['id']);
			$arr[] = $v;
		}
	}
	return $arr;
}

//取出所有菜单
function getAllMenu(){	
	$model = M('auth_rule');  //从数据库读取菜单
	$cate = $model->where('ismenu = 1')->order('id asc')->select();	 //读取用作菜单显示的
	//var_dump($cate);die;
	$menu=unlimitedForLayer($cate);
	//var_dump($model->_sql());
	//var_dump($menu);die;
	return $menu;
}

//取出所有权限节点
function getAllauthList(){	
	$model = M('auth_rule');  //从数据库读取菜单
	$cate = $model->order('id asc')->select();	 //读取所有节点
	//var_dump($cate);die;
	$menu=unlimitedForLayer($cate);
	//var_dump($model->_sql());
	//var_dump($menu);die;
	return $menu;
}





function getMenuList($auth_id){
	//根据角色权限过滤菜单
	$menu_list = getAllMenu();   //获取所有菜单
	//dump($menu_list);die;
	if($auth_id!='1'){   //超级管理员加载所有菜单
		$auth = new \Think\Auth();    		
		
		//$authList = $auth->getGroups($auth_id); 	 //根据用户id获取用户组,返回值为数组
		//$role_right = $authList[0]['rules'];         //得到有效权限id
		//var_dump($role_right);die;
		//$role_right = explode(',', $role_right);   	 //形成数组		
		

        $authList = $auth->getAuthList($auth_id,1); //获取用户需要验证的所有有效规则列表
		//var_dump($authList);die;
		$map['name']=array('in',$authList);		
		$role_right = M('auth_rule')->where($map)->getField('id',true);	

		foreach($menu_list as $k=>$v){
			foreach ($v['child'] as $kk=>$vv){
					if(!in_array($vv['id'], $role_right)){    //判断数组是否在菜单表里面

						unset($menu_list[$k]['child'][$kk]);//过滤菜单

					}
			}
		}		
		
	}

	return $menu_list;
}




//上传图片
function uploadOne($imgName, $dirName, $thumb = array())
{
	// 上传图片
	if(isset($_FILES[$imgName]) && $_FILES[$imgName]['error'] == 0)
	{
		$rootPath = C('IMG_rootPath');
		$upload = new \Think\Upload(array(
			'rootPath' => $rootPath,
		));// 实例化上传类
		$upload->maxSize = (int)C('IMG_maxSize') * 1024 * 1024;// 设置附件上传大小
		$upload->exts = C('IMG_exts');// 设置附件上传类型
		// $upload->rootPath = $rootPath; // 设置附件上传根目录
		$upload->savePath = $dirName ; // 图片二级目录的名称
		// 上传文件 
		// 上传时指定一个要上传的图片的名称，否则会把表单中所有的图片都处理，之后再想其他图片时就再找不到图片了
		$info   =   $upload->upload(array($imgName=>$_FILES[$imgName]));
		if(!$info)
		{
			return array(
				'ok' => 0,
				'error' => $upload->getError(),
			);
		}
		else
		{
			$ret['ok'] = 1;
			$ret['images'][0] = $logoName = $info[$imgName]['savepath'] . $info[$imgName]['savename'];
			// 判断是否生成缩略图
			if($thumb)
			{
				$image = new \Think\Image();
				// 循环生成缩略图
				foreach ($thumb as $k => $v)
				{
					$ret['images'][$k+1] = $info[$imgName]['savepath'] . 'thumb_'.$k.'_' .$info[$imgName]['savename'];
					// 打开要处理的图片
					$image->open($rootPath.$logoName);
					$image->thumb($v[0], $v[1])->save($rootPath.$ret['images'][$k+1]);
				}
			}
			return $ret;
		}
	}
}
function showImage($url, $errorUrl='', $class='', $alt='', $title='', $width='', $height='')
{	
	//var_dump($height);die;
	$url = (!empty($url)) ? C('IMG_URL').$url : C('IMG_URL_ERROR').$errorUrl;
	$errorUrl = (!empty($errorUrl)) ? $errorUrl : C('IMG_URL_ERROR');
	$width = (!empty($width)) ? "width='$width'":'';
	$height = (!empty($height)) ? "height='$height'":'';
	$class  = (!empty($class)) ? "class='$class'":'';
	//$alt  = (!empty($alt)) ? "alt='$alt'":"alt=";
	//$title  = (!empty($title)) ? "title='$title'":"title=";
	//echo "<img src='$url' $class $alt $title $width $height />"; 	
	
	echo "<img src='$url' $class $width $height />"; 	
}

//截取字符
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)  
{  
		if(function_exists("mb_substr")){  
              if($suffix)  
              return mb_substr($str, $start, $length, $charset)."...";  
              else
                   return mb_substr($str, $start, $length, $charset);  
         }  
         elseif(function_exists('iconv_substr')) {  
             if($suffix)  
                  return iconv_substr($str,$start,$length,$charset)."...";  
             else
                  return iconv_substr($str,$start,$length,$charset);  
         }  
         $re['utf-8']   = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef]
                  [x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";  
         $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";  
         $re['gbk']    = "/[x01-x7f]|[x81-xfe][x40-xfe]/";  
         $re['big5']   = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";  
         preg_match_all($re[$charset], $str, $match);  
         $slice = join("",array_slice($match[0], $start, $length));  
         if($suffix) return $slice."…";  
         return $slice;
}

//导出excel
function exportExcel($expTitle,$expCellName,$expTableData){
    $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
    $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
    $cellNum = count($expCellName);
    $dataNum = count($expTableData);
    vendor("PHPExcel.PHPExcel");
    $objPHPExcel = new PHPExcel();
    $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

    $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  导出时间:'.date('Y-m-d H:i:s'));  //设置第一行标题
    for($i=0;$i<$cellNum;$i++){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
    }
    // Miscellaneous glyphs, UTF-8
    for($i=0;$i<$dataNum;$i++){
        for($j=0;$j<$cellNum;$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
        }
    }

    header('pragma:public');
    header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
    header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;
}

//导入excel
function import_excel($file){
    // 判断文件是什么格式
    $type = pathinfo($file);
    $type = strtolower($type["extension"]);
    //$type=$type==='csv' ? $type : 'Excel5';
	if ($type == 'xlsx') { $type = 'Excel2007'; } elseif ($type == 'xls') { $type = 'Excel5'; }	
    ini_set('max_execution_time', '0');
    Vendor('PHPExcel.PHPExcel');
    // 判断使用哪种格式
    $objReader = PHPExcel_IOFactory::createReader($type);
    $objPHPExcel = $objReader->load($file);
    $sheet = $objPHPExcel->getSheet(0);
    // 取得总行数
    $highestRow = $sheet->getHighestRow();
    // 取得总列数
    $highestColumn = $sheet->getHighestColumn();
    //循环读取excel文件,读取一条,插入一条
    $data=array();
    //从第3行开始读取数据(忽略表头)
    for($j=3;$j<=$highestRow;$j++){
        //从A列读取数据
        for($k='A';$k<=$highestColumn;$k++){
            // 读取单元格
            $data[$j][]=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
			//$data[$j][0] =date('Y-m-d H:i:s');
			//var_dump($data[$j]);die;
        }
    }
	//var_dump($data);die;
    return $data;
}

//生成不重复数字，默认6位
function getChar($length = 6,$type='a') 
{
	if($type=='a'){
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';	
	}else{
		$chars = '0123456789';
	}
	
	
	$password = "";
	for ( $i = 0; $i < $length; $i++ )
		$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
	return $password;
}

//根据用户名取得用户角色名称
function getUserR($user) 
{
	$condition['user_name'] = $user;
	$memberinfo = M('user')
		->table('admin a')
		//->where("a.uid='$uid' and g.status='1'")
		->where($condition)
		->join("auth_group_access b on a.id=b.uid")
		->join("role c on b.group_id=c.id")
		->field('a.id as id,user_name,truename,bumen,title')->find();	
	
	return $memberinfo['title'];
}




?>
