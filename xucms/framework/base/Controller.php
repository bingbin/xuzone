<?php
/**
 * base controller
 * @author haibin <bingbin1321@163.com>
 * @version $Id: Controller.php 4 2014-03-02 15:38:28Z haibin $
 */
class Controller{

	 public $smarty;
	 public $assets;
	 public $skin;
	 public $tpl;
	 public $js;
	 
	 public function __construct(){
	 
		$this->init();
	 }
	 
	 public function init(){
		include_once 'includes/smarty/Smarty.class.php';
		include_once 'includes/Label.php';
		include_once 'includes/Url.php';
		$smarty = new Smarty();
		$smarty->template_dir = 'template/';
		$smarty->compile_dir  = 'data/templates_c/';
		$smarty->config_dir   = '/data/configs/';
		$smarty->cache_dir    = '/data/cache/';
		
		//注册标签方法
		$smarty->registerPlugin('function','label',array('Label','show'));
		
		$smarty->registerPlugin('function','url',array('Url','createUrl'));
		
		$this->smarty = &$smarty;
		
		$this->assign('smarty', $this->smarty);
		
		$this->initTheme();
		$this->initStatics();
	 }
	 
	  /**
	 *初始化风格
	 */
	 private function initTheme (){
		
		$this->tpl = $tpl;
		$this->skin = $skin;
		$this->smarty->assign('tpl', $this->tpl);
		$this->smarty->assign('skin', $this->skin);
	 }
	 
	 /**
	 *初始化资源
	 */
	 private function initStatics (){
		
		$this->js = $js;
		$this->assets = $assets;
		$this->smarty->assign('js', $this->js);
		$this->smarty->assign('assets', $this->assets );
	 }
	 
	 public function assign($varname, $var){
		$this->smarty->assign($varname, $var);
	 }
	 
	 public function display($path){
	 
		$path = $this->formatPath($path);
		$this->smarty->display($path, $var);
	 }
	 
	 public function render($path){
	 
	 }
	 
	 private function formatPath($path){
		return $smarty->template_dir.$path.'.html';
	 }
}

