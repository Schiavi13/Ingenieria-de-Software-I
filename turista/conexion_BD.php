<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","") 
			or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test2",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$databaseHost = 'localhost';
$databaseName = 'paquetes_turisticos';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die ("No se ha podido conectar al servidor de Base de datos"); 


?>