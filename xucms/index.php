<?php 
/**
 * วฐฬจสืาณ
 * @author haibin <bingbin1321@163.com>
 * @version $Id: index.php 1 2014-01-05 17:21:49Z haibin $
 */
$vii=str_replace('\\', '/', dirname(__FILE__).'/framework/vii.php');
$config=dirname(__FILE__).'/data/config.php';
require_once($vii);
Vii::createWebApplication($config)->run(); 
?>