<?php
$host = 'localhost';
$user = 'wittawat';
$password = '123456789';
$database = 'admin';

mysql_connect($host, $user, $password);
mysql_select_db($database);
mysql_query("SET NAMES UTF8");