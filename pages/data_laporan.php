<?php
require_once 'koneksi.php';
session_start();

if(!$_SESSION['login']){
    header('location: ../index.php');
    exit;
}
?>


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
                <a class="nav-link f-text menu" href="data_gejala.php">DATA GEJALA</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link f-text menu" href="form_diagnosa.php">DIAGNOSA</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link s-text menu" href="data_laporan.php">LAPORAN</a>
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
      <!-- Layout 1 -->
      <div class="d-flex justify-content-between p-1 ms-5 me-5"> 
        <div class="pe-2 mb-3 worksans f-text" style="font-size: 2rem;">
          <div class="d-flex flex-row">
            <div class="mb-1">
              <svg class="bi pe-none me-2" width="40" height="40" fill="currentColor"><use xlink:href="#report"/></svg>
            </div>
            <div class="">
              <b>DATA LAPORAN DIAGNOSA</b>
            </div>
          </div>
        </div>
      </div>
      <!-- endLayout 1 -->
 <!-- table-->
<div class="d-flex justify-content-between p-1 ms-5 me-5"> 
  <table class="table table-hover text-center table-borderless">
    <thead class="s-color w-text">
      <tr>
        <th scope="col">No</th>
        <th scope="col">ID</th>
        <th scope="col">Tanggal Diagnosa</th>
        <th scope="col">Nama Siswa</th>
        <th scope="col">Tanggal Lahir Siswa</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Kelas</th>
        <th scope="col">Diagnosa</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
<?php
$query = mysqli_query($link, "SELECT * FROM laporan_diagnosa"); 
$i=1;
while ($datadiagnosa = mysqli_fetch_array($query)){
echo "
<tr>
  <td>$i</td>
  <td>L - 0$datadiagnosa[0]</td>
  <td>$datadiagnosa[1]</td>
  <td>$datadiagnosa[2]</td>
  <td>$datadiagnosa[3]</td>
  <td>$datadiagnosa[4]</td>
  <td>$datadiagnosa[5]</td>
  <td>$datadiagnosa[6]</td>
  <td>
      <a href='proses_delete.php?id_laporan=$datadiagnosa[0]'>
        
        <button class='btn btn-outline-danger btn-sm worksans ' type='button'>
        <svg class='bi pe-none me-2' width='20' height='20' fill='currentColor'><use xlink:href='#delete'/></svg>
        Hapus</button>
      <a/>
      <a href='../phppdf/index.php?id_laporan=$datadiagnosa[0]' target='_blank'>
        <button class='btn btn-primary btn-sm worksans shadow-lg shadowtext w-text' type='button'>
        <svg class='bi pe-none me-2' width='20' height='20' fill='currentColor'><use xlink:href='#print'/></svg>
        View</button>
      <a/>
  </td>
  
</tr>
";
$i++;
}
?>
    </tbody>
  </table>
</div>
<!-- endTable-->
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