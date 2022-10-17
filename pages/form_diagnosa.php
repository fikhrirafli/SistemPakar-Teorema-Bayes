<?php
require_once 'koneksi.php';
session_start();
error_reporting(E_ERROR | E_PARSE);

if(!$_SESSION['login']){
    header('location: ../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet"><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Work+Sans:wght@500;700&display=swap" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <title></title>
</head>


<header class="mb-4  -bottom mt-1" >
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid ms-5 me-5">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2  mb-lg-0 lato ">
              <li class="nav-item me-5">
                <a class="nav-link f-text menu" aria-current="page" href="homepage.php">HALO ADMIN</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link f-text menu" href="data_penyakit.php">DATA PENYAKIT</a>
              </li>
              <li class="nav-item me-5" >
                <a class="nav-link f-text menu" href="data_gejala.php">DATA GEJALA</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link s-text menu" href="form_diagnosa.php">DIAGNOSA</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link f-text menu" href="data_laporan.php">LAPORAN</a>
              </li>
            </ul>
            <div class="d-flex" role="search">
              <ul class="navbar-nav ">
                <li class="nav-item lato">
                  <a class="nav-link f-text menu" aria-current="page" href="logout.php">LOGOUT</a>
                </li>
            </div>
          </div>
        </div>
      </nav>
</header>
<body class=" t-color">
  <div class="container-fluid">
    <div class="d-flex flex-column" style="height: 100vh;">
      <div class="d-flex justify-content-center p-1 ms-5 me-5">
        <div class="lato f-text w-color p-3" style="width: 50%;">
            <div class="mb-2" style="font-size: 1.2rem;">
                <b>BIODATA SISWA</b>
            </div>
            
            <form class="s-text" action="" method="POST">
				        <div class="row mb-3">
                  <label for="tanggal_diagnosa" class="col-sm-3 col-form-label">Tanggal Diagnosa</label>
                  <div class="col-sm-4 pt-1">
                    <input type="date" class="form-control form-control-sm" id="tanggal_diagnosa"  name= "tgl_diagnosa" value="<?php echo date("Y-m-d");?>" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="nama" class="col-sm-3 col-form-label" >Nama</label>
                  <div class="col-sm-8 pt-1">
                    <input type="text" class="form-control form-control-sm" id="nama" name="nama">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="date" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-4 pt-1">
                    <input type="date" class="form-control form-control-sm" id="date" name="lahir">
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-3 pt-0">Jenis Kelamin</legend>
                  <div class="col-sm-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="l" value="Laki - Laki" >
                      <label class="form-check-label" for="l">
                        Laki - Laki
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="p" value="Perempuan">
                      <label class="form-check-label" for="p">
                        Perempuan
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="row mb-3">
                    <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-2 pt-1">
                      <input type="text" class="form-control form-control-sm" id="kelas" name="kelas">
                    </div>
                </div>
                <div class="mt-1 f-text" style="font-size: 1.2rem;">
                    <b>GEJALA YANG DIALAMI</b>
                </div>
<?php
    $gejala = mysqli_query($link,'SELECT * FROM gejala');
    while ($row = mysqli_fetch_array($gejala)){  
        echo "
			 <div class='row mb-3'>
                    <label for='' class='col-sm-8 col-form-label'>$row[0].   $row[2]</label>
                    <div class='form-check form-switch col-sm-3 ms-3 pt-2'>
                        <input class='form-check-input' type='checkbox' role='switch' id='$row[1]' name='$row[1]' value='$row[3]'>
                        <label class='form-check-label' for='$row[1]'>Iya</label>
                    </div>
                </div>
        ";
        
    }
?>
               
                    <input type="submit" value="Diagnosa" name="diagnosa" class="btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text">
              </form>  
        </div>   
      </div>

      <!-- hasilDiagnosa -->
      <div class="d-flex justify-content-center p-1 ms-5 me-5 mt-3">
        <div class="lato f-text w-color p-3" style="width: 50%;">
          <div class="mb-2" style="font-size: 1.2rem;">
            <b>HASIL DIAGNOSA</b>
          </div>
<?php
 include 'proses_diagnosa.php';
?>
           <a href="data_laporan.php">
             <button class="btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text">Lihat Laporan</button>
           </a>
           <a href="">
              <button class='btn btn-outline-success btn-sm worksans ' type='button'>Kembali</button>
           </a>
        </div>
      </div>




      <div class="mt-auto p-1 ms-5 me-5 pt-5">
        <div class="s-color w-text text-center">
          &copy; Sistem Pakar 2022
        </div>
  
      </div>
    
    
    
    </div>


  </div>
</body>
</html>


<style>
  .rotate{
    -ms-transform: rotate(340deg); /* IE 9 */
    transform: rotate(340deg);
  }

  /* div{
    border-style: solid;
    border-width: 1px;
    border-color: rgb(1, 130, 216);
  } */
</style>