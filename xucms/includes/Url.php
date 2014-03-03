<?php
/**
 * url
 * @author haibin <bingbin1321@163.com>
 * @version $Id: Url.php 4 2014-03-02 15:38:28Z haibin $
 */
class Url{

	public function createUrl($params, $smarty){
		print_r($params);
		return $params['name'];
	}
}
?>