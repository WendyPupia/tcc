<?php
//$host = "wendy.app";
//$user = "homestead";
//$password = "secret";
//$datbase = "wendy";
//mysql_connect($host, $user, $password) or die(mysql_error());
//mysql_select_db($datbase);



// Data Base
$config['db_sgbd']  = 'mysql';
$config['db_name']  = 'wendy';
$config['db_host']  = '127.0.0.1';
$config['db_dsn']   = $config['db_sgbd'] . ':dbname=' . $config['db_name'] . ';host=' . $config['db_host'];
$config['db_user']  = 'homestead';
$config['db_pass']  = 'secret';


try {
	$connection = new PDO($config['db_dsn'], $config['db_user'], $config['db_pass']);
	$connection->query("use ". $config['db_name']);
} catch (PDOException $e) {
	echo $e->getMessage();
	die();
}
