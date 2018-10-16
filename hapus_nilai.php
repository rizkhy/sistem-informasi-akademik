<?php 
include('koneksi.php');

$kode_nilai = $_GET['kode_nilai'];

$query = mysqli_query($kon, "delete from nilai where kode_nilai='$kode_nilai'") or die(mysqli_error());

if ($query) {
	?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='index.php?act=data_nilai';
	</script>
	<?php }
?>