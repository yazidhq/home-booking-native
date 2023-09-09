<?php require 'config/koneksi.php';

session_start();

if (empty($_SESSION['username'])) {
  echo "";
} elseif (!empty($_SESSION['status'] == "admin")) {
  header("location: ../Admin/index.php");
} elseif (!empty($_SESSION['status'] == "user")) {
  header("location: ../index.php");
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- My Style -->

  <link rel="stylesheet" href="assets2/css/style.css">

  <!-- Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

  <title>Login Page</title>
</head>

<body>
  <section class="register d-flex">
    <div class="register-left w-50 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-6">
          <div class="header">
            <h1>Welcome back</h1>
            <p>Welcome back! Please enter your details.</p>
          </div>

          <form action="config/cek_login.php" method="post">
            <div class="login-form">
              <label for="username" class="form-label">username</label>
              <input type="text" class="form-control" id="username" placeholder="Enter your username" name="username">

              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password"><br>

              <!-- <button class="signin" type="submit" name="submit">Sign In</button> -->
              <button type="submit" name="submit" class="signin">Sign In</button>
              <div class="text-center">
                <span class="d-inline">Don’t have an account? <a href="halamanRegister.php" class="d-inline text-decoration-none">Sign up for free</a></span>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
    <div class="login-right w-50 h-100">
      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets2/Img/Slide Rumah 1.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Rumah Mewah</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets2/Img/Slide Rumah 2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Rumah Aman dan Nyaman</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets2/Img/Slide Rumah 3.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Rumah Impan Anda</h5>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>