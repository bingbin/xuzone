<?php
/**
 * label 
 * @author haibin <bingbin1321@163.com>
 * @version $Id: Label.php 4 2014-03-02 15:38:28Z haibin $
 */
class Label{

	public function show($params, $smarty){
		print_r($params);
		return $params['name'];
	}
	public function createLabel($params, $smarty){
		print_r($params);
		return $params['name'];
	}
}
?>