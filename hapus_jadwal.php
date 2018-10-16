<?php 
include('koneksi.php');

$id_jadwal = $_GET['id_jadwal'];

$query = mysqli_query($kon, "delete from jadwal_pelajaran where id_jadwal='$id_jadwal'") or die(mysqli_error());

if ($query) {
	?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='index.php?act=data_jadwal';
	</script>
	<?php }
?>