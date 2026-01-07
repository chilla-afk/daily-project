<?php
include "koneksi.php"; 
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Catatan Journal</title>
  <link rel="icon" href="img/logo.jpg" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />

  <style>
    /* Default theme (light) */
    body {
      background-color: #ffffff;
      color: #212529;
      transition: background-color 0.3s, color 0.3s;
    }

    /* Dark mode */
    body.dark-mode {
      background-color: #121212;
      color: #f1f1f1;
    }

    body.dark-mode .card {
      background-color: #1e1e1e;
      color: #f1f1f1;
    }

    body.dark-mode .navbar,
    body.dark-mode footer {
      background-color: #1f1f1f !important;
    }

    body.dark-mode .nav-link,
    body.dark-mode .navbar-brand {
      color: #f1f1f1 !important;
    }

    .theme-btn {
      margin-left: 8px;
    }
  </style>
</head>

<body>
  <!-- nav begin -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">Catatan Journal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#articles">Article</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#schedule">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#profile">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php" target="_blank">Login</a>
</li>
        </ul>

        <!-- Tombol Theme Switcher -->
        <div class="ms-3 d-flex">
          <button id="lightBtn" class="btn btn-outline-secondary theme-btn">
            <i class="bi bi-brightness-high"></i> Light
          </button>
          <button id="darkBtn" class="btn btn-dark theme-btn">
            <i class="bi bi-moon-stars"></i> Dark
          </button>
        </div>
      </div>
    </div>
  </nav>
  <!-- nav end -->

  <!-- hero begin -->
  <section id="hero" class="text-center p-5 bg-dark-subtle text-sm-start">
    <div class="container">
      <div class="d-sm-flex flex-sm-row-reverse align-items-center">
        <img src="img/banner.jpg" class="img-fluid" width="300">
        <div>
          <h1 class="fw-bold display-4 text">Create Memories, Save Memories, Everyday</h1>
          <h4 class="lead display-6">Mencatat semua kegiatan sehari-hari yang ada tanpa terkecuali</h4>
        </div>
      </div>
    </div>
  </section>
  <!-- hero end -->

      <!-- article begin -->
    <section id="article" class="text-center p-5">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
          <?php
          $sql = "SELECT * FROM article ORDER BY tanggal DESC";
          $hasil = $conn->query($sql); 

          $no=1;
          while($row = $hasil->fetch_assoc()){
          ?>
            <div class="col">
              <div class="card h-100">
                <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title"><?= $row["judul"]?></h5>
                  <p class="card-text">
                    <?= $row["isi"]?>
                  </p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">
                    <?= $row["tanggal"]?>
                  </small>
                </div>
              </div>
            </div>
            <?php
          }
          ?> 
        </div>
      </div>
    </section>
    <!-- article end -->

  <!-- gallery begin -->
  <section id="gallery" class="text-center p-5 bg-dark-subtle">
    <div class="container">
      <h1 class="fw-bold display-4 pb-3">Gallery</h1>
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/gal1.jpg" class="d-block w-100" alt="... ">
          </div>
          <div class="carousel-item">
            <img src="img/gal2.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- gallery end -->

  <!-- Jadwal Kuliah Section -->
  <section id="schedule" class="p-5 text-center">
    <div class="container">
      <h1 class="fw-bold mb-4">Jadwal Kuliah & Kegiatan Mahasiswa</h1>
      <div class="row row-cols-1 row-cols-md-3 g-3">
        <div class="col">
          <div class="card border-primary">
            <div class="card-header bg-primary text-white">Senin</div>
            <div class="card-body">
              <p>09:00 - 10:30<br>Basis Data<br>Ruang H.3.4</p>
              <p>13:00 - 15:00<br>Dasar Pemrograman<br>Ruang H.3.1</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card border-success">
            <div class="card-header bg-success text-white">Selasa</div>
            <div class="card-body">
              <p>08:00 - 09:30<br>Pemrograman Berbasis Web<br>Ruang D.2.1</p>
              <p>14:00 - 16:00<br>Basis Data<br>Ruang D.3.M</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card border-warning">
            <div class="card-header bg-warning text-white">Rabu</div>
            <div class="card-body">
              <p>10:00 - 12:00<br>Pemrograman Berbasis Object<br>Ruang D.2.4</p>
              <p>13:30 - 15:00<br>Pemrograman Sisi Server<br>Ruang D.2.A</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Profil Mahasiswa Section -->
  <section id="profile" class="p-5 bg-light text-center">
    <div class="container">
      <h1 class="fw-bold mb-4">Profil Mahasiswa</h1>
      <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-4">
        <img src="img/profile.jpg" alt="Foto Profil" class="rounded-circle shadow" width="180">
        <div class="card shadow p-3 text-start" style="max-width: 400px;">
          <div class="card-body">
            <h5 class="card-title text-center">M Fauzil Adhim</h5>
            <p class="text-center">Mahasiswa Teknik Informatika</p>
            <p><strong>NIM:</strong> A11.2024.15853</p>
            <p><strong>Program Studi:</strong> Teknik Informatika</p>
            <p><strong>Email:</strong>1112415853@mhs.ac.id</p>
            <p><strong>Telepon:</strong> +62895377229492</p>
            <p><strong>Alamat:</strong> Semarang</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Profil end -->

  <!-- footer begin -->
  <footer class="text-center p-5">
    <div>
      <a href="#"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
      <a href="#"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
      <a href="#"><i class="bi bi-twitter-x h2 p-2 text-dark"></i></a>
    </div>
    <div>Muhammad Fauzil Adhim &copy; 2024</div>
  </footer>
  <!-- footer end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-hpZgXqoUwpSgzi5fC1QLkxr9JVof0FYu1mXhYnQ9kLwg+t4AkKgTfMVLQbWhyCJ" crossorigin="anonymous"></script>

  <!-- Theme Switcher Script -->
  <script>
    const darkBtn = document.getElementById('darkBtn');
    const lightBtn = document.getElementById('lightBtn');

    darkBtn.addEventListener('click', () => {
      document.body.classList.add('dark-mode');
    });

    lightBtn.addEventListener('click', () => {
      document.body.classList.remove('dark-mode');
    });
  </script>
</body>

</html>
