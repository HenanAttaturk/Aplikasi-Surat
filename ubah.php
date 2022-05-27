<?php

require 'functions.php';

// Ambil Data di URL
$id = $_GET["id_form"];

// Mengambil Data Surat Sesuai Dengan ID
$suratCetak = query("SELECT * FROM surat WHERE id_form = $id")[0];

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // ambil data dari tiap form elemen

    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
                <script> alert('Data Berhasil diUbah!');
                        document.location.href = 'kendaraan.php';
                </script>
                ";
    } else {
        echo "
        <script> alert('Mohon Maaf! Data Gagal diUbah!');
                document.location.href = 'ubah.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ubah Data Cetak</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Boostrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="icon" href="img/logo/jateng.png">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style_ubah.css">

    <!-- JS Boostrap 3 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <img src="img/DKP_Jateng.png" alt="DKP jateng">
        <h3>&#8886; Form Ubah Data Cetak Pemeliharaan &#8887;</h3>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Form Untuk Ubah Data -->
    <section class="ubah" id="ubah">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Ubah Data Surat Cetak Pemeliharaan</h4>
                </div>
            </div>

            <div class="row mt-2">
                <!-- Form Satu -->
                <div class="col-md-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="dibayarkan">Dibayarkan :</label>
                            <input type="text" class="form-control" id="dibayarkan" name="dibayarkan" value="<?= $suratCetak["dibayarkan"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pembayaran">pembayaran :</label>
                            <input type="text" class="form-control" id="pembayaran" name="untuk_pembayaran" value="<?= $suratCetak["untuk_pembayaran"]; ?>">
                        </div>
                        <div class=" form-group">
                            <label for="uangjumlah">Uang Jumlah :</label>
                            <input type="text" class="form-control" id="uangjumlah" name="uang_jumlah" value="<?= $suratCetak["uang_jumlah"]; ?>">
                        </div>
                </div>

                <!-- Form Dua -->
                <div class=" col-md-6">
                    <div class="form-group">
                        <label for="jumlahkotor">Jumlah Kotor :</label>
                        <input type="text" class="form-control" id="jumlahkotor" name="jumlah_kotor" value="<?= $suratCetak["jumlah_kotor"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pajak">Pajak :</label>
                        <input type="text" class="form-control" id="pajak" name="pajak" value="<?= $suratCetak["pajak"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlahbersih">Jumlah Bersih :</label>
                        <input type="text" class="form-control" id="jumlahbersih" name="jumlah_bersih" value="<?= $suratCetak["jumlah_bersih"]; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-info btn-block" onclick="return confirm('Apakah Data Yang DiUbah Sudah Benar?');">Ubah Data</button>
                    <input type="hidden" name="id_form" value="<?= $suratCetak["id_form"] ?>">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Form Untuk Ubah Data -->

</body>

</html>