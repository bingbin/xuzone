<?php
/**
 * application class file.
 *
 * @author haibin <bingbin1321@163.com>
 * @version $Id: Application.php 4 2014-03-02 15:38:28Z haibin $
 */

class Application{

	public function run(){
		
		$request = new Request();
		
		$router = $request->getRequest();
		
		$path = 'protected/'.$router['sys'].'/'.$router['mod'].'/';
		
		$className = $router['con'].'Controller';
		
		$file =  $className.'.php';
		$math = ucfirst($router['act']);
		
		include_once $path.$file;
		$app = new $className;
		
		$app->$math();
	}
}
