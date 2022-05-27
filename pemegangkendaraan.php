<?php

require 'functions.php';

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["kirim"])) {



  // ambil data dari tiap form elemen

  // cek apakah data berhasil ditambahkan atau tidak
  if (tambahKendaraan($_POST) > 0) {
    echo "
              <script> alert('Surat Berhasil Terbuat!');
                      document.location.href = 'penunjukkanpdf.php';
              </script>
              ";
  } else {
    echo "
      <script> alert('Mohon Maaf! Surat Gagal diBuat!');
              document.location.href = 'pemegangkendaraan.php';
      </script>
      ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Surat Kendaraan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS Boostrap 3 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <link rel="icon" href="img/logo/jateng.png">

  <link rel="stylesheet" href="css/style_penujukkankendaraaan.css">

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
        <a class="navbar-brand" href="#">DKP JATENG</a>
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
    <h3>&#8608; Surat Penunjukkan Kendaraan &#8606;</h3>
  </div>
  <!-- End Jumbotron -->

  <!-- Form Input Data -->
  <section class="form" id="form">
    <div class="container">
      <h4 class="text-center fw-bold">Masukkan Input Data Surat Penunjukkan Pemegang Kendaraan</h4>
      <hr>
      <div class="row mt-2">

        <!-- Kolom Pertama -->
        <div class="col-md-6">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nosurat">Nomor Surat :</label>
              <input type="text" class="form-control" id="nosurat" placeholder="016/.../V/2021" name="nosurat">
            </div>

            <!-- Nama == Nama TTD -->
            <div class="form-group">
              <label for="nama">Nama :</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Ir. FENDIAWAN TISKIANTORO, M.Si">
            </div>
            <!-- Akhir Nama == Nama TTD -->

            <!-- NIP == NIP TTD -->
            <div class="form-group">
              <label for="nip">NIP :</label>
              <input type="text" class="form-control" id="nip" placeholder="19650117 199010 1 001" name="nip">
            </div>
            <!-- Akhir NIP == NIP TTD -->

            <!-- Pangkat == Pangkat TTD -->
            <div class="form-group">
              <label for="pangkat">Pangkat/Gol :</label>
              <input type="text" class="form-control" id="pangkat" placeholder="Pembina Utama Muda (IV/c)" name="pangkat">
            </div>
            <!-- Akhir Pangkat == Pangkat TTD -->

            <div class="form-group">
              <label for="jabatan">Jabatan :</label>
              <input type="text" class="form-control" id="jabatan" placeholder="Kepala Dinas Kelautan dan Perikanan Provinsi Jawa Tengah" name="jabatan">
            </div>

        </div>
        <!-- Akhir Kolom Pertama -->

        <!-- Kolom Kedua -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="pns">Kategori Identitas Yang tercantum :</label>
            <select name="pns" id="pns" class="form-control">
              <option>Pegawai Negeri Sipil/Aparatur Sipil Negara</option>
              <option>Non Pegawai Negeri Sipil/Aparatur Sipil Negara</option>
            </select>
          </div>

          <!-- Nama == Nama Pembuat Pernyataan -->
          <div class="form-group">
            <label for="namaid">Nama :</label>
            <input type="text" class="form-control" id="namaid" name="namaid" placeholder="ISLAHUTTAMAM, S.St.Pi">
          </div>
          <!-- Akhir Nama == Nama Pembuat Pernyataan -->

          <!-- NIP == NIP Pembuat Pernyataan -->
          <div class="form-group">
            <label for="nipid">NIP :</label>
            <input type="text" class="form-control" id="nipid" name="nipid" placeholder="197903202006041000">
          </div>
          <!-- Akhir NIP == NIP Pembuat Pernyataan -->

          <!-- Pangkat == Pangkat Pembuat Pernyataan -->
          <div class="form-group">
            <label for="pangkatid">Pangkat/Gol :</label>
            <input type="text" class="form-control" id="pangkatid" name="pangkatid" placeholder="Penata Tingkat I (III/d)">
          </div>
          <!-- Akhir Pangkat == Pangkat Pembuat Pernyataan -->

          <div class="form-group">
            <label for="jabatanid">Jabatan :</label>
            <input type="text" name="jabatanid" class="form-control" id="jabatanid" placeholder="Kasi Pengembangan Komoditas">
          </div>
        </div>

        <!-- Akhir Kolom Kedua -->

      </div>
    </div>
  </section>

  <section class="data whitesmoke" id="data">
    <div class="container">
      <div class="row mt-2">

        <!-- Kolom Ketiga -->
        <div class="col-md-6">
          <h4 class="text-center mt-2">Data Kendaraan</h4>

          <div class="form-group">
            <label for="nopol">Nomor Polisi :</label>
            <input type="text" class="form-control" id="nopol" placeholder="H 9640 KA" name="nopol">
          </div>

          <div class="form-group">
            <label for="merk">Merk/Tipe :</label>
            <input type="text" class="form-control" id="merk" placeholder="Mega Pro" name="merk">
          </div>

          <div class="form-group">
            <label for="jenis">Jenis/Model :</label>
            <input type="text" class="form-control" id="jenis" placeholder="Alat Angkutan Sepeda Motor" name="jenis">
          </div>

          <div class="form-group">
            <label for="tahunbuat">Tahun Pembuatan/Perakitan/Isi Silinder :</label>
            <input type="text" class="form-control" id="tahunbuat" placeholder="2001" name="tahunbuat">
          </div>

          <div class="form-group">
            <label for="warna">Warna :</label>
            <input type="text" class="form-control" id="warna" placeholder="Hitam" name="warna">
          </div>

          <div class="form-group">
            <label for="norangka">No. Rangka/NIK/VIN :</label>
            <input type="text" class="form-control" id="norangka" placeholder="MH1KC3118BK096597" name="norangka">
          </div>

          <div class="form-group">
            <label for="nomesin">Nomor Mesin :</label>
            <input type="text" class="form-control" id="nomesin" placeholder="KC31E1096402" name="nomesin">
          </div>

          <div class="form-group">
            <label for="nobpkb">Nomor BPKB :</label>
            <input type="text" class="form-control" id="nobpkb" placeholder="1722 022312" name="nobpkb">
          </div>

        </div>
        <!-- Akhir Kolom Ketiga -->


        <!-- Kolom Keempat -->
        <div class="col-md-6">
          <h4 class="text-center mt-2">Tanda Tangan Surat</h4>

          <div class="form-group">
            <label for="tanggal">Tanggal Surat Tanda Tangan :</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal">
          </div>

        </div>
        <!-- Akhir Kolom Keempat -->
      </div>
    </div>
  </section>

  <section class="pernyataan" id="pernyataan">
    <div class="container">
      <div class="row mt-2">
        <h4 class="text-center">Input Surat Pernyataan</h4>
      </div>

      <!-- Kolom Kelima -->
      <div class="col-md-6">

        <!-- Nama Pernyataan == Nama  -->
        <div class="form-group">
          <label for="namapernyataan">Nama Pembuat Surat Pernyataan :</label>
          <input type="text" class="form-control" id="namapernyataan" name="namapernyataan" placeholder="ISLAHUTTAMAM, S.St.Pi">
        </div>
        <!-- Akhir Nama Pernyataan == Nama -->

        <!-- NIP Pembuat Pernyataan == NIP -->
        <div class="form-group">
          <label for="nippernyataan">NIP Pembuat Surat Pernyataan :</label>
          <input type="text" class="form-control" id="nippernyataan" placeholder="197903202006041000" name="nippernyataan">
        </div>
        <!-- NIP Pembuat Pernyataan == NIP -->

        <!-- Pangkat Pembuat Pernyataan == Pangkat-->
        <div class="form-group">
          <label for="pangkatpernyataan">Pangkat/Gol Pembuat Surat Pernyataan :</label>
          <input type="text" class="form-control" id="pangkatpernyataan" placeholder="Penata Tingkat I (III/d)" name="pangkatpernyataan">
        </div>
        <!-- Pangkat Pembuat Pernyataan == Pangkat -->

        <div class="form-group">
          <label for="pekerjaanpernyataan">Pekerjaan/Jabatan Pembuat Surat Pernyataan :</label>
          <textarea type="textarea" class="form-control" id="pekerjaanpernyataan" placeholder="Aparatur Sipil Negara/Kasie Pengembangan Komoditas Dinas Kelautan dan Perikanan dan Kelautan Provinsi Jawa Tengah" name="pekerjaanpernyataan"></textarea>
        </div>

      </div>
      <!-- Akhir Kolom Kelima -->

      <!-- Kolom Keenam -->
      <div class="col-md-6">

        <div class="form-group">
          <label for="tanggalpernyataan">Tanggal Surat Pernyataan :</label>
          <input type="date" class="form-control" id="tanggalpernyataan" name="tanggalpernyataan">
        </div>

        <div class="form-group">
          <label for="mengetahui">Mengetahui Surat Pernyataan :</label>
          <input type="text" class="form-control" id="mengetahui" placeholder="Kepala Dinas Kelautan dan Perikanan Provinsi Jawa Tengah" name="mengetahui">
        </div>

        <div class="form-group">
          <label for="namaketahui">Nama Mengetahui Surat Pernyataan :</label>
          <input type="text" class="form-control" id="namaketahui" placeholder="Ir. FENDIAWAN TISKIANTORO, M.Si" name="namaketahui">
        </div>

        <div class="form-group">
          <label for="golonganketahui">Golongan Pembuat Surat Pernyataan :</label>
          <input type="text" class="form-control" id="golonganketahui" placeholder="Pembina Utama Muda" name="golonganketahui">
        </div>

        <div class="form-group">
          <label for="nipketahui">NIP Mengetahui Surat Pernyataan :</label>
          <input type="text" class="form-control" id="nipketahui" placeholder="19650117 199010 1 001" name="nipketahui">
        </div>


        <!-- SURAT PERNYATAAN -->
        <div class="form-group">
          <label for="yangpernyataan">Yang Membuat Surat Pernyataan :</label>
          <input type="text" class="form-control" id="yangpernyataan" placeholder="Kasie Pengembangan Komoditas" name="yangpernyataan">
        </div>



        <!-- AKHIR SURAT PERNYATAAN -->
      </div>
      <!-- Akhir Kolom Keenam -->
    </div>
    <button type="submit" name="kirim" class="btn btn-info btn-block mb-1">Tambahkan Data</button>
    </form>
  </section>


  <!-- Akhir Form Input Data -->


  <!-- Javascript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="js/scriptpenunjukan.js"></script>

</body>

</html>