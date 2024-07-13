<?php
$dns = 'mysql:host=localhost;dbname=for_my_love';
$user = "root";
$pass = "";
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => ("SET NAMES utf8"),
);
try{

$connect = new PDO($dns,$user,$pass,$option);
$connect->setAttribute(pdo::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "failed to connect to database".$e->getMessage();
}




