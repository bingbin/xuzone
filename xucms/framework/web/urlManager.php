<?php
/**
 * url manager class file.
 *
 * @author haibin <bingbin1321@163.com>
 * @version $Id: urlManager.php 4 2014-03-02 15:38:28Z haibin $
 */

class urlManager{

	/**
	*	
	¶¯Ì¬£º
	www.domain.com/index.php?sys=sys&mod=mod&con=con&act=act&k=v&arr=a|b|c

	www.domain.com/index.php?r=sys/mod/con/act&k=v&arr=a|b|c

	www.domain.com/index.php?r=sys-mod-con-act-k-v-arr-a|b|c

	Î±¾²Ì¬
	www.domain.com/sys/mod/con/act/page/10/arr/a|b|c/

	www.domain.com/sys-mod-con-act-page-10-arr-a|b|c

	¾²Ì¬
	www.domain.com/sys/mod/con/act-page.html
	*/
	public $type=1; 
	public function createUrl(string $route, array $params=array()){
		$router = array();
		list($router['sys'],$router['mod'],$router['con'],$router['act']) = explode('/',$route);
		
		$url = '';
		$domain = '';
		if($this->type==1){
			$params = http_build_query(array_merge($router,$params));
			$url = $domain.'?'.$params
		}
		
		return $url;
	}
}