<?php
/*
* Smarty plugin
* -------------------------------------------------------------
* File: compiler.tplheader.php
* Type: compiler
* Name: tplheader
* Purpose: Output header containing the source file name and
* the time it was compiled.
* -------------------------------------------------------------
*/
function smarty_compiler_data($tag_arg, $smarty)
{
$name = array_shift($tag_arg);
$params = $tag_arg;
return "<?php \necho Label::createLabel(array('name'=>".$name.",'params'=>".var_export($params,true)."),\$_smarty_tpl);?>";
}
?>

