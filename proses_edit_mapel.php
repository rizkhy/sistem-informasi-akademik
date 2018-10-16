<?php
include('koneksi.php');

//tangkap data dari form
	$kode_mp = $_POST ['kode_mp'];
    $nama_mp = $_POST ['nama_mp'];
    $KKM = $_POST ['kkm'];
	
//update data di database sesuai user_id

$sql = "update mata_pelajaran set
		kode_mp='$kode_mp',
		nama_mp='$nama_mp',
		kkm='$KKM'
		where kode_mp = '$kode_mp'";
		
 $hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='index.php?act=data_mata_pelajaran';
	 </script>
<?php
}
?>