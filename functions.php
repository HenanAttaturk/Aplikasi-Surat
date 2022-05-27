<?php

// --- Koneksi pada Database ---
$conn = mysqli_connect("localhost", "root", "", "form_cetak");

// --- Ambil Data Pada Database form-cetak ---
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// --- Menambahkan Data untuk Dicetak menjadi Output Surat ---
function tambah($data)
{
    global $conn;
    $ta = htmlspecialchars($data["tahun_anggaran"]);
    $dibayarkan = htmlspecialchars($data["dibayarkan"]);
    $uangJumlah = htmlspecialchars($data["uang_jumlah"]);
    $untukPembayaran = htmlspecialchars($data["untuk_pembayaran"]);
    $untukKeperluan = htmlspecialchars($data["untuk_keperluan"]);
    $kode = htmlspecialchars($data["kode_rekening"]);
    $tanggalTerima = htmlspecialchars($data["tanggal_terima"]);
    $tanggalInventaris = htmlspecialchars($data["tanggal_inventaris"]);
    $jumlahKotor = htmlspecialchars($data["jumlah_kotor"]);
    $pajak = htmlspecialchars($data["pajak"]);
    $jumlahBersih = htmlspecialchars($data["jumlah_bersih"]);
    $yangMenerima = htmlspecialchars($data["yang_menerima"]);
    $namaBendahara = htmlspecialchars($data["nama_bendahara"]);
    $nipBendahara = htmlspecialchars($data["nip_bendahara"]);
    $namaPengguna = htmlspecialchars($data["nama_pengguna"]);
    $nipPengguna = htmlspecialchars($data["nip_pengguna"]);
    $namaPelaksana = htmlspecialchars($data["nama_pelaksana"]);
    $nipPelaksana = htmlspecialchars($data["nip_pelaksana"]);

    // query insert data
    $query = "INSERT INTO surat VALUES
     ('','$ta', '$dibayarkan', '$uangJumlah', '$untukPembayaran', '$untukKeperluan', '$kode', '$tanggalTerima', '$tanggalInventaris', '$jumlahKotor', '$pajak', '$jumlahBersih', '$yangMenerima', '$namaBendahara', '$nipBendahara', '$namaPengguna', '$nipPengguna', '$namaPelaksana', '$nipPelaksana')";
    mysqli_query($conn, $query);

    // mengembalikan nilai fungsi
    return mysqli_affected_rows($conn);
}

// --- Menghapus Data ---
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM surat WHERE id_form = $id");

    return mysqli_affected_rows($conn);
}

// --- Ubah Data ---
function ubah($data)
{
    global $conn;

    $id = $data["id_form"];
    $dibayarkan = htmlspecialchars($data["dibayarkan"]);
    $untukPembayaran = htmlspecialchars($data["untuk_pembayaran"]);
    $uangJumlah = htmlspecialchars($data["uang_jumlah"]);
    $jumlahKotor = htmlspecialchars($data["jumlah_kotor"]);
    $pajak = htmlspecialchars($data["pajak"]);
    $jumlahBersih = htmlspecialchars($data["jumlah_bersih"]);

    // query ubah data
    $query = "UPDATE surat SET
                dibayarkan = '$dibayarkan',
                untuk_pembayaran = '$untukPembayaran',
                uang_jumlah = '$uangJumlah',
                jumlah_kotor = '$jumlahKotor',
                pajak = '$pajak',
                jumlah_bersih = '$jumlahBersih'
            WHERE id_form = $id
            ";


    mysqli_query($conn, $query);

    // mengembalikan nilai fungsi
    return mysqli_affected_rows($conn);
}


// *---* Membuat Fungsi Terbilang Secara Otomatis *---*
function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}


// **---** Membuat Format Tanggal Indonesia **---**
function tanggalIndo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}


