<?php
$username="root";
$password="";
$database=new PDO("mysql:host=localhost;dbname=doctor;charset=utf8",$username,$password);


header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json; charset=UTF-8");
header("Access-Control-Allow-Methods:*");
header("Access-Control-max-age:3600");
header("Access-Control-Allow-Headers:*");


?>