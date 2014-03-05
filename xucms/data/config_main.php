<?php
/**
*此处为更详细的设置，非专为人员请勿修改
**/
return array(
	/*使用什么模板引擎,
	*	smarty: smarty3
	*   php: 原生态
	*   self: 本系统方式
	**/
	'template_engine' 	=> 'smarty',
	
	/*网站url格式
	* 1:	www.domain.com/index.php?sys=sys&mod=mod&con=con&act=act&k=v&arr=a|b|c
	* 2:	www.domain.com/index.php?r=sys/mod/con/act&k=v&arr=a|b|c
	* 3:	www.domain.com/index.php?r=sys-mod-con-act-k-v-arr-a|b|c
	*/
	'url_format' 		=> '1',

	/**
	**数据库配置,多个时可处行加
	**/
	'db'=> require (__DIR__ . DIRECTORY_SEPARATOR.'config_db.php'),
);

?>