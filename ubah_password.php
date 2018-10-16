<?php
session_start();
include "koneksi.php";

$baru = $_POST['p_baru'];

$sql = "UPDATE akun SET password='$baru' WHERE username = '$_SESSION[username]'";

$sql1 = mysqli_query($kon, $sql);
echo "<script>alert('Password sudah diganti ^_^ ')</script>";
?>
<script>document.location.href="index.php?act=profil"</script>