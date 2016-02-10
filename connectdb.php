<?php

$db_host = 'localhost';
$db_port = '3306';
$db_user = 'root';
$db_pass = '';
$db_name = 'websiteforum';

$connect = mysql_connect($db_host, $db_user, $db_pass) 
					or die(mysql_error);
			mysql_select_db($db_name);
			
?>
