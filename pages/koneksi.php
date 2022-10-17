<?php

$host   = 'localhost';
$user   = 'root';
$pass   =  '';
$db     = 'pakar';
$link   = mysqli_connect($host,$user,$pass,$db);

if(!$link){
    die('ada error' . mysqli_connect_error());
}

?>