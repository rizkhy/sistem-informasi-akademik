<?php
include "koneksi.php";

//print_r($_POST); exit();

$kode_kelas = $_POST['kode_kelas'];
$tanggal  = $_POST['tanggal'];
$kode_mp = $_POST['kode_mp'];
$semester = $_POST['semester'];
$thn = $_POST['thn_ajaran'];
$nis = $_POST['nis'];

foreach ($_POST['presensi'] as $nis=>$ket) {
   $query = "insert into presensi (nis, kode_mp, tanggal, semester, Keterangan, thn_ajaran, kode_kelas) values($nis, $kode_mp, '$tanggal', '$semester', '$ket', '$thn', $kode_kelas)";
   $hasil = mysqli_query($kon, $query);
}

 echo '<script>document.location.href="index.php?act=absen"</script>';
?>
