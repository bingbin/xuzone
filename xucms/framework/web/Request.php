<?php
/**
 * request class file.
 *
 * @author haibin <bingbin1321@163.com>
 * @version $Id: Request.php 4 2014-03-02 15:38:28Z haibin $
 */

class Request{

	public function getRequest(){
		
		$default = array(
			'sys' => 'site',
			'mod' => 'default',
			'con' => 'main',
			'act' => 'index'
		);
		
		return $default;
	}
}
