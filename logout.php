<?php
session_start();
include "koneksi.php"; 
session_destroy();	

    echo "<script>alert('Anda telah berhasil keluar.'); window.location = 'login.php'</script>";
?>