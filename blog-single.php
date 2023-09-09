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
            <h1 class="title-single">Book Cover Deisgn</h1>
            <span class="color-text-a">News Single.</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Book Cover Deisgn
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= Blog Single ======= -->
  <section class="news-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="news-img-box">
            <img src="assets/img/blog single 1.png" alt="" class="img-fluid">
          </div>
        </div>
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
          <div class="post-information">
            <ul class="list-inline text-center color-a">
              <li class="list-inline-item mr-2">
                <strong>Author: </strong>
                <span class="color-text-a">Admin GoHome</span>
              </li>
              <li class="list-inline-item mr-2">
                <strong>Kategori</strong>
                <span class="color-text-a">Admin</span>
              </li>
              <li class="list-inline-item">
                <strong>Date: </strong>
                <span class="color-text-a">21 Jul. 2023</span>
              </li>
            </ul>
          </div>
          <div class="post-content color-text-a">
            <p class="post-intro">
              Kami sangat bersemangat untuk mengumumkan bahwa proyek terbaru kami,
              <strong>"Rumah Terbaru Tahap Dua,"</strong> akan segera dibangun! Kami senang dapat memberikan update
              terkini tentang perkembangan proyek kami kepada Anda.
            </p>
            <p>
              Rumah Terbaru Tahap Dua adalah kelanjutan dari kesuksesan proyek sebelumnya. Dengan keahlian dan pengalaman kami dalam industri properti, kami berkomitmen untuk memberikan kualitas terbaik kepada calon pembeli. Proyek ini akan menawarkan pilihan unit perumahan yang lebih luas dan fasilitas modern yang akan memenuhi kebutuhan dan harapan Anda.
            </p>
            <p>
              Kami berdedikasi untuk menciptakan lingkungan yang nyaman, aman, dan ramah lingkungan untuk Anda dan keluarga. Rumah Terbaru Tahap Dua kami dirancang dengan cermat untuk memberikan kenyamanan dan gaya hidup yang unik bagi setiap pemiliknya.
            </p>
            <p>
              Kami juga akan memastikan untuk memberikan informasi terkini tentang proyek ini melalui blog kami, sehingga Anda dapat selalu mengikuti perkembangan terbaru dari Rumah Terbaru Tahap Dua. Kami berharap blog pribadi kami menjadi sumber informasi yang berguna bagi Anda, dan juga tempat di mana Anda dapat berbagi pandangan, pertanyaan, dan saran terkait properti.
            </p>
            <blockquote class="blockquote">
              <p class="mb-4">Tunggu informasi lebih lanjut mengenai detail proyek ini dan jadwal penjualan unit-unit terbaru kami.</p>
              <footer class="blockquote-footer">
                <strong>GoHome</strong>
                <cite title="Source Title">Author</cite>
              </footer>
            </blockquote>
            <p>
              Kami mengundang Anda untuk terus mengikuti blog kami dan merapat bersama kami dalam perjalanan mengikuti impian memiliki rumah impian Anda!
            </p>
            <p>
              Terima kasih telah menjadi bagian dari komunitas Gohome, dan kami tak sabar untuk membagikan lebih banyak tentang Rumah Terbaru Tahap Dua dengan Anda. Jika Anda memiliki pertanyaan atau komentar, jangan ragu untuk menghubungi kami. Kami siap melayani Anda dengan sepenuh hati.
            </p>
          </div>
          <div class="post-footer">
            <div class="post-share">
              <span>Share: </span>
              <ul class="list-inline socials">
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
                  <a href="#">
                    <i class="bi bi-linkedin" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <form class="form-a">
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="inputName">Enter name</label>
                <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="inputEmail1">Enter email</label>
                <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <div class="form-group">
                <label for="inputUrl">Enter website</label>
                <input type="url" class="form-control form-control-lg form-control-a" id="inputUrl" placeholder="Website">
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <div class="form-group">
                <label for="textMessage">Enter message</label>
                <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-a">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>
    </div>
  </section><!-- End Blog Single-->

</main><!-- End #main -->

<?php include 'footer.php'; ?>