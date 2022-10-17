<?php
session_start();
require_once 'koneksi.php';
error_reporting(E_ERROR | E_PARSE);

if ($_SESSION['login'] == true) {
  header('location: homepage.php');
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
  <link href="../style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Work+Sans:wght@500;700&display=swap" rel="stylesheet">
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <title></title>
</head>

<body class=" t-color">
  <div class="container-fluid" >
    <div class="d-flex flex-row justify-content-center align-items-center lato s-text" style="height: 100vh ;">
      <div class="p-2">
       <img src="../login-img.png" class="img" style="width:20em ;">
      </div>
      <div class="p-2" style="width: 20%;">
      <form action="proses.php" method="POST">
        <div class="mb-3 text-center f-text">
          <h3>Login Admin :)</h3>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="mt-3 text-center">
          <input class="btn btn-success rounded-pill worksans gradient shadow-lg shadowtext w-text" type="submit" value="Sign In" name="login" style="width: 100%;">
        </div>
        </form>
      </div>
    </div>





  </div>
</body>

</html>

<!-- 
<style>
  div {
    border-style: solid;
    border-width: 1px;
    border-color: rgb(1, 130, 216);
  }
</style> -->