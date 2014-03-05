<?php 
/**
 * วฐฬจสืาณ
 * @author haibin <bingbin1321@163.com>
 * @version $Id: index.php 6 2014-03-05 16:51:42Z haibin $
 */
require(__DIR__.'/framework/vii.php');
$config=require dirname(__FILE__).'/data/config_main.php';
Vii::createWebApplication($config)->run(); 
?>