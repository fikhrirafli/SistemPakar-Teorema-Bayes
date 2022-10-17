<?php
function diagnosa($gejala){
    $count  = count($gejala);
    $sum    = array_sum($gejala);
    for ($i = 0; $i < $count; $i++){
        $nph[] = $gejala[$i] / $sum ;
        $nphe []= ($nph[$i]*$gejala[$i]);
        $nphef = array_sum($nphe);
    }
    for ($z = 0; $z < $count; $z++){
        $ph[] = intval((($gejala[$z]*$nphe[$z])/$nphef)*100)/100;
        $hasil[] = $gejala[$z]*$ph[$z];
    }
    $kesimpulan = (array_sum($hasil) *100) ;
    return $kesimpulan;
}

$datapenyakit = mysqli_query($link, "SELECT * FROM penyakit");  //buka data peyakit
$jumlahpenyakit = mysqli_num_rows($datapenyakit);   //hitung data peyakit

if (isset($_POST['diagnosa'])) { 
    $date   = $_POST['tgl_diagnosa'];
    $nama   = $_POST['nama'];
    $lahir   = $_POST['lahir'];
    $gender   = $_POST['gender'];
    $kelas   = $_POST['kelas'];

    for($j=1 ; $j<=$jumlahpenyakit ; $j++){    // buat array sebanyak data penyakit
        $p[$j] = []; 
    }
    $datagejala = mysqli_query($link, "SELECT * FROM gejala");   // buka data gejala
    $i=1;
    while ($tampil = mysqli_fetch_array($datagejala)){   //tampilkan semua data gejala kalau masih ada
        if(isset($_POST["$tampil[1]"])){          //kalau kode gejala G01 - G0.. terisi
            $kg = 'G0'.$i;                        //buat variabel kg => (G01)
            $gejala = mysqli_query($link,"SELECT * FROM gejala where kodegejala ='$kg'" );  //tampilkan data gejala dimana kode gejalanya (G01)
            $cekpenyakit = mysqli_fetch_array($gejala);     //lihat data penyakit pada gejala G01
            for($x=1 ; $x<=$jumlahpenyakit ; $x++) {        //buat perulangan sebanyak jumlah penyakit
                $kp = 'P0'.$x;                    // buat variabel kp => (P01)
                if($cekpenyakit[4] == $kp ){      // kalau data penyakit pada G01 = kodepenyakit pertama
                    $nilai = $_POST["$kg"];       // Ambil nilai pada radio yes 
                    array_push($p[$x], $nilai);   // Masukan ke array penyakkit pertama (1)
                }                                 // Selesai                    

            }
        }
        $i++;
    }
    $hasil=[];  // Buat array hasil
    for($y=1 ; $y<=$jumlahpenyakit ; $y++){   //buat perulangan sebanyak data penyakit
        $penyakit = diagnosa($p[$y]);   //hitung nilai penyakit pertama
        $ceknilai = is_nan($penyakit);  //cek nilai penyakit pertama
        if ($ceknilai == true){         //kalau nilai nya error
            array_push($hasil, 0);      //masukan ke array hasil 0
        }
        else{array_push($hasil, $penyakit);} //
    }

    $kesimpulan = max($hasil); //cari nilai terbesar dari hasil penyakit
    // 
    for($p=0 ; $p<=$jumlahpenyakit ; $p++){
        switch ($kesimpulan){
            case $hasil[$p]:
                $q=$p+1;
                $kode='P0'.$q;
                $showpenyakit = mysqli_query($link, "SELECT * FROM penyakit where kodepenyakit = '$kode'");  //lihat penyakit P01
                $namapenyakit = mysqli_fetch_assoc($showpenyakit); 
                break;
            }
    }
        
        $diagnosa = $namapenyakit['namapenyakit'];
        $input = mysqli_query($link, "INSERT INTO `laporan_diagnosa` 
                                (`id_laporan`, `tgl_diagnosa`, `nama`, `tgl_lahir`, `jk`, `kelas`, `penyakit`, `nilai_bayes`) VALUES 
                                (NULL, '$date', '$nama', '$lahir', '$gender', '$kelas', '$diagnosa', '$kesimpulan')");
        if($input){
        echo "
        <script>
            alert('Berhasil Diagnosa');
        </script>

        <div style='color: #545454;'>
              Siswa dengan identitas dibawah ini :  <p>
              nama : $nama <br> tanggal lahir : $lahir <br> Jenis Kelamin : $gender <br> kelas : $kelas <p>  

              Melalui perhitungan Teorema Bayes terhadap gejala yang dialami <br>
              Siswa tersebut Didiagnosa terkena <font class='s-text'>" .  $namapenyakit['namapenyakit'] . "</font> Sebesar "  . round($kesimpulan,2) ."% <br> 
              Diharapkan orangtua / Wali siswa untuk "  . $namapenyakit['pengobatan'] .
           "</div>
        ";
        
     }
} 

?>
