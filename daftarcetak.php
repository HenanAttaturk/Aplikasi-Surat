<?php

require 'functions.php';

$formCetak = query("SELECT * FROM surat");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar Cetak Surat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Logo -->
  <link rel="icon" href="img/logo/jateng.png">

  <!-- CSS Boostrap 3 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style_daftarcetak.css">

  <!-- JS Boostrap 3 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">DKP Jateng</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="nav-link"><a href="index.php">Surat Cetak Pemeliharaan</a></li>
          <li class="nav-link"><a href="daftarcetak.php">Daftar Cetak</a></li>


          <!-- Dropdown -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Surat Penunjukkan
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="pemegangkendaraan.php">Surat Kendaraan</a></li>
              <li class="divider"></li>
              <li><a href="pemegangelektronik.php">Surat Elektronik</a></li>
            </ul>
          </li>
          <!-- Akhir Dropdown -->

          <!-- Dropdown -->
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Daftar Cetak Penunjukkan
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="daftarcetakkendaraan.php">Surat Cetak Kendaraan</a></li>
              <li class="divider"></li>
              <li><a href="daftarcetakelektronik.php">Surat Cetak Elektronik</a></li>
            </ul>
          </li>
          <!-- Akhir Dropdown -->


        </ul>
      </div>
    </div>
  </nav>
  <!-- End of Navbar -->


  <!-- Jumbotron -->
  <div class="jumbotron text-center">
    <img src="img/DKP_Jateng.png" alt="DKP Jateng">
    <h2>Daftar Cetak Surat Pemeliharaan</h2>
  </div>
  <!-- End Jumbotron -->


  <!-- Info List -->
  <section class="info" id="info">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>| Berikut adalah daftar dari surat yang telah terdaftar |</h3>
        </div>
      </div>

      <!-- Tabel List -->
      <table class="table table-bordered mt-2">
        <thead>
          <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Aksi</th>
            <th class="text-center">Dibayarkan</th>
            <th class="text-center">Pembayaran</th>
            <th class="text-center">Uang Jumlah</th>
            <th class="text-center">Jumlah Kotor</th>
            <th class="text-center">Pajak</th>
            <th class="text-center">Jumlah Bersih</th>
          </tr>
        </thead>

        <tbody>
          <!-- Pengulangan Array -->
          <?php $i = 1; ?>
          <?php foreach ($formCetak as $cetak) : ?>
            <tr>
              <td class="text-center"><?= $i; ?></td>
              <td class="text-center">
                <!-- Tombol Edit -->
                &there4; <a href="ubah.php?id_form=<?= $cetak["id_form"]; ?>">Edit</a> &there4; ||
                <!-- Tombol Edit -->

                <!-- Tombol Hapus -->
                &there4; <a href="hapus.php?id_form=<?= $cetak["id_form"]; ?>" onclick="return confirm('Apakah Data Yang diHapus Sudah Benar?!');">Hapus</a> &there4;
                <!-- Tombol Hapus -->
              </td>
              <td class="text-justify"><?= $cetak["dibayarkan"]; ?></td>
              <td class="text-justify"><?= $cetak["untuk_pembayaran"]; ?></td>
              <td class="text-justify"><?= $cetak["uang_jumlah"]; ?></td>
              <td class="text-justify"><?= $cetak["jumlah_kotor"]; ?></td>
              <td class="text-justify"><?= $cetak["pajak"]; ?></td>
              <td class="text-justify"><?= $cetak["jumlah_bersih"]; ?></td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
          <!-- Akhir Pengulangan Array -->
        </tbody>
      </table>
      <!-- Akhir Tabel List -->

    </div>
  </section>
  <!-- End Info List -->



  <!-- My Javascript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="js/scriptdaftarcetak.js"></script>

</body>

</html>