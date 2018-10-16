<?php
include "koneksi.php";

$kelas = $_GET['kelas'];
$idsiswa = $_GET['nis'];
$idmapel = $_GET['kode_mp'];
$semester = $_GET['semester'];
$tahun = $_GET['tahun_ajaran'];

$query = "DELETE FROM nilai WHERE nis = '$idsiswa' AND kode_mp = '$idmapel' AND semester = '$semester' AND tahun_ajaran = '$tahun'";
// echo $query;
$hasil = mysqli_query($kon, $query);

if ($hasil) { 
	echo '<script>document.location.href="index.php?act=nilai_rincian&nis='.$idsiswa.'&kelas='.$kelas.'"</script>';
}
?>