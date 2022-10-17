<?php
session_start();
require_once 'koneksi.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($link,"SELECT * FROM tabel_admin WHERE username = '$username'");
    
    if(mysqli_num_rows($query) === 1){
        // echo 'ok';
        $admin = mysqli_fetch_assoc($query);
        // echo $admin['password'];
        if($password == $admin['password']){
            $_SESSION['login'] = true;
            $_SESSION['nama']  = $admin['nama'];
            header("location: homepage.php");
            exit;
        }
        else{
            echo
            "<script>
                alert('Usernam atau Password Salah');
                window.location.href = 'login.php';
             </script>" ;    
        }
    }
}


if(isset($_POST['inputpenyakit'])){
    $kode   = $_POST['kodepenyakit'];
    $nama   = $_POST['namapenyakit'];
    $solusi   = $_POST['pengobatan'];
    
    $input = mysqli_query($link, "INSERT INTO `penyakit` (`no`, `kodepenyakit`, `namapenyakit`, `pengobatan`) VALUES 
                                 (NULL, '$kode', '$nama', '$solusi')");
    if($input){
        echo "
        <script>
            alert('Berhasil Tambah Data');
            window.location.href = 'data_penyakit.php';
        </script>
        ";
        
    }

}

if(isset($_POST['editpenyakit'])){
    $nomor  = $_POST['no'];
    $kode   = $_POST['kodepenyakit'];
    $nama   = $_POST['namapenyakit'];
    $solusi   = $_POST['pengobatan'];
    
    $update = mysqli_query($link, "UPDATE `penyakit` SET 
                            `kodepenyakit` = '$kode', 
                            `namapenyakit` = '$nama', 
                            `pengobatan` = '$solusi' WHERE `penyakit`.`no` = $nomor");
    if($update){
        echo "
        <script>
            alert('Berhasil Ubah Data');
            window.location.href = 'data_penyakit.php';
        </script>
        ";
    }

}

if(isset($_POST['inputgejala'])){
    $kode   = $_POST['kodegejala'];
    $nama   = $_POST['namagejala'];
    $nilai   = $_POST['nilai'];
    $kodepenyakit   = $_POST['kodepenyakit'];
    
    $input = mysqli_query($link, "INSERT INTO `gejala` (`no`, `kodegejala`, `namagejala`, `nilai`, `kodepenyakit`) VALUES 
                                 (NULL, '$kode', '$nama', '$nilai', '$kodepenyakit')");
    if($input){
        echo "
        <script>
            alert('Berhasil Tambah Data');
            window.location.href = 'data_gejala.php';
        </script>
        ";
        
    }

}

if(isset($_POST['editgejala'])){
    $nomor  = $_POST['no'];
    $kode   = $_POST['kodegejala'];
    $nama   = $_POST['namagejala'];
    $nilai   = $_POST['nilai'];
    $kodepenyakit   = $_POST['kodepenyakit'];
    
    $update = mysqli_query($link, "UPDATE `gejala` SET 
                            `kodegejala` = '$kode', 
                            `namagejala` = '$nama', 
                            `nilai` = '$nilai',
                            `kodepenyakit` = '$kodepenyakit' WHERE `gejala`.`no` = $nomor");
    if($update){
        echo "
        <script>
            alert('Berhasil Ubah Data');
            window.location.href = 'data_gejala.php';
        </script>
        ";
    }

}
?>