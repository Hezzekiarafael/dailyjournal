<?php 
session_start();
include "koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

        <nav class="navbar navbar-expand-lg bg-black bg-gradient sticky-top">
                <div class="container">
                  <a class="navbar-brand text-light fw-bold" href="#">My Daily Journal</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                      <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light" href="#article">Article</a>
                      </li>
                      <li class="nav-item">
                            <a class="nav-link text-light" href="#gallery">Gallery</a>
                          </li>
                      <li class="nav-item">
                          <a class="nav-link text-light" href="#schedule">Shcedule</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light" href="#profile">Profile</a>
                    </li>
                    <div class="nav-icon ">
                    <div class="dropdown ">
                    <button class="btn btn-outline-secondary border-1 dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        
                    </button>
                    <ul class="dropdown-menu">
                    <?php if (isset($_SESSION['username'])): ?>
                    <!-- Jika pengguna sudah login -->
                    <li><a class="dropdown-item" href="admin.php">Dashboard</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <!-- Jika pengguna belum login -->
                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                    <?php endif; ?>
                    </ul>
                    </div>
                  </div>
                  </div>
                </div>
              </nav>
  
       <section id="hero" class="text-sm-start">
           <div class="conto">
             <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                 <div class="heroimg w-100">
                     <h1 class="fw-bold display-4 text-light">Create Memory Every Day</h1>
                     <h4 class="herotext4 lead display-6 text-light">Mencatat kegiatan sehari hari</h4>
                 <v>
             </div>
           </div>
       </section>

       <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">Article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

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

<!-- gallery -->
<section id="gallery" class="text-center p-5">
<h1 class="fw-bold display-4 pb-3">Gallery</h1>
  <div class="content m-5">
    <div class="gallery container">
        <div class="carouselImage">
          <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/img1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/img2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/img4.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="cardGallery mt-5 container">
          <div class="card-group mx-auto p-2">
            <div class="card" style="width: 18rem;">
              <img src="img/img2.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Picture 1</p>
              </div>
            </div>
            <div class="card" style="width: 18rem;">
              <img src="img/img4.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Picture 2</p>
              </div>
            </div>
            <div class="card" style="width: 18rem;">
              <img src="img/img1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">Picture 3</p>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</section>

<!-- gallery end -->

  <!-- schedule -->
  <section id="schedule" class="text-center p-5">
    <h1 class="fw-bold display-4 pb-5">Shcedule</h1>
  <article>
      <div class="articleSection container border">
          <div class="scheduleCard container">
              <div class="row row-cols-1 row-cols-md-4 g-4 text-center d-flex justify-content-start">
                  <div class="col">
                    <div class="card border-primary mb-3" style="max-width: 18rem;min-height: 10rem; ">
                      <div class="card-header fw-bold bg-primary text-light">Senin</div>
                      <div class="card-body text-dark">
                        <p class="card-title fw-bold">10:20 - 12:00</p>
                        <p class="card-text">Basis Data</p>
                        <p class="card-title fw-bold">12:30 - 15:00</p>
                        <p class="card-text">Rekayasa Perangkat Lunak</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card border-danger mb-3" style="max-width: 18rem;min-height: 10rem; ">
                      <div class="card-header fw-bold bg-danger text-light">Selasa</div>
                      <div class="card-body text-dark">
                        <p class="card-title fw-bold">10:20 - 12:00</p>
                        <p class="card-text">Basis Data</p>
                        <p class="card-title fw-bold">14:10 - 16:00</p>
                        <p class="card-text">Pendidikan Kewarganegaraan</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card border-warning mb-3" style="max-width: 18rem;min-height: 10rem; ">
                      <div class="card-header fw-bold bg-warning text-light">Rabu</div>
                      <div class="card-body text-dark">
                        <p class="card-title fw-bold">09:30 - 12:00</p>
                        <p class="card-text">Probabilitas dan Statistika</p>
                        <p class="card-title fw-bold">12:30 - 15:00</p>
                        <p class="card-text">Sistem Operasi</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card border-success mb-3" style="max-width: 18rem;min-height: 10rem; ">
                      <div class="card-header fw-bold bg-success text-light">Kamis</div>
                      <div class="card-body text-dark">
                        <p class="card-title fw-bold">09:30 - 12:00</p>
                        <p class="card-text">Logika Informatika</p>
                        <p class="card-title fw-bold">14:10 - 15:30</p>
                        <p class="card-text">Pemrograman Web</p>
                      </div>
                    </div>
                  </div>
                  <div class="col h-100">
                    <div class="card h-100 border-info mb-3" style="max-width: 18rem;min-height: 13rem;">
                      <div class="card-header fw-bold bg-info text-light">Jumat</div>
                      <div class="card-body text-dark">
                        <p class="card-title fw-bold">15:30 - 18:00</p>
                        <p class="card-text">Kriptografi</p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col">
                    <div class="card border-dark mb-3" style="max-width: 18rem;min-height: 13rem;">
                      <div class="card-header fw-bold bg-dark text-light">Sabtu</div>
                      <div class="card-body text-dark d-flex align-items-center justify-content-center">
                        <p class="card-title fw-bold">Jadwal Kosong</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card border-secondary mb-3" style="max-width: 18rem;min-height: 13rem;">
                      <div class="card-header fw-bold bg-secondary text-light">Minggu</div>
                      <div class="card-body text-dark d-flex align-items-center justify-content-center">
                        <p class="card-title fw-bold">Jadwal Kosong</p>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
      </div>
  </article>