function tambahKendaraan($data)
{

    global $conn;

    $nosurat = htmlspecialchars($data["nosurat"]);
    $nama = htmlspecialchars($data["nama"]);
    $nip = htmlspecialchars($data["nip"]);
    $pangkat = htmlspecialchars($data["pangkat"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $pns = htmlspecialchars($data["pns"]);
    $namaid = htmlspecialchars($data["namaid"]);
    $nipid = htmlspecialchars($data["nipid"]);
    $pangkatid = htmlspecialchars($data["pangkatid"]);
    $jabatanid = htmlspecialchars($data["jabatanid"]);
    $nopol = htmlspecialchars($data["nopol"]);
    $merk = htmlspecialchars($data["merk"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $tahunbuat = htmlspecialchars($data["tahunbuat"]);
    $warna = htmlspecialchars($data["warna"]);
    $norangka = htmlspecialchars($data["norangka"]);
    $nomesin = htmlspecialchars($data["nomesin"]);
    $nobpkb = htmlspecialchars($data["nobpkb"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $namapernyataan = htmlspecialchars($data["namapernyataan"]);
    $nippernyataan = htmlspecialchars($data["nippernyataan"]);
    $pangkatpernyataan = htmlspecialchars($data["pangkatpernyataan"]);
    $pekerjaanpernyataan = htmlspecialchars($data["pekerjaanpernyataan"]);
    $tanggalpernyataan = htmlspecialchars($data["tanggalpernyataan"]);
    $mengetahui = htmlspecialchars($data["mengetahui"]);
    $namaketahui = htmlspecialchars($data["namaketahui"]);
    $golonganketahui = htmlspecialchars($data["golonganketahui"]);
    $nipketahui = htmlspecialchars($data["nipketahui"]);
    $yangpernyataan = htmlspecialchars($data["yangpernyataan"]);


    // query insert data
    $query = "INSERT INTO kendaraan VALUES
     ('','$nosurat', '$nama', '$nip', '$pangkat', '$jabatan', '$pns', '$namaid', '$nipid', '$pangkatid', '$jabatanid', '$nopol', '$merk', '$jenis', '$tahunbuat', '$warna', '$norangka', '$nomesin', '$nobpkb', '$tanggal', '$namapernyataan', '$nippernyataan', '$pangkatpernyataan', '$pekerjaanpernyataan', '$tanggalpernyataan', '$mengetahui', '$namaketahui', '$golonganketahui', '$nipketahui', '$yangpernyataan')";
    mysqli_query($conn, $query);

    // mengembalikan nilai fungsi
    return mysqli_affected_rows($conn);
}

// --- Menghapus Data ---
function hapusKendaraan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kendaraan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function tambahElektronik($data)
{

    global $conn;

    $nosurat = htmlspecialchars($data["nosurat"]);
    $nama = htmlspecialchars($data["nama"]);
    $nip = htmlspecialchars($data["nip"]);
    $pangkat = htmlspecialchars($data["pangkat"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $pns = htmlspecialchars($data["pns"]);
    $namaid = htmlspecialchars($data["namaid"]);
    $nipid = htmlspecialchars($data["nipid"]);
    $pangkatid = htmlspecialchars($data["pangkatid"]);
    $jabatanid = htmlspecialchars($data["jabatanid"]);
    $nopol = htmlspecialchars($data["nopol"]);
    $merk = htmlspecialchars($data["merk"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $tahunbuat = htmlspecialchars($data["tahunbuat"]);
    $warna = htmlspecialchars($data["warna"]);
    $norangka = htmlspecialchars($data["norangka"]);
    $nomesin = htmlspecialchars($data["nomesin"]);
    $nobpkb = htmlspecialchars($data["nobpkb"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $namapernyataan = htmlspecialchars($data["namapernyataan"]);
    $nippernyataan = htmlspecialchars($data["nippernyataan"]);
    $pangkatpernyataan = htmlspecialchars($data["pangkatpernyataan"]);
    $pekerjaanpernyataan = htmlspecialchars($data["pekerjaanpernyataan"]);
    $tanggalpernyataan = htmlspecialchars($data["tanggalpernyataan"]);
    $mengetahui = htmlspecialchars($data["mengetahui"]);
    $namaketahui = htmlspecialchars($data["namaketahui"]);
    $golonganketahui = htmlspecialchars($data["golonganketahui"]);
    $nipketahui = htmlspecialchars($data["nipketahui"]);
    $yangpernyataan = htmlspecialchars($data["yangpernyataan"]);


    // query insert data
    $query = "INSERT INTO elektronik VALUES
     ('','$nosurat', '$nama', '$nip', '$pangkat', '$jabatan', '$pns', '$namaid', '$nipid', '$pangkatid', '$jabatanid', '$nopol', '$merk', '$jenis', '$tahunbuat', '$warna', '$norangka', '$nomesin', '$nobpkb', '$tanggal', '$namapernyataan', '$nippernyataan', '$pangkatpernyataan', '$pekerjaanpernyataan', '$tanggalpernyataan', '$mengetahui', '$namaketahui', '$golonganketahui', '$nipketahui', '$yangpernyataan')";
    mysqli_query($conn, $query);

    // mengembalikan nilai fungsi
    return mysqli_affected_rows($conn);
}

// --- Menghapus Data ---
function hapusElektronik($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM elektronik WHERE id = $id");

    return mysqli_affected_rows($conn);
}
