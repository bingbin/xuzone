<?php
/**
*�˴�Ϊ����ϸ�����ã���רΪ��Ա�����޸�
**/
return array(

	/**
	**���ݿ�����,���ʱ�ɴ��м�
	**/
	'db'=> require (__DIR__ . DIRECTORY_SEPARATOR.'config_db.php'),
	
	/*ʹ��ʲôģ������,
	*	smarty: smarty3
	*   php: ԭ��̬
	**/
	'template_engine' 	=> 'smarty',
	
	/*��վurl��ʽ
	* 1:	www.domain.com/index.php?sys=sys&mod=mod&con=con&act=act&k=v&arr=a|b|c
	* 2:	www.domain.com/index.php?r=sys/mod/con/act&k=v&arr=a|b|c
	* 3:	www.domain.com/index.php?r=sys-mod-con-act-k-v-arr-a|b|c
	*/
	'url_format' 		=> '1',

	
	
	/**
	*Ĭ�ϵ�·��
	**/
	'default_sys' => '',
	'default_mod' => 'site',
	'default_con' => 'main',
	'default_act' => 'index',
);

?>