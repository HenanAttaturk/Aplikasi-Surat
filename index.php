<?php

require 'functions.php';

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {



  // ambil data dari tiap form elemen

  // cek apakah data berhasil ditambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "
              <script> alert('Surat Berhasil Terbuat!');
                      document.location.href = 'kendaraan.php';
              </script>
              ";
  } else {
    echo "
      <script> alert('Mohon Maaf! Surat Gagal diBuat!');
              document.location.href = 'index.php';
      </script>
      ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pemeliharaan DKP Jateng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/logo/jateng.png">

  <!-- Boostrap 3 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">

  <!-- datepicker bootstrap -->
  <link rel="stylesheet" href="bootstrap-datepicker/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <script src="bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>


  <!-- Boostrap JS 3 -->
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
    <img src="img/DKP_Jateng.png" alt="Dinas Kelautan dan Perikanan">
    <h2>Pemeliharaan Dinas</h2>
  </div>
  <!-- End of Jumbotron -->



  <!-- Cetak Form -->
  <section class="cetak" id="cetak">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center">Cetak Form Pemeliharaan</h2>
          <hr>
        </div>
      </div>

      <div class="row mt-1">
        <div class="col-md-6">

          <!-- Form Surat -->
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="ta">Tahun Anggaran :</label>
              <input type="text" class="form-control" id="ta" name="tahun_anggaran" placeholder="Contoh : 2021 NO. I / IV / 2021">
            </div>
            <div class="form-group">
              <label for="bayarkan">Dibayarkan Kepada :</label>
              <input type="text" class="form-control" id="bayarkan" name="dibayarkan" placeholder="Contoh : PT. Nasmoco Pemuda">
            </div>
            <div class="form-group">
              <label for="jumlah">Uang Sejumlah Rp. :</label>
              <input type="text" class="form-control" id="jumlah" name="uang_jumlah" placeholder="5500250 **Tidak Menggunakan Tanda , atau .**">
            </div>
            <div class="form-group">
              <label for="untukPembayaran">Untuk Pembayaran :</label>
              <input type="text" class="form-control" id="untukPembayaran" name="untuk_pembayaran" placeholder="Jasa Servis Berkala dan Ganti Oli Mesin Mobil Toyota Avanza">
            </div>
            <div class="form-group">
              <label for="untukPekerjaan">Untuk Pekerjaan / Keperluan :</label>
              <input type="text" class="form-control" id="untukPekerjaan" name="untuk_keperluan" placeholder="Perawatan Mobil Dinas">
            </div>
            <div class="form-group">
              <label for="kode">Kode Rek. / Kegiatan :</label>
              <input type="text" class="form-control" id="kode" name="kode_rekening" placeholder="5.1.2.3.6.1.01">
            </div>
            <div class="form-group">
              <label for="tanggalTerima">Tanggal Penerimaan :</label>
              <input type="date" class="form-control tanggal" id="tanggalTerima" name="tanggal_terima" placeholder="dd-mm-yyyy" autocomplete="off" value="<?= date('d F Y') ?>">
            </div>

            <!-- Akhir Form Surat -->
        </div>

        <div class="col-md-6">
          <!-- Form Keterangan -->
          <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
          <div class="form-group">
            <label for="tanggal">Masuk Buku Persediaan / Inventaris pada tanggal :</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal_inventaris" placeholder="dd-mm-yyyy" autocomplete="off">
          </div>
          <div class=" form-group">
            <label for="jumlahKotor">Jumlah Kotor :</label>
            <input type="text" class="form-control" id="jumlahKotor" name="jumlah_kotor" placeholder="5.500.250">
          </div>
          <div class="form-group">
            <label for="pajak">Pajak :</label>
            <input type="text" class="form-control" id="pajak" name="pajak" placeholder="PPH 23">
          </div>
          <div class="form-group">
            <label for="jumlahBersih">Jumlah Bersih :</label>
            <input type="text" class="form-control" id="jumlahBersih" name="jumlah_bersih" placeholder="5.500.250">
          </div>
          <div class="form-group">
            <label for="pengeluaran">Pengeluaran / Pembelian dilakukan berdasarkan :</label>
            <input type="text" class="form-control" id="pengeluaran" name="pengeluaran">
          </div>
          <div class="form-group">
            <label for="namaPenerima">Nama Yang Menerima Barang :</label>
            <input type="text" class="form-control" id="namaPenerima" name="yang_menerima" placeholder="Parijo">
          </div>
          <!-- </form> -->
          <!-- Akhir Form Keterangan -->
        </div>
      </div>
    </div>
    <!-- Akhir Cetak Form -->
  </section>

  <section class="ttd bg-whitesmoke" id="ttd">
    <div class="container">

      <div class="row mt-1">
        <div class="col-md-4">
          <!-- Form Tanda Tangan -->
          <!-- <form action="" method="POST" enctype="multipart/form-data"> -->
          <div class="form-group text-center">
            <label for="bendahara">Nama Bendahara Pengeluaran :</label>
            <input type="text" class="form-control" id="bendahara" name="nama_bendahara" placeholder="ANTON KRISTANTO">
          </div>
          <div class="form-group text-center">
            <label for="nipBP">NIP Bendahara Pengeluaran :</label>
            <input type="text" class="form-control" id="nipBP" name="nip_bendahara" placeholder="19821018 200801 1 005">
          </div>
          <!-- </form> -->
        </div>

        <div class="col-md-4">
          <!-- <form action="" method="post" enctype="multipart/form-data"> -->
          <div class="form-group text-center">
            <label for="anggaran">Nama Pengguna Anggaran :</label>
            <input type="text" class="form-control" id="anggaran" name="nama_pengguna" placeholder="Ir. FENDIAWAN TISKIANTORO, M.Si">
          </div>
          <div class="form-group text-center">
            <label for="nipPA">NIP Pengguna Anggaran :</label>
            <input type="text" class="form-control" id="nipPA" name="nip_pengguna" placeholder="19650117 199010 1 001">
          </div>
          <!-- </form> -->
        </div>

        <div class="col-md-4">
          <!--  -->
          <div class="form-group text-center">
            <label for="pelaksana">Nama Pejabat Pelaksana :</label>
            <input type="text" class="form-control" id="pelaksana" name="nama_pelaksana" placeholder="SANTOSA, SP, MM">
          </div>
          <div class="form-group text-center">
            <label for="nipPL">NIP Pejabat Pelaksana :</label>
            <input type="text" class="form-control" id="nipPL" name="nip_pelaksana" placeholder="19700517 199301 1 001">
          </div>
          <!--  -->
        </div>

        <div class="container">
          <button type="submit" onclick="confirm('Apakah Data Yang diMasukkan Sudah Benar?');" name="submit" class="btn btn-info btn-darkmode btn-block">Masukkan Data</button>
        </div>
        </form>
        <!-- Akhir Form Tanda Tangan -->

      </div>
    </div>
  </section>



  <!-- My Javascript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- Format Tanggal -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Format Tanggal -->

  <script src="js/script.js"></script>
  <!-- End of My Javascript -->

  <!-- Mengubah Format Tanggal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js">
  </script>
  <!-- Akhir Mengubah Format Tanggal -->


</body>

</html>