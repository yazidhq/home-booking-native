<?php require 'Config/koneksi.php' ?>

<?php
session_start();

?>

<?php include 'header.php'; ?>

<?php
if (isset($_POST['submit'])) {
  $nama_kontak = $_POST['nama_kontak'];
  $email_kontak = $_POST['email_kontak'];
  $pesan_kontak = $_POST['pesan_kontak'];

  $sql = "INSERT INTO kontak (nama_kontak, email_kontak, pesan_kontak) VALUES (?, ?, ?)";
  $stmt = $koneksi->prepare($sql);

  if ($stmt) {
    $stmt->bind_param("sss", $nama_kontak, $email_kontak, $pesan_kontak);

    if ($stmt->execute()) {
      echo '<script>alert("Sukses")</script>';
    } else {
      echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "Terjadi kesalahan pada query.";
  }
}
?>


<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Hubungi</h1>
            <span class="color-text-a">
              Kami senang mendengar dari Anda dan siap membantu dengan pertanyaan atau kebutuhan Anda terkait properti. Jangan ragu untuk menghubungi kami melalui telepon, email, atau mengisi formulir kontak di situs web kami.
              Terima kasih atas minat Anda pada GoHome!</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Contact
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= Contact Single ======= -->
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-map box">
            <div id="map" class="contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.347255106045!2d107.11708575434613!3d-6.82232240100211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6852f4f71b004b%3A0x401e8f1fc28dad0!2sCianjur%2C%20Cianjur%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1565719225325!5m2!1sen!2sid" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>

        <div class="col-sm-12 section-t8">
          <div class="row">
            <div class="col-md-7">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg form-control-a" placeholder="Your Name" name="nama_kontak" required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" name="email_kontak" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" cols="45" rows="8" placeholder="Message" name="pesan_kontak" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-a" name="submit">Kirim Pesan</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="bi bi-envelope"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Pertanyaan</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">Email.
                      <span class="color-a">gohome2023@gmail.com</span>
                    </p>
                    <p class="mb-1">Phone.
                      <span class="color-a">0812-8400-2023</span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="bi bi-geo-alt"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Temukan Di</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">
                      Jalan Raya Bogor, Cianjur, Jawa Barat, Indonesia
                      <br>
                    </p>
                  </div>
                </div>
              </div>
              <div class="icon-box">
                <div class="icon-box-icon">
                  <span class="bi bi-share"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Social networks</h4>
                  </div>
                  <div class="icon-box-content">
                    <div class="socials-footer">
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-facebook" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-twitter" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="https://www.instagram.com/team.kumal/" class="link-one">
                            <i class="bi bi-instagram" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one">
                            <i class="bi bi-linkedin" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Contact Single-->

  <!-- <div class="container col-md-12">
    <div class="row section-t3">
      <div class="col-sm-12">
        <div class="title-box-d">
          <h3 class="title-d">Contact Me</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-6">
        <img src="assets/img/Agent1.png" alt="" class="img-fluid">
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="property-agent">
          <h4 class="title-agent">Septiawan</h4>
          <p class="color-text-a" style="text-align: justify;">
            Pertemuan dengan agen muda bernama Septiawan adalah sebuah kesempatan yang menarik dalam pencarian rumah impian Anda. Septiawan adalah seorang agen properti yang berdedikasi dan berpengalaman dalam membantu calon pembeli seperti Anda menemukan rumah yang sesuai dengan kebutuhan dan harapan Anda.
          </p>
          <ul class="list-unstyled">
            <li class="d-flex justify-content-between">
              <strong>Phone:</strong>
              <span class="color-text-a">0812-8294-8428</span>
            </li>
            <li class="d-flex justify-content-between">
              <strong>Mobile:</strong>
              <span class="color-text-a">0812-3173-1319</span>
            </li>
            <li class="d-flex justify-content-between">
              <strong>Email:</strong>
              <span class="color-text-a">septiawan29@gmail.com</span>
            </li>
            <li class="d-flex justify-content-between">
              <strong>linkedin</strong>
              <span class="color-text-a">septiawan</span>
            </li>
          </ul>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.linkedin.com/in/septiawan-iyan-317aa8231/">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> -->

</main><!-- End #main -->

<?php include 'footer.php'; ?>