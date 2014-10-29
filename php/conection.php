<?php 
// datos para la coneccion a mysql 
define('DB_SERVER','localhost'); 
define('DB_NAME','sistemamonetario'); 
define('DB_USER','root'); 
//define('DB_PASS','123qwe'); 
//define('DB_PASS','toor'); 
define('DB_PASS','toor'); 
$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS); 
mysql_select_db(DB_NAME,$con); 

mysql_query("SET NAMES 'utf8'");
?>