<?php require 'Config/koneksi.php' ?>

<?php
session_start();

?>

<?php include 'header.php'; ?>

<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel swiper position-relative">

  <div class="swiper-wrapper">

    <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/Rumah\ Bg\ 1.jpg)">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                  <p class="intro-title-top">
                    <br>
                  </p>
                  <h1 class="intro-title mb-4 ">
                    <span class="color-b">GoHome hadir</span> Untuk
                    <br> Anda Yang ingin
                  </h1>
                  <p class="intro-subtitle intro-price">
                    <a href="#"><span class="price-a">Investas | Rumah</span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/Rumah\ Bg\ 2.jpg)">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                  <p class="intro-title-top">
                    <br>
                  </p>
                  <h1 class="intro-title mb-4">
                    <span class="color-b">GoHome hadir</span> Untuk
                    <br> Anda Yang Ingin
                  </h1>
                  <p class="intro-subtitle intro-price">
                    <a href="#"><span class="price-a">Beli | Rumah</span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/Rumah\ Bg\ 3.jpg)">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                  <p class="intro-title-top">
                    <br>
                  </p>
                  <h1 class="intro-title mb-4">
                    <span class="color-b">GoHome hadir</span> Untuk
                    <br> Anda Yang Ingin
                  </h1>
                  <p class="intro-subtitle intro-price">
                    <a href="#"><span class="price-a">Sewa | Rumah</span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="swiper-pagination"></div>
</div><!-- End Intro Section -->

<main id="main">

  <!-- Layanan Section -->
  <section id="layanan">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 text-center">
          <h2>Layanan kami</h2>
          <span class="sub-title">GoHome hadir menjadi solusi bagi anda</span>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-4 text-center">
          <div class="card-layanan">
            <div class="circle-icon position-relative mx-auto">
              <img src="assets/img/Property Baru Icon.png" alt="" class="position-absolute top-50 start-50 translate-middle">
            </div>
            <h3 class="mt-4">Property Baru</h3>
            <p class="m-3">Go Home semakin menjadi nyata
              bagi yang ingin membeli rumah
              aman dan nyaman untuk keluarga
              tercinta anda. </p>
          </div>
        </div>

        <div class="col-md-4 text-center">
          <div class="card-layanan">
            <div class="circle-icon position-relative mx-auto">
              <img src="assets/img/Property Baru Icon.png" alt="" class="position-absolute top-50 start-50 translate-middle">
            </div>
            <h3 class="mt-4">Sewa Rumah</h3>
            <p class="m-3"> Go Home hadir bagi yang ingin
              menyewa rumah aman dan nyaman
              bagi keluarga tercinta anda </p>
          </div>
        </div>

        <div class="col-md-4 text-center">
          <div class="card-layanan">
            <div class="circle-icon position-relative mx-auto">
              <img src="assets/img/Property Baru Icon.png" alt="" class="position-absolute top-50 start-50 translate-middle">
            </div>
            <h3 class="mt-4">Beli Rumah</h3>
            <p class="m-3">Beli rumah dengan harga
              murah, aman dan nyaman terjamin
              kualitas rumahnya </p>
          </div>
        </div>
      </div>
  </section><!-- End Services Section -->

  <!-- ======= Properti Terbaru Section ======= -->
  <section class="section-property section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Properti Rumah Terbaru</h2>
            </div>
            <div class="title-link">
              <a href="property-grid.php">Semua Property
                <span class="bi bi-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="property-carousel" class="swiper">
        <div class="swiper-wrapper">

          <?php
          $sql = "SELECT * FROM rumah ORDER BY id_rumah DESC";
          $hasil = $koneksi->query($sql);
          ?>
          <?php foreach ($hasil as $row) : ?>
            <div class="carousel-item-b swiper-slide">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="<?= $url ?>assets/gambar_rumah/<?= $row['gambar_rumah']; ?>" alt="" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <br /><?= ucfirst($row['status_rumah']); ?></a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">Jual | Rp. <?= number_format($row['harga_rumah']); ?></span>
                      </div>
                      <a href="property-single.php?id=<?= $row['id_rumah']; ?>" class="link-a">Klik disini Untuk melihat
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">Luas</h4>
                          <span><?= $row['luas_rumah']; ?>m
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Beds</h4>
                          <span><?= $row['kamartidur_rumah']; ?></span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Baths</h4>
                          <span><?= $row['kamarmandi_rumah']; ?></span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Garasi</h4>
                          <span><?= $row['garasi_rumah']; ?></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->
          <?php endforeach; ?>

        </div>
      </div>
      <div class="propery-carousel-pagination carousel-pagination"></div>

    </div>
  </section><!-- End Latest Properties Section -->

  <!-- ======= Latest News Section ======= -->
  <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Fasilitas</h2>
            </div>
            <div class="title-link">
              <a href="blog-grid.php">Semua Fasilitas
                <span class="bi bi-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="news-carousel" class="swiper">
        <div class="swiper-wrapper">

          <div class="carousel-item-c swiper-slide">
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
          </div><!-- End carousel item -->

          <div class="carousel-item-c swiper-slide">
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
          </div><!-- End carousel item -->

          <div class="carousel-item-c swiper-slide">
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
          </div><!-- End carousel item -->

          <div class="carousel-item-c swiper-slide">
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
        </div><!-- End carousel item -->

      </div>
    </div>

    <div class="news-carousel-pagination carousel-pagination"></div>
    </div>
  </section><!-- End Latest News Section -->

</main><!-- End #main -->

<?php include 'footer.php'; ?>