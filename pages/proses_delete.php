<?php
require_once 'koneksi.php';
session_start();

if(!$_SESSION['login']){
    header('location: ../index.php');
    exit;
}

if(isset($_GET['kodepenyakit'])){
    $kode   = $_GET['kodepenyakit'];
    $hapus      = mysqli_query($link,"DELETE FROM penyakit WHERE kodepenyakit = '$kode'");
    if($hapus){
        echo "
            <script>
                alert('berhasil hapus');
                window.location.href = 'data_penyakit.php';
            </script>
        
        ";
    }
}

if(isset($_GET['kodegejala'])){
    $kode   = $_GET['kodegejala'];
    $hapus      = mysqli_query($link,"DELETE FROM gejala WHERE kodegejala = '$kode'");
    if($hapus){
        echo "
            <script>
                alert('berhasil hapus');
                window.location.href = 'data_gejala.php';
            </script>
        
        ";
    }
}

if(isset($_GET['id_laporan'])){
    $kode   = $_GET['id_laporan'];
    $hapus      = mysqli_query($link,"DELETE FROM laporan_diagnosa WHERE id_laporan = '$kode'");
    if($hapus){
        echo "
            <script>
                alert('berhasil hapus');
                window.location.href = 'data_laporan.php';
            </script>
        
        ";
    }
}



?>

