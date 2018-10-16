<?php
include('koneksi.php');

//tangkap data dari form
	$nip = $_POST ['nip'];
    $nama = $_POST ['nama'];
	$password = $_POST ['password'];
	
//update data di database sesuai user_id

$sql = "update tata_usaha set
		nip='$nip',
		nama='$nama'
		where nip = '$nip'";
		
 $hasil = mysqli_query($kon, $sql);
$bos = mysqli_query($kon, "UPDATE akun set username='$nip', password='$password',  level=3");
if ($hasil  || $bos) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='index.php?act=data_tata_usaha';
	 </script>
<?php
}
?>