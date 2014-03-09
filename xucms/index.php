<?php 
/**
 * วฐฬจสืาณ
 * @author haibin <bingbin1321@163.com>
 * @version $Id: index.php 7 2014-03-09 15:52:48Z haibin $
 */
require(__DIR__.'/framework/Kit.php');
$config=require dirname(__FILE__).'/data/config_main.php';
Kit::createWebApplication($config)->run(); 
?>