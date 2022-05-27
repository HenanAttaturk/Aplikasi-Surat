<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';

// --- Ambil Data dari Yang di Inputkan ---
$formCetak = query("SELECT * FROM elektronik");

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


foreach ($formCetak as $elektronik);

$html .= '<div class="container text-center">
<p class="fs-5 fw-bold">SURAT PENUNJUKAN PEMEGANG ELEKTRONIK DINAS</p>
<p class="fs-5 fw-bold">MILIK DINAS KELAUTAN DAN PERIKANAN</p>
<p class="fs-5 fw-bold">PROVINSI JAWA TENGAH</p>
<p class="fs-6 text-center">Nomor : ' . $elektronik["nosurat"] . '</p>
</div>

<div class="container">
    <p class="fs-5 text-justify">Yang bertanda tangan dibawah ini :</p>
    <pre class="fs-5 text-justify">Nama        : ' . $elektronik["nama"] . '</pre>
    <pre class="fs-5 text-justify">NIP         : ' . $elektronik["nip"] . '</pre>
    <pre class="fs-5 text-justify">Pangkat/Gol : ' . $elektronik["pangkat"] . '</pre>
    <pre class="fs-5 text-justify">Jabatan     : ' . $elektronik["jabatan"] . '</pre>

    <p class="fs-5 text-justify fw-bold">MENUNJUK</p>
    <p class="fs-5 text-justify">' . $elektronik["pns"] . ' dengan identitas sebagai berikut :</p>

    <pre class="fs-5 text-justify">Nama        : ' . $elektronik["namaid"] . '</pre>
    <pre class="fs-5 text-justify">NIP         : ' . $elektronik["nipid"] . '</pre>
    <pre class="fs-5 text-justify">Pangkat/Gol : ' . $elektronik["pangkatid"] . '</pre>
    <pre class="fs-5 text-justify">Jabatan     : ' . $elektronik["jabatanid"] . '</pre>

    <p class="fs-5 text-justify">Sebagai pemegang/penanggung jawab elektronik dinas dengan data elektronik sebagai berikut :</p>
    <pre class="fs-5 text-justify">Nomor Polisi                                : ' . $elektronik["nopol"] . '</pre>
    <pre class="fs-5 text-justify">Merk/Tipe                                   : ' . $elektronik["merk"] . '</pre>
    <pre class="fs-5 text-justify">Jenis/Model                                 : ' . $elektronik["jenis"] . '</pre>
    <pre class="fs-5 text-justify">Tahun Pembuatan/Perakitan/Isi Silinder      : ' . $elektronik["tahunbuat"] . '</pre>
    <pre class="fs-5 text-justify">Warna                                       : ' . $elektronik["warna"] . '</pre>
    <pre class="fs-5 text-justify">No. Rangka/NIK/VIN                          : ' . $elektronik["norangka"] . '</pre>
    <pre class="fs-5 text-justify">Nomor Mesin/Nomor Seri                      : ' . $elektronik["nomesin"] . '</pre>
    <pre class="fs-5 text-justify">Nomor BPKB                                  : ' . $elektronik["nobpkb"] . '</pre>

    <p class="fs-5 text-justify">Penunjukan pemegang/penanggung jawab elektronik dinas dilaksanakan dengan ketentuan :</p>

        <pre class="fs-5 text-justify fw-bold ktn-float">PERTAMA :</pre>
        <p class="fs-5 text-justify">Sebagai pemegang/penanggung jawab elektronik dinas dimaksud diwajibkan :</p>
        <p class="fs-5 text-justify sans-serif">                  1.	Memelihara dan merawat elektronik dimaksud agar selalu dalam keadaan baik dan siap pakai;</p>
        <p class="fs-5 text-justify sans-serif">                  2.	Mempergunakan dan mengoperasikan elektronik dimaksud semata-mata hanya untuk keperluan dinas;</p>
        <p class="fs-5 text-justify sans-serif">                  3.	Melaporkan kepada Pejabat yang menujuk, apabila elektronik dimaksud memerlukan perbaikan;</p>
        <p class="fs-5 text-justify sans-serif">                  4.	Bertanggung jawab terhadap kehilangan, kerusakan berat dan atau akibat kecelakaan; dan</p>
        <p class="fs-5 text-justify sans-serif">                  5.	Menyerahkan/mengembalikan kepada Pejabat yang menunjuk, apabila terjadi mutasi/dipindahtugaskan ke tempat lain serta pensiun.</p>

        <pre class="fs-5 text-justify fw-bold ktn-float">KEDUA :</pre>
        <p class="fs-5 text-justify">Sebagai pemegang/penanggung jawab elektronik dinas dimaksud dilarang :</p>
        <p class="fs-5 text-justify sans-serif">                  1.	Meminjamkan elektronik dimaksud kepada pihak lain;</p>
        <p class="fs-5 text-justify sans-serif">                  2.	Mempergunakan dan mengoperasikan elektronik dimaksud untuk keperluan lain selain keperluan dinas;</p>
        <p class="fs-5 text-justify sans-serif">                  3.	Menjadikan elektronik dimaksud sebagai jaminan hutang; dan</p>
        <p class="fs-5 text-justify sans-serif">                  4.	Membiarkan elektronik dimaksud tidak terpelihara (diterlantarkan) diletakkan dilokasi yang tidak aman atau kurang terlindung.</p>

        
        <pre class="fs-5 text-justify fw-bold ktn-float">KETIGA :</pre>
        <p class="fs-5 text-justify">Pemegang/Pemakai elektronik dinas bertanggung jawab sepenuhnya terhadap elektronik dimaksud, sehingga apabila terjadi kerusakan, kehilangan atau penyimpangan penggunaan diluar ketentuan dinas, akan diproses sesuai dengan ketentuan yang berlaku.</p>


        <p class="fs-5 text-justify">Demikian Surat Penunjukan ini dibuat untuk dipergunakan sebagai mana mestinya.</p>


        <p class="fs-5 text-justify text-right">Semarang, ' . tanggalIndo($elektronik["tanggal"]) . '</p>
        <p class="fs-5 text-justify text-right">' . $elektronik["jabatan"] . '</p>
        <p class="fs-5 text-justify text-right">Provinsi Jawa Tengah,</p><br><br><br><br>
        <p class="fs-5 text-justify text-right">' . $elektronik["nama"] . '</p>
        <p class="fs-5 text-justify text-right">' . $elektronik["pangkat"] . '</p>
        <p class="fs-5 text-justify text-right">NIP. ' . $elektronik["nip"] . '</p>
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
        <pre class="fs-5 text-justify">Nama                   : ' . $elektronik["namapernyataan"] . '</pre>
        <pre class="fs-5 text-justify">NIP                    : ' . $elektronik["nippernyataan"] . '</pre>
        <pre class="fs-5 text-justify">Pangkat/Gol            : ' . $elektronik["pangkatpernyataan"] . '</pre>
        <pre class="fs-5 text-justify">Pekerjaan/ Jabatan     : ' . $elektronik["pekerjaanpernyataan"] . '</pre>

        <p class="fs-5 text-center">Menyatakan :</p>
        <p class="fs-5 text-justify">1. Bahwa saya akan mematuhi/mentaati segala ketentuan-ketentuan yang tercantum di dalam Surat Penunjukan Pemegang Kendaraan Dinas Milik Dinas Kelautan dan Perikanan Provinsi Jawa Tengah Nomor : ' . $elektronik["nosurat"] . '.</p>
        <p class="fs-5 text-justify">2. Apabila terjadi mutasi antar jabatan dan ataupun keluar dari Dinas Kelautan dan Perikanan Provinsi Jawa Tengah atau sebab-sebab lain yang berkaitan dengan pemegang/penanggungjawab elektronik dinas, maka saya berkewajiban menyerahkan kembali tanpa harus diminta kepada Dinas Kelautan dan Perikanan Provinsi Jawa Tengah.</p>
        <p class="fs-5 text-justify">Demikian pernyataan ini saya buat untuk menjadi periksa dan seperlunya.</p>

        <p class="fs-5 text-right">Semarang, ' . tanggalIndo($elektronik["tanggalpernyataan"]) . '</p>

            <div class="left">  
                <p class="fs-5 text-sejajar text-left">Mengetahui</p>
                <p class="fs-5 text-sejajar text-left">' . $elektronik["mengetahui"] . '</p>
                <p class="fs-5 text-sejajar text-left">Provinsi Jawa Tengah</p>
                <br class="text-sejajar text-left">
                <br class="text-sejajar text-left">
                <br class="text-sejajar text-left">
                <br class="text-sejajar text-left">
                <p class="fs-5 text-sejajar text-left">' . $elektronik["namaketahui"] . '</p>
                <p class="fs-5 text-sejajar text-left">' . $elektronik["golonganketahui"] . '</p>
                <p class="fs-5 text-sejajar text-left">NIP. ' . $elektronik["nipketahui"] . '</p>
            </div>
            
            <div class="right">
                <p class="fs-5 text-sejajar text-right">Yang Membuat Pernyataan</p>
                <p class="fs-5 text-sejajar text-right">' . $elektronik["yangpernyataan"] . '</p>
                <br class="text-sejajar text-right">
                <br class="text-sejajar text-right">
                <br class="text-sejajar text-right">
                <br class="text-sejajar text-right">
                <br class="text-sejajar text-right">
                <br class="text-sejajar text-right">
                <p class="fs-5 text-sejajar text-right">' . $elektronik["namapernyataan"] . '</p>
                <p class="fs-5 text-sejajar text-right">' . $elektronik["pangkatpernyataan"] . '</p>
                <p class="fs-5 text-sejajar text-right">NIP. ' . $elektronik["nippernyataan"] . '</p>
                
            </div>

        <!-- Akhir Isi Surat Pernyataan -->


    </div>
';

$html .= '</body>
</html>';

$mpdf->WriteHTML($html);



$mpdf->Output('SuratPenunjukkanElektronik.pdf', \Mpdf\Output\Destination::INLINE);
