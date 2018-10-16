<?php 
include('koneksi.php');

$kode_kelas = $_GET['kode_kelas'];

$query = mysqli_query($kon, "delete from kelas where kode_kelas='$kode_kelas'") or die(mysqli_error());

if ($query) {
	?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='index.php?act=data_kelas';
	</script>
	<?php }
?>