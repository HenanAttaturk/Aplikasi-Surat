<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';

// --- Ambil Data dari Yang di Inputkan ---
$formCetak = query("SELECT * FROM kendaraan");

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 330]]);

$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);



$stylesheet = file_get_contents('css/style_suratpenunjukkan.css');

$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

// --- Deklarasi HTML ---
$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <title>Surat Penunjukkan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <link rel="icon" href="img/logo/jateng.png">

  <link rel="stylesheet" href="css/style_suratpenunjukkan.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container text-center float">
    <img src="img/HitamPutih_Jateng.png" class="img-surat">
        <div>
            <h5>PEMERINTAH PROVINSI JAWA TENGAH</h5>
            <h4 class="fw-bold">DINAS KELAUTAN DAN PERIKANAN JAWA TENGAH</h4>
            <p class="fs-6">Jalan Imam Bonjol No.134 Semarang Kode Pos 50132 Telepon 024-3546469, 3546607</p>
            <p class="fs-6">Faksimile 024-3551289 Laman http://www.jatengprov.go.id</p>
            <p class="fs-6 fw-bold">Surat Elektronik dkp@jatengprov.go.id</p>
        </div>
    <hr class="border-1">
</div>';


foreach ($formCetak as $kendaraan);

$html .= '<div class="container text-center">
<p class="fs-5 fw-bold">SURAT PENUNJUKAN PEMEGANG KENDARAAN DINAS</p>
<p class="fs-5 fw-bold">MILIK DINAS KELAUTAN DAN PERIKANAN</p>
<p class="fs-5 fw-bold">PROVINSI JAWA TENGAH</p>
<p class="fs-6 text-center">Nomor : ' . $kendaraan["nosurat"] . '</p>
</div>

