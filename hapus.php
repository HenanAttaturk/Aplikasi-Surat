<?php 

require 'functions.php';

$id = $_GET["id_form"];

if ( hapus($id) > 0 ) {
    echo "
    <script> alert('Data Berhasil diHapus!');
            document.location.href = 'daftarcetak.php';
    </script>
    ";
} else {
    echo "
    <script> alert('Data Gagal diHapus!');
            document.location.href = 'daftarcetak.php';
    </script>
    ";
}
