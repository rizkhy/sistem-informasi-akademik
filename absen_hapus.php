<?php
include "koneksi.php";

//print_r($_POST); exit();

$kode_kelas   = $_GET['kelas'];
  $nis        = $_GET['nis'];
  // $presensi   = $_GET['id'];
  // $tanggal    = $_GET['tanggal'];
  $kode_mp    = $_GET['kode_mp'];
  $semester   = $_GET['semester'];
  $thn_ajaran = $_GET['tahun'];


$query = "DELETE FROM presensi WHERE nis = '$nis' AND kode_mp = '$kode_mp' AND semester = '$semester' AND thn_ajaran = '$thn_ajaran'";
// echo $query;

$hasil = mysqli_query($kon, $query);

if ($hasil) { 
	
echo '<script>document.location.href="index.php?act=absen_rincian&nis='.$nis.'&kelas='.$kode_kelas.'"</script>';
}
?>
