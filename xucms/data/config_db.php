<?php

return array(
	'class'                   => 'system.extensions.db.DbConnection',
	'connectionString'        => 'mysql:host=localhost;port=3306;dbname=dbname',
    'schemaCachingDuration'   => 3600,
	'emulatePrepare'          => true,
	'username'                => 'root',
	'password'                => '123456',
	'charset'                 => 'utf8',
    'tablePrefix'			  => 'pre_'
);

?>