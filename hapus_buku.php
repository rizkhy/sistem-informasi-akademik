<?php 
include('koneksi.php');

$id_buku = $_GET['id_buku'];

$query = mysqli_query($kon, "delete from buku where id_buku='$id_buku'") or die(mysqli_error());

if ($query) {
	?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='index.php?act=data_buku';
	</script>
	<?php }
?>