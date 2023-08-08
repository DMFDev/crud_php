<?php

$host = "localhost";
$db = "db_crud";
$user = "root";
$pass = "";

try{
    $conect = new PDO("mysql:host=$host;dbname=$db",$user, $pass);
    
}catch(Exception $err){
    echo $err->getMessage();
}