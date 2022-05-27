<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';



// --- Ambil Data dari Yang di Inputkan ---
$formCetak = query("SELECT * FROM surat WHERE id_form = $id");

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 330]]);

$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);



$stylesheet = file_get_contents('css/style_cetak.css');

$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);

// --- Deklarasi HTML ---
$html = '<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="icon" href="img/logo/jateng.png">

    <title>Pemeliharaan Kendaraan</title>
    <link rel="stylesheet" href="css/style_cetak.css">
</head>
<body>

    <div class="container">
        <img src="img/logo/HitamPutih_Jateng.png" alt="DKP Jateng" class="img-responsive img-title">
        <h1 class="text-center">PEMERINTAH PROVINSI JAWA TENGAH</h1>
    </div>';

foreach ($formCetak as $surat);

$html .= '<section class="tabel" id="tabel">
<div class="container">
    <table border="1">
        <!-- Data Kolom Pertama -->

        <tr>
        <td rowspan="6" colspan="12">
        <pre class="pre-surat small">SKPD/BADAN/DINAS/KANTOR  : DINAS KELAUTAN DAN PERIKANAN JAWA TENGAH</pre>
        <pre class="pre-surat">TAHUN ANGGARAN              : ' . $surat["tahun_anggaran"] . '</pre>
        <pre class="text-center pre-surat fw-under">SURAT BUKTI PENGELUARAN</pre>
        <pre class="pre-surat">Dibayarkan Kepada           : ' . $surat["dibayarkan"] . '</pre>
        <pre class="pre-surat">Uang Sejumlah Rp.           : ' . number_format($surat["uang_jumlah"]) . '</pre>
        <pre class="pre-surat fw-bold">             : ' . terbilang($surat["uang_jumlah"]) . '</pre>
        <pre class="pre-surat">Yaitu untuk pembayaran  : ' . $surat["untuk_pembayaran"] . '</pre>
        <pre class="pre-surat">Untuk Pekerjaan/Keperluan   : ' . $surat["untuk_keperluan"] . '</pre>
        <pre class="pre-surat">Kode Rek. / Kegiatan        : ' . $surat["kode_rekening"] . '</pre>
        <pre class="text-right pre-surat">                  Semarang, ' . tanggalIndo($surat["tanggal_terima"]) . '

                    Yang berhak menerima
                        Pembayaran
                        
                    
                    
                        </pre>
    </td>
            <td colspan="6" class="text-center">
                <p>KETERANGAN</p>
            </td>
        </tr>



        <tr>
            <td colspan="6" class="fs-8">
                Barang-barang termaksud telah masuk buku Persediaan / Inventaris pada tanggal ' . tanggalIndo($surat["tanggal_inventaris"]) . '
            </td>
        </tr>

        <tr>
            <th colspan="2" class="text-center">Jumlah Kotor</th>
            <th colspan="2" class="text-center">Pajak</th>
            <th colspan="2" class="text-center">Jumlah Bersih</th>
        </tr>

        <tr>
            <td colspan="2" class="text-center">' . $surat["jumlah_kotor"] . '</td>
            <td colspan="2" class="text-center">' . $surat["pajak"] . '</td>
            <td colspan="2" class="text-center">' . $surat["jumlah_bersih"] . '</td>
        </tr>

        <tr>
            <td colspan="6" class="fs-8">Yang menerima barang / memeriksa pekerjaan tersebut di atas : <br><br><br><br><br><br></td>
        </tr>

        <tr>
            <td colspan="6" class="text-center smaller">' . $surat["yang_menerima"] . '</td>
        </tr>

        <tr>
            <td colspan="6" class="text-center small">Bendahara Pengeluaran</td>
            <td colspan="6" class="text-center small">Pengguna Anggaran</td>
            <td class="text-center small" colspan="6">Pejabat Pelaksana Teknis Kegiatan (PPTK)</td>
        </tr>

        <tr>
            <td colspan="6"><br><br><br><br></td>
            <td colspan="6"><br><br><br><br></td>
            <td colspan="6"><br><br><br><br></td>
        </tr>

        <tr>
            <td colspan="6" class="text-center smaller">' . $surat["nama_bendahara"] . '</td>
            <td colspan="6" class="text-center smaller">' . $surat["nama_pengguna"] . '</td>
            <td class="text-center" colspan="6" smaller>' . $surat["nama_pelaksana"] . '</td>
        </tr>

        <tr>
            <td colspan="6" class="text-center smaller">NIP. ' . $surat["nip_bendahara"] . '</td>
            <td colspan="6" class="text-center smaller">NIP. ' . $surat["nip_pengguna"] . '</td>
            <td class="text-center smaller" colspan="6">NIP. ' . $surat["nip_pelaksana"] . '</td>
        </tr>





    </table>
</div>
</section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>';

$html .= '</body>
</html>';

$mpdf->WriteHTML($html);



$mpdf->Output('SuratPemeliharaan.pdf', \Mpdf\Output\Destination::INLINE);
