<?php
/**
 * request class file.
 *
 * @author haibin <bingbin1321@163.com>
 * @version $Id: Request.php 7 2014-03-09 15:52:48Z haibin $
 */
namespace kit\web;

class Request{

	public $route;
	
	public function getRoute(){
		
	
	}
	
	public function getReques(){
		
		$default = array(
			'sys' => 'site',
			'mod' => 'default',
			'con' => 'main',
			'act' => 'index'
		);
		
		return $default;
	}
}
