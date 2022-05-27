<?php

require 'functions.php';

$id = $_GET["id"];

if (hapusElektronik($id) > 0) {
    echo "
    <script> alert('Data Berhasil diHapus!');
            document.location.href = 'daftarcetakelektronik.php';
    </script>
    ";
} else {
    echo "
    <script> alert('Data Gagal diHapus!');
            document.location.href = 'daftarcetakelektronik.php';
    </script>
    ";
}
