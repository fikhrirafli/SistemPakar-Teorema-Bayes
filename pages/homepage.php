<?php
session_start();
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
                <a class="nav-link s-text menu" aria-current="page" href="homepage.php">HALO ADMIN</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link f-text menu" href="data_penyakit.php">DATA PENYAKIT</a>
              </li>
              <li class="nav-item me-5" >
                <a class="nav-link f-text menu" href="data_gejala.php">DATA GEJALA</a>
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
    <div class="d-flex">
      <!-- Layout 1 -->
      <div class="p-1   ms-5"> 
        <div class="pe-2 mb-3   worksans f-text" style="font-size: 3.5rem;">
          <b>Bullying</b>
        </div>
        <div class="pe-2 mb-3   worksans s-text" >
          adalah suatu bentuk perilaku kekerasan untuk menyakiti atau <br> mengintimidasi seseorang yang lemah. 
          <i> Bullying</i> di lingkungan <br>sekolah umum terjadi, Komisi Perlindungan Anak, KPAI <br> mencatat 369 laporan tentang kasus <i>Bullying</i>.<br><br>
          Mengidentifikasi pelajar yang mendapatkan perlakuan <i>Bullying</i> <br> dengan menilai tingkah laku serta sikapnya. 
          Dengan sebuah <br>Sistem Pakar akan mempermudah dalam mendiagnosa <br> penyakit Bullying dengan menghitung gejala yang dialami <br>
          melalui metode <i>Teorema Bayes</i>.
        </div>
        <div class="pe-2 mb-3   ">
          <a href="form_diagnosa.php">
            <button class="btn btn-success btn-lg worksans gradient shadow-lg shadowtext w-text"><b>Mulai Diagnosa</b></button>
          </a>
        </div>
      </div>
      <!-- Layout 1 -->

      <div class=" " style="width: 140px;">
      <!-- Space -->
      </div>

      <!-- image Layoutpe-2   -->
      <div class="text-center rotate">
        <img src="../Background.png" class="img" style="width:30em ;">
      </div>
      <!-- image Layoutpe-2   -->
    </div>
  </div>

</body>
</html>


<style>
  .rotate{
    -ms-transform: rotate(340deg); /* IE 9 */
    transform: rotate(340deg);
  }
</style>