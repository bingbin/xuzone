<?php
/**
*�˴�Ϊ����ϸ�����ã���רΪ��Ա�����޸�
**/
return array(
	/*ʹ��ʲôģ������,
	*	smarty: smarty3
	*   php: ԭ��̬
	*   self: ��ϵͳ��ʽ
	**/
	'template_engine' 	=> 'smarty',
	
	/*��վurl��ʽ
	* 1:	www.domain.com/index.php?sys=sys&mod=mod&con=con&act=act&k=v&arr=a|b|c
	* 2:	www.domain.com/index.php?r=sys/mod/con/act&k=v&arr=a|b|c
	* 3:	www.domain.com/index.php?r=sys-mod-con-act-k-v-arr-a|b|c
	*/
	'url_format' 		=> '1',

	/**
	**���ݿ�����,���ʱ�ɴ��м�
	**/
	'db'=> require (__DIR__ . DIRECTORY_SEPARATOR.'config_db.php'),
);

?>