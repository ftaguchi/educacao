<?php
 
$hostname_connDB = "mysql.hostinger.com.br";
$database_connDB = "u652146223_cadas";
$username_connDB = "u652146223_dfpms";
$password_connDB = "semed2017";

// orientado objeto
$mysqli = new mysqli($hostname_connDB, $username_connDB, $password_connDB, $database_connDB);

// procedural
//$con = mysqli_connect($hostname_connDB, $username_connDB, $password_connDB, $database_connDB);

if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());


?>