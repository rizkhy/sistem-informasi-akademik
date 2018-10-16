<?php 
include('koneksi.php');

$nip = $_GET['nip'];

$query = mysqli_query($kon, "delete from guru where nip='$nip'") or die(mysqli_error());
$bos = mysqli_query($kon, "delete from akun where username='$nip'") or die(mysqli_error());

if ($query || $bos) {
	?>
	<script language="JavaScript">
		alert('Anda Berhasil Menghapus Data');
	 	window.location='index.php?act=data_guru';
	</script>
	<?php }
?>