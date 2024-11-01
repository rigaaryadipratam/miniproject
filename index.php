<?php
require 'function.php';
$mahasiswa = mysqli_query(mysqli_connect("localhost", "root", "", "pweb"), "SELECT * FROM siswa");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tugas Mini Project</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body id="home">

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark animate__animated animate__fadeInDown">
    <div class="container">
      <a class="navbar-brand fw-bold fs-4" href="#">SiswaMendaftar.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
          <li class="nav-item">
            <a class="nav-link active mx-1" aria-current="page" href="#home">Halaman Utama</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1"  href="#data">Siswa Yang Telah Terdaftar</a>
          </li>
        </ul>
        <div class="text-center">
         <a href="validasi.php"> <button class="btn btn-outline-light btn-lg rounded-1 animate__animated animate__fadeInUp animate__delay-1s">Daftar</button></a>
        </div>
      </div>
    </div>
  </nav>


  <div class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h1 class="text-white fw-bold mb-4 animate__animated animate__fadeInUp animate__delay-1s">
            Daftarkan Dirimu!<br />
            Pada Rancang Bangun Project Pendaftaran Siswa Ini
          </h1>

          <a href="validasi.php"><button class="btn btn-primary btn-lg rounded-1 me-2 animate__animated animate__fadeInUp animate__delay-1s">Daftar</button></a>
         <a href="index.php#data"> <button class="btn btn-outline-light btn-lg rounded-1 animate__animated animate__fadeInUp animate__delay-1s">Lihat Siswa Siswi Terdaftar</button></a>
        </div>
      </div>
    </div>
  </div>


  <div class="about" id="about">
    <div class="container-fluid">
      <div class="row row-cols-lg-2 row-cols-1">
        <div class="col text-center py-5 text-white">
          <h2>2000+</h2>
          <h2 class="fw-bold mb-2">Siswa Siswi Terdaftar</h2>

        </div>
        <div class="col text-center py-5 bg-primary text-white">
          <h2>Mini Project</h2>
          <h2 class="fw-bold mb-2">Pengembangan Aplikasi Web</h2>

        </div>
      </div>
    </div>
  </div>



  <div class="projects" id="data">
    <div class="container">
      <div class="row mb-4">
        <div class="col">
          <h2 class="border-bottom pb-2 fw-semibold" data-aos="fade-right" data-aos-duration="1000">
            Siswa dan Siswi <br />
            Yang Telah Terdaftar
          </h2>
        </div>
      </div>

      <div class="container mt-5">

        <h3 class="mb-4 bold">Data Siswa Terdaftar</h3>

        <div class="card">
          <div class="card-body">
            <a href="validasi.php" class="btn btn-primary mt-2 mb-4 bold">Daftarkan Siswa</a>
            <table class="table table-striped table-bordered">
              <thead class="table-light">
                <tr>
                  <th class="bold">No</th>
                  <th class="bold">Nama</th>
                  <th class="bold">NISN</th>
                  <th class="bold">Alamat</th>
                  <th class="bold">Jenis Kelamin</th>
                  <th class="bold">Agama</th>
                  <th class="bold">Asal Sekolah</th>
                  <th class="bold">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $row) : ?>
                  <tr>
                    <td class="normal"><?= $i; ?></td>
                    <td class="normal"><?= $row["nama"]; ?></td>
                    <td class="normal"><?= $row["nisn"]; ?></td>
                    <td class="normal"><?= $row["alamat"]; ?></td>
                    <td class="normal"><span class="badge bg-secondary"><?= $row["jeniskelamin"]; ?></span></td>
                    <td class="normal"><span class="badge bg-info text-dark"><?= $row["agama"]; ?></span></td>
                    <td class="normal"><?= $row["asalsekolah"]; ?></td>
                    <td class="normal">
                      <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn-delete" data-id="<?= $row["id"]; ?>">
                        <button class="btn btn-sm btn-danger bold">Hapus</button>
                      </a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="footer pt-5">
    <div class="container">
      <div class="row row-cols-lg-3 row-cols-1 justify-content-between">
        <div class="col col-lg-6 mb-lg-0 mb-4">
          <h2 class="fw-bold text-white mb-3">SiswaMendaftar.</h2>
          <p class="text-white-50">Merupakan mini project dari Mata Kuliah Pengembangan Aplikasi Web</p>
        </div>
        <div class="col col-lg-3 d-flex flex-column">
          <h5 class="fw-bold text-white mb-3">Contact</h5>
          <a href="#" class="text-decoration-none text-white-50 mt-2">5002211172@student.its.ac.id</a>
          <a href="#" class="text-decoration-none text-white-50 mt-2">5002211000@student.its.ac.id</a>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p class="text-white text-center copyright">&copy; Copyright 2024 Riga Aryadi Pratama - Radityo Arrasyid</p>
        </div>
      </div>
    </div>
  </div>


  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="dist/js/script.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>