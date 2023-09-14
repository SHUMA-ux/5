<?php
session_start();
$db['host'] = "localhost";
$db['user'] = "root";
$db['pass'] = "root";
$db['dbname'] = "bookig";

function connect(){
    $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8',"localhost", "booking");
    $pdo = new PDO($dsn, "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $pdo;
}
?>