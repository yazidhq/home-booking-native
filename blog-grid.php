<?php require 'Config/koneksi.php' ?>

<?php
session_start();

?>

<?php include 'header.php'; ?>

<!-- ======= Intro Single ======= -->
<section class="intro-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8">
        <div class="title-single-box">
          <h1 class="title-single">Fasilitas yang ditawarkan</h1>
          <span class="color-text-a">Fasilitas</span>
        </div>
      </div>
      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Fasilitas
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section><!-- End Intro Single-->

<!-- =======  FASILITAS ======= -->
<section class="news-grid grid">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="assets/img/Rumah Baru.png" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="#" class="category-b">Rumah Terbaru</a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="blog-single.php">Rumah Tahap II
                    <br> commingsoon</a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="assets/img/Rumah Sakit.png" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="blog-single.php" class="category-b">Fasilitas Kesehatan</a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="blog-single.php"> Dekat dengan Rumah Sakit
                    <br></a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="assets/img/Universitas.png" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="#" class="category-b">Fasilitas Pendidikan</a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="blog-single.php">Dekat Dengan Fasilitas pendidikan
                    <br></a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="assets/img/Masjid.png" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="#" class="category-b">Tempat Ibadah</a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="blog-single.php">Dekat dengan Tempat Ibadah
                    <br></a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="assets/img/Transpotasi.png" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="#" class="category-b">Fasilitas Transportasi
                </a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="blog-single.php">Dekat dengan Fasilitas Transportasi
                    <br></a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box-b card-shadow news-box">
          <div class="img-box-b">
            <img src="assets/img/Taman.png" alt="" class="img-b img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-header-b">
              <div class="card-category-b">
                <a href="#" class="category-b">Taman Bermain</a>
              </div>
              <div class="card-title-b">
                <h2 class="title-2">
                  <a href="blog-single.php">Memiliki Taman Bermain Sendiri
                    <br></a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section><!-- Fasilitas -->

<?php include 'footer.php'; ?>