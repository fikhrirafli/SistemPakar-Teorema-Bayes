<?php
require_once 'koneksi.php';
session_start();

if(!$_SESSION['login']){
    header('location: ../index.php');
    exit;
}

$kode   = $_GET['kodegejala'];
$data   = mysqli_query($link,"SELECT * FROM gejala WHERE kodegejala = '$kode'");
$datagejala   = mysqli_fetch_array($data);
$query = mysqli_query($link, "SELECT * FROM penyakit"); 
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

<?php
include 'icon.php';
?>

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
                <a class="nav-link s-text menu" href="data_gejala.php">DATA GEJALA</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link f-text menu" href="form_diagnosa.php">DIAGNOSA</a>
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
                <b>INPUT DATA GEJALA</b>
            </div>
            
            <form class="s-text" action="proses.php" method="POST">
            <input type="hidden" name="no" id="" value="<?php echo $datagejala[0]; ?>">
                <div class="row mb-3">
                  <label for="kodegejala" class="col-sm-3 col-form-label">Kode Gejala</label>
                  <div class="col-sm-3 pt-1">
                    <input type="text" class="form-control form-control-sm" name="kodegejala" id="kodegejala" value="<?php echo $datagejala[1]; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="namagejala" class="col-sm-3 col-form-label">Nama Gejala</label>
                  <div class="col-sm-6 pt-1">
                    <input type="text" class="form-control form-control-sm" name="namagejala" id="namagejala" value="<?php echo $datagejala[2]; ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="nilai" class="col-sm-3 col-form-label">Nilai Gejala</label>
                    <div class="col-sm-2 pt-1">
                      <input type="text" class="form-control form-control-sm" id="nilai" name="nilai" value="<?php echo $datagejala[3]; ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penyakit" class="col-sm-3 col-form-label">Penyakit</label>
                    <div class="col-sm-3 pt-1">
                        <select class="form-select form-select-sm" aria-label="Default select example" name="kodepenyakit">
							<option selected>--Penyakit--</option>
                            <?php while ($datapenyakit = mysqli_fetch_array($query)){						
							echo "
							<option value=$datapenyakit[1]>$datapenyakit[1]</option>";
							} ?>
                          </select>
                    </div>
                </div>
                    <input type="submit" name="editgejala" id="" value="Ubah Gejala" class="btn btn-success btn-sm worksans gradient shadow-lg shadowtext w-text">
              </form>

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
