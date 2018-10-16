<?php
include "koneksi.php";

//print_r($_POST); exit();

$kode_kelas = $_POST['kode_kelas'];
$tanggal    = $_POST['tanggal'];
$kode_mp    = $_POST['kode_mp'];
$semester   = $_POST['semester'];
$thn_ajaran = $_POST['thn_ajaran'];
$nis 		= $_POST['nis'];
$presensi 	= $_POST['presensi'];


$query = "UPDATE presensi 
		  SET Keterangan = '$presensi' 
		  WHERE kode_mp = '$kode_mp' AND tanggal = '$tanggal' AND nis = '$nis'";

// echo $query;
$hasil = mysqli_query($kon, $query);

if ($hasil) { 
	
echo '<script>document.location.href="index.php?act=absen_rincian&nis='.$nis.'&kelas='.$kode_kelas.'"</script>';
}
?>
