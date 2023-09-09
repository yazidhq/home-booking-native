<?php require 'Config/koneksi.php' ?>

<?php
session_start();

?>

<?php include 'header.php'; ?>

<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Properti Rumah Kami</h1>
            <span class="color-text-a">Property</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Property
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= Property Grid ======= -->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">

        <?php
        $sql = "SELECT * FROM rumah ORDER BY id_rumah DESC";
        $hasil = $koneksi->query($sql);
        ?>
        <?php foreach ($hasil as $row) : ?>
          <div class="col-md-4">
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
          </div>
        <?php endforeach; ?>

      </div>
  </section><!-- End Property Grid Single-->

</main><!-- End #main -->

<?php include 'footer.php'; ?>