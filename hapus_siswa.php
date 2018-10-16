<?php 
include('koneksi.php');

$nis = $_GET['nis'];

$query = mysqli_query($kon, "delete from siswa where nis='$nis'") or die(mysqli_error());
$bos = mysqli_query($kon, "delete from akun where username='$nis'") or die(mysqli_error());

if ($query || $bos) {
	?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='index.php?act=data_siswa';
	</script>
	<?php }
?>