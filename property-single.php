<?php require 'Config/koneksi.php' ?>

<?php
session_start();

?>

<?php include 'header.php'; ?>

<?php
$id = $_GET['id'];
if (is_numeric($id)) {
  $sql = "SELECT * FROM rumah WHERE id_rumah = ?";
  $stmt = $koneksi->prepare($sql);
  $stmt->bind_param("i", $id);
  if ($stmt->execute()) {
    $hasil = $stmt->get_result()->fetch_assoc();
  } else {
    echo '<script>alert("Terjadi kesalahan dalam mengambil data.");</script>';
  }
  $stmt->close();
} else {
  echo '<script>alert("Tidak valid.");</script>';
}
?>

<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Type Terbaru dari GoHome</h1>
            <span class="color-text-a"><?= $hasil['alamat_rumah']; ?></span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Rumah
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= Property Single ======= -->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <!-- Property Image Carousel -->
          <div id="property-single-carousel" class="swiper">
            <div class="swiper-wrapper">
              <div class="carousel-item-b">
                <img src="assets/gambar_rumah/<?= $hasil['gambar_rumah']; ?>" alt="">
              </div>
            </div>
          </div>
          <div class="property-single-carousel-pagination carousel-pagination"></div>
        </div>
      </div><br>
      <hr>

      <div class="row">
        <div class="col-sm-12">

          <div class="row justify-content-between">
            <div class="col-md-8 col-lg-8">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="bi bi-cash"> Rp. </span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c"><?= number_format($hasil['harga_rumah']) ?></h5>
                  </div>
                </div>
              </div>

              <!-- Booking Button -->
              <div class="d-grid gap-2">
                <a href="form_booking.php?id=<?= $hasil['id_rumah']; ?>" class="btn btn-primary btn-booking" <?= $hasil['status_rumah'] == 'tidak tersedia' ? 'style="pointer-events: none"' :  '' ?>><?= $hasil['status_rumah'] == 'tersedia' ? 'Booking' :  'Rumah Tidak Tersedia' ?></a>
              </div>

              <!-- Property Single -->
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Detail Property Rumah</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Lokasi:</strong>
                      <span><?= $hasil['alamat_rumah'] ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Type Property:</strong>
                      <span>Rumah</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Status:</strong>
                      <span><?= ucfirst($hasil['status_rumah']) ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Luas:</strong>
                      <span><?= $hasil['luas_rumah'] ?>m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Kamar Tidur:</strong>
                      <span><?= $hasil['kamartidur_rumah'] ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Kamar Mandi:</strong>
                      <span><?= $hasil['kamarmandi_rumah'] ?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Garasi:</strong>
                      <span><?= $hasil['garasi_rumah'] ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-4 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Deskripsi Rumah</h3>
                  </div>
                </div>
              </div>
              <div class="property-description" style="margin-top:-5%">
                <p class="description color-text-a" style="text-align: justify;"><?= $hasil['deskripsi_rumah'] ?></p>
              </div>
              <div class="row section">
                <div class="col-sm-12 mt-3">
                  <div class="title-box-d">
                    <h3 class="title-d">Fasilitas</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a" style="margin-top:-5%">
                <p><?= $hasil['fasilitas_rumah'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-video-tab" data-bs-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-plans-tab" data-bs-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false">Denah Rumah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-map-tab" data-bs-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Maps</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
          <iframe src="https://www.youtube.com/embed/OSdBwoba7Gs" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
          <img src="assets/img/Desai 1.jpeg" alt="" class="img-fluid">
        </div>
        <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.347255106045!2d107.11708575434613!3d-6.82232240100211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6852f4f71b004b%3A0x401e8f1fc28dad0!2sCianjur%2C%20Cianjur%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1565719225325!5m2!1sen!2sid" width="100%" height="460" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
      </div>
    </div>

  </section>

</main><!-- End #main -->

<?php include 'footer.php'; ?>