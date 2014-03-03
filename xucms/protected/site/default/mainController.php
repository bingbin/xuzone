<?php 
/**
 * Ê×Ò³ÄÚÈİ
 * @author haibin <bingbin1321@163.com>
 * @version $Id: mainController.php 4 2014-03-02 15:38:28Z haibin $
 */

 
 class mainController extends Controller{
 
 public function index(){
	
	$this->assign('cid', 32);
	$this->assign('ids', array(3,3,5,6));
	$this->display('default/main');
 }
 
 }