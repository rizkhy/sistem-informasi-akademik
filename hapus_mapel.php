<?php 
include('koneksi.php');

$kode_mp = $_GET['kode_mp'];

$query = mysqli_query($kon, "delete from mata_pelajaran where kode_mp='$kode_mp'") or die(mysqli_error());

if ($query) {
	?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='index.php?act=data_mata_pelajaran';
	</script>
	<?php }
?>