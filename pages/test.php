<?php
require_once 'koneksi.php';

?>
<h2>
    <a href="homepage.php">Home</a>
</h2>

<div class="d">
<form action="" method="POST">
    <li>
        Tanggal Diagnosa
        <input type="date" name="tgl_diagnosa" id=""  value="<?php echo date("Y-m-d");?>" readonly>
    </li>
    <hr>
    <li>
        Nama
        <input type="text" name="nama" id="">
    </li>
    <li>
        Tanggal Lahir
        <input type="date" name="lahir" id="">
    </li>
    <li>
        Jenis Kelamin
        <input type="radio" name="gender" id="" value="Laki - Laki"> Laki Laki
        <input type="radio" name="gender" id="" value="Perempuan"> Perempuan
        
    </li>
    <li>
        Kelas
        <input type="text" name="kelas" id="">
    </li>
 
    <hr>
    <input type="submit" name="gogo" id="">
</form>
</div>




<div>
<?php 

    if (isset($_POST['gogo'])) { 
        echo 'ok';
        $nama   = $_POST['nama'];
        $lahir   = $_POST['lahir'];
        $gender   = $_POST['gender'];
        $kelas   = $_POST['kelas'];
        $date   = $_POST['tgl_diagnosa'];
        $namapenyakit = 'hahaha';

        echo $nama . $lahir . $gender . $kelas . $date . $namapenyakit . '<br>';
        $input = mysqli_query($link, "INSERT INTO `laporan_diagnosa` 
            (`id_laporan`, `nama`, `tgl_lahir`, `jk`, `kelas`, `penyakit`, `tgl_diagnosa`) VALUES 
            (NULL, '$nama', '$lahir', '$gender', '$kelas', '$namapenyakit', '$date')");
   
        // if($input){
        // echo "
        //     <script>
        //     alert('Berhasil Diagnosa');
        //     </script>
        // ";
        // }
    }
?>

</div>


