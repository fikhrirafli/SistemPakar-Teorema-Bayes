<?php
require_once 'koneksi.php';
session_start();

if(!$_SESSION['login']){
    header('location: ../index.php');
    exit;
}

$id_laporan = $_GET['id_laporan'];
$data_laporan = mysqli_query($link, "SELECT * FROM laporan_diagnosa WHERE id_laporan = '$id_laporan'");
$showdata = mysqli_fetch_array($data_laporan);

?>