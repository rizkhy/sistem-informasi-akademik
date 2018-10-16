<?php
include('koneksi.php');

//tangkap data dari form
	$nip = $_POST ['nip'];
    $nama = $_POST ['nama'];
    $password = $_POST ['password'];
    $alamat = $_POST ['alamat'];
	
//update data di database sesuai user_id

$sql = "update guru set
		nip='$nip',
		nama='$nama',
		alamat='$alamat'
		where nip = '$nip'";
		
 $hasil = mysqli_query($kon, $sql);
$bos = mysqli_query($kon, "UPDATE akun set username='$nip', password='$password',  level=1");
if ($hasil || $bos) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='index.php?act=data_guru';
	 </script>
<?php
}
?>