<div class="container">
    <p class="fs-5 text-justify">Yang bertanda tangan dibawah ini :</p>
    <pre class="fs-5 text-justify">Nama        : ' . $kendaraan["nama"] . '</pre>
    <pre class="fs-5 text-justify">NIP         : ' . $kendaraan["nip"] . '</pre>
    <pre class="fs-5 text-justify">Pangkat/Gol : ' . $kendaraan["pangkat"] . '</pre>
    <pre class="fs-5 text-justify">Jabatan     : ' . $kendaraan["jabatan"] . '</pre>

    <p class="fs-5 text-justify fw-bold">MENUNJUK</p>
    <p class="fs-5 text-justify">' . $kendaraan["pns"] . ' dengan identitas sebagai berikut :</p>

    <pre class="fs-5 text-justify">Nama        : ' . $kendaraan["namaid"] . '</pre>
    <pre class="fs-5 text-justify">NIP         : ' . $kendaraan["nipid"] . '</pre>
    <pre class="fs-5 text-justify">Pangkat/Gol : ' . $kendaraan["pangkatid"] . '</pre>
    <pre class="fs-5 text-justify">Jabatan     : ' . $kendaraan["jabatanid"] . '</pre>

    <p class="fs-5 text-justify">Sebagai pemegang/penanggung jawab kendaraan dinas dengan data kendaraan sebagai berikut :</p>
    <pre class="fs-5 text-justify">Nomor Polisi                                : ' . $kendaraan["nopol"] . '</pre>
    <pre class="fs-5 text-justify">Merk/Tipe                                   : ' . $kendaraan["merk"] . '</pre>
    <pre class="fs-5 text-justify">Jenis/Model                                 : ' . $kendaraan["jenis"] . '</pre>
    <pre class="fs-5 text-justify">Tahun Pembuatan/Perakitan/Isi Silinder      : ' . $kendaraan["tahunbuat"] . '</pre>
    <pre class="fs-5 text-justify">Warna                                       : ' . $kendaraan["warna"] . '</pre>
    <pre class="fs-5 text-justify">No. Rangka/NIK/VIN                          : ' . $kendaraan["norangka"] . '</pre>
    <pre class="fs-5 text-justify">Nomor Mesin                                 : ' . $kendaraan["nomesin"] . '</pre>
    <pre class="fs-5 text-justify">Nomor BPKB                                  : ' . $kendaraan["nobpkb"] . '</pre>

    <p class="fs-5 text-justify">Penunjukan pemegang/penanggung jawab kendaraan dinas dilaksanakan dengan ketentuan :</p>

        <pre class="fs-5 text-justify fw-bold ktn-float">PERTAMA :</pre>
        <p class="fs-5 text-justify">Sebagai pemegang/penanggung jawab kendaraan dinas dimaksud diwajibkan :</p>
        <p class="fs-5 text-justify sans-serif">                  1.	Memelihara dan merawat kendaraan dimaksud agar selalu dalam keadaan baik dan siap pakai;</p>
        <p class="fs-5 text-justify sans-serif">                  2.	Mempergunakan dan mengoperasikan kendaraan dimaksud semata-mata hanya untuk keperluan dinas;</p>
        <p class="fs-5 text-justify sans-serif">                  3.	Melaporkan kepada Pejabat yang menujuk, apabila kendaraan dimaksud memerlukan perbaikan;</p>
        <p class="fs-5 text-justify sans-serif">                  4.	Bertanggung jawab terhadap kehilangan, kerusakan berat dan atau akibat kecelakaan; dan</p>
        <p class="fs-5 text-justify sans-serif">                  5.	Menyerahkan/mengembalikan kepada Pejabat yang menunjuk, apabila terjadi mutasi/dipindahtugaskan ke tempat lain serta pensiun.</p>

        <pre class="fs-5 text-justify fw-bold ktn-float">KEDUA :</pre>
        <p class="fs-5 text-justify">Sebagai pemegang/penanggung jawab kendaraan dinas dimaksud dilarang :</p>
        <p class="fs-5 text-justify sans-serif">                  1.	Meminjamkan kendaraan dimaksud kepada pihak lain;</p>
        <p class="fs-5 text-justify sans-serif">                  2.	Mempergunakan dan mengoperasikan kendaraan dimaksud untuk keperluan lain selain keperluan dinas;</p>
        <p class="fs-5 text-justify sans-serif">                  3.	Menjadikan kendaraan dimaksud sebagai jaminan hutang; dan</p>
        <p class="fs-5 text-justify sans-serif">                  4.	Membiarkan kendaraan dimaksud tidak terpelihara (diterlantarkan) diletakkan dilokasi yang tidak aman atau kurang terlindung.</p>

        
        <pre class="fs-5 text-justify fw-bold ktn-float">KETIGA :</pre>
        <p class="fs-5 text-justify">Pemegang/Pemakai kendaraan dinas bertanggung jawab sepenuhnya terhadap kendaraan dimaksud, sehingga apabila terjadi kerusakan, kehilangan atau penyimpangan penggunaan diluar ketentuan dinas, akan diproses sesuai dengan ketentuan yang berlaku.</p>


        <p class="fs-5 text-justify">Demikian Surat Penunjukan ini dibuat untuk dipergunakan sebagai mana mestinya.</p>


        <p class="fs-5 text-justify text-right">Semarang, ' . tanggalIndo($kendaraan["tanggal"]) . '</p>
        <p class="fs-5 text-justify text-right">' . $kendaraan["jabatan"] . '</p>
        <p class="fs-5 text-justify text-right">Provinsi Jawa Tengah,</p><br><br><br><br>
        <p class="fs-5 text-justify text-right">' . $kendaraan["nama"] . '</p>
        <p class="fs-5 text-justify text-right">' . $kendaraan["pangkat"] . '</p>
        <p class="fs-5 text-justify text-right">NIP. ' . $kendaraan["nip"] . '</p>
    </div>

    <div class="container text-center">
        <img src="img/HitamPutih_Jateng.png" class="img-surat">
        <h5>PEMERINTAH PROVINSI JAWA TENGAH</h5>
        <h4 class="fw-bold">DINAS KELAUTAN DAN PERIKANAN JAWA TENGAH</h4>
        <p class="fs-6">Jalan Imam Bonjol No.134 Semarang Kode Pos 50132 Telepon 024-3546469, 3546607</p>
        <p class="fs-6">Faksimile 024-3551289 Laman http://www.jatengprov.go.id</p>
        <p class="fs-6 fw-bold">Surat Elektronik dkp@jatengprov.go.id</p>
        <hr class="border-1">
    </div>

    <div class="container text-center">
        <p class="fs-5 fw-bold">SURAT PERNYATAAN</p>
    </div>

    <div class="container">
        <p class="fs-5 text-justify">Yang bertanda tangan dibawah ini :</p>
        <pre class="fs-5 text-justify">Nama                   : ' . $kendaraan["namapernyataan"] . '</pre>
        <pre class="fs-5 text-justify">NIP                    : ' . $kendaraan["nippernyataan"] . '</pre>
        <pre class="fs-5 text-justify">Pangkat/Gol            : ' . $kendaraan["pangkatpernyataan"] . '</pre>
        <pre class="fs-5 text-justify">Pekerjaan/ Jabatan     : ' . $kendaraan["pekerjaanpernyataan"] . '</pre>

        <p class="fs-5 text-center">Menyatakan :</p>
        <p class="fs-5 text-justify">1. Bahwa saya akan mematuhi/mentaati segala ketentuan-ketentuan yang tercantum di dalam Surat Penunjukan Pemegang Kendaraan Dinas Milik Dinas Kelautan dan Perikanan Provinsi Jawa Tengah Nomor : ' . $kendaraan["nosurat"] . '.</p>
        <p class="fs-5 text-justify">2. Apabila terjadi mutasi antar jabatan dan ataupun keluar dari Dinas Kelautan dan Perikanan Provinsi Jawa Tengah atau sebab-sebab lain yang berkaitan dengan pemegang/penanggungjawab kendaraan dinas, maka saya berkewajiban menyerahkan kembali tanpa harus diminta kepada Dinas Kelautan dan Perikanan Provinsi Jawa Tengah.</p>
        <p class="fs-5 text-justify">Demikian pernyataan ini saya buat untuk menjadi periksa dan seperlunya.</p>

        <p class="fs-5 text-right">Semarang, ' . tanggalIndo($kendaraan["tanggalpernyataan"]) . '</p>

            <div class="left">  
                <p class="fs-5 text-sejajar text-left">Mengetahui</p>
                <p class="fs-5 text-sejajar text-left">' . $kendaraan["mengetahui"] . '</p>
                <p class="fs-5 text-sejajar text-left">Provinsi Jawa Tengah</p>
                <br class="text-sejajar text-left">
                <br class="text-sejajar text-left">
                <br class="text-sejajar text-left">
                <br class="text-sejajar text-left">
                <p class="fs-5 text-sejajar text-left">' . $kendaraan["namaketahui"] . '</p>
                <p class="fs-5 text-sejajar text-left">' . $kendaraan["golonganketahui"] . '</p>
                <p class="fs-5 text-sejajar text-left">NIP. ' . $kendaraan["nipketahui"] . '</p>
            </div>
            
            <div class="right">
                <p class="fs-5 text-sejajar text-right">Yang Membuat Pernyataan</p>
                <p class="fs-5 text-sejajar text-right">' . $kendaraan["yangpernyataan"] . '</p>
                <br class="text-sejajar text-right">
                <br class="text-sejajar text-right">
                <br class="text-sejajar text-right">
                <br class="text-sejajar text-right">
                <br class="text-sejajar text-right">
                <br class="text-sejajar text-right">
                <p class="fs-5 text-sejajar text-right">' . $kendaraan["namapernyataan"] . '</p>
                <p class="fs-5 text-sejajar text-right">' . $kendaraan["pangkatpernyataan"] . '</p>
                <p class="fs-5 text-sejajar text-right">NIP. ' . $kendaraan["nippernyataan"] . '</p>
                
            </div>

        <!-- Akhir Isi Surat Pernyataan -->


    </div>
';

$html .= '</body>
</html>';

$mpdf->WriteHTML($html);



$mpdf->Output('SuratPenunjukkan.pdf', \Mpdf\Output\Destination::INLINE);
