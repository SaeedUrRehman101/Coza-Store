<?php
session_start();
$db_name="mysql:host=localhost;dbname=saeed";
$username='root';
$password='';
$run=new PDO($db_name,$username,$password);
?>