</div>
</section>

<!-- schedule end -->
    
<!-- profile -->
<section id="profile" class="text-center p-5">
    <h1 class="fw-bold display-4 pb-2">Profile</h1>
<div class="content m-5">
  <div class="gallery container">
<div class="content m-5" id="profile">
  <div class="gallery container">
      <div class="profile">
        <div class="profileBox  h-100">
          <div class="row row-cols-1 row-cols-md-3 g-4 d-flex flex-row">
            <div class="col-lg">
              <div class="imageProfile  w-100 d-flex justify-content-center align-items-center h-100">
                <img src="img/mypicture.jpg" class="w-75 rounded-circle" alt="">
              </div>
            </div>

            <div class="col-lg  d-flex justify-content-center align-items-center flex-column">
              <div class="bioProfile  w-100 ">
                <table class="table  w-100">
                  <thead>
                    <h2 class="text-center mb-5">Biodata Mahasiswa</h2>
                  </thead>
                  <tr>
                    <td class="fw-semibold p-2">Nama</td>
                    <td class="p-2">:</td>
                    <td class="p-2">Hezzekia Rafael Miracle</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold p-2">NIM</td>
                    <td class="p-2">:</td>
                    <td class="p-2">A11.2023.15281</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold p-2">Program Studi</td>
                    <td class="p-2">:</td>
                    <td class="p-2">Teknik Informatika</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold p-2">Fakultas</td>
                    <td class="p-2">:</td>
                    <td class="p-2">Ilmu Komputer</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold p-2">Nama Universitas</td>
                    <td class="p-2">:</td>
                    <td class="p-2">Universitas Dian Nuswantoro</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold p-2">Umur</td>
                    <td class="p-2">:</td>
                    <td class="p-2">20 Tahun</td>
                  </tr>
                  <tr>
                    <td class="fw-semibold p-2">No. Telp</td>
                    <td class="p-2">:</td>
                    <td class="p-2">081393265417</td>
                  </tr>
                </table>
                
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
</section>
<!-- profile end -->

 <!-- footer start -->
<footer class="bg-dark mt-2 h-10" style="min-height: 5rem;">
        <div class="footerSection mt-5">
            <div class="mediaSocial d-flex justify-content-center mb-2" style="padding: 10px;">
            <a href="https://www.instagram.com/udinusofficial"
        ><i class="bi bi-instagram h2 p-2 text-light"></i
        ></a>
        <a href="https://twitter.com/udinusofficial"
        ><i class="bi bi-twitter h2 p-2 text-light"></i
        ></a>
        <a href="https://wa.me/+62812685577"
        ><i class="bi bi-whatsapp h2 p-2 text-light"></i
        ></a>
            </div>
           
        </div>

  <!-- Copyright -->
  <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2024 Copyright:
    <a class="text-white">Hezzekia Rafael Miracle</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- footer end -->

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>