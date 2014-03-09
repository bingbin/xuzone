<?php
/**
 * application class file.
 *
 * @author haibin <bingbin1321@163.com>
 * @version $Id: Application.php 4 2014-03-02 15:38:28Z haibin $
 */
namespace kit\web;

class Application{

	public $request;
	
	public function __construct($config = array()){
		
		$this->configure($config);
	}
	
	public function run(){

		$route = $this->getUrlManager()->parseUrl($this->getRequest());
		
		$path = 'protected/'.$route['sys'].'/'.$route['mod'].'/';
		
		$className = $router['con'].'Controller';
		
		$file =  $className.'.php';
		$math = ucfirst($router['act']);
		
		include_once $path.$file;
		$app = new $className;
		
		$app->$math();
	}
	
	public function getRequest(){
		if(!$this->request)
			$this->request = new ibo\web\Request();
		return 	$this->request;
	}
	
	public function configure($config){
		if(is_array($config)){
			foreach($config as $key=>$value)
				$this->$key=$value;
		}
	}
}
