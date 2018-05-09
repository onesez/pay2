<?php
 return array (
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'127.0.0.1',
	'DB_NAME'=>'pay2',
	'DB_USER'=>'root',
	'DB_PWD'=>'linlurui',
	'DB_PREFIX'=>'',
	'DB_CHARSET'=>'utf8',
	'DB_PORT'=>'3306',	
	'TMPL_ACTION_ERROR'    => './Public/Tpl/error.html', // error tpl
    'TMPL_ACTION_SUCCESS'  => './Public/Tpl/success.html', //  success tpl
	
	
	/********** 图片相关的配置 ************/
	'IMG_maxSize' => '10M',
	'IMG_exts' => array('jpg', 'jpeg', 'bmp', 'gif', 'png', 'jpeg', 'zip', 'rar', 'dwt', 'dwg', 'dxf', 'stp', 'prt'),
	'IMG_rootPath' => './Public/Uploads/',
	'IMG_URL' => '/Public/Uploads/',
	'IMG_URL_img' => '/Public/Uploads/Errorimg/default_touxiang.png', 
	'IMG_URL_ERROR' => '/Public/Uploads/Errorimg/',        //错误图像路径	
	
 //Auth配置
	'AUTH_CONFIG' => array(
		// 用户组数据表名
		'AUTH_GROUP' => 'role',
		// 用户-用户组关系表
		'AUTH_GROUP_ACCESS' => 'auth_group_access',
		// 权限规则表
		'AUTH_RULE' => 'auth_rule',
		// 用户信息表
		'AUTH_USER' => 'admin'
	),
	

	
	
	
);
?>