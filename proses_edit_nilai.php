<?php
include('koneksi.php');

//tangkap data dari form
	$kode_nilai = $_POST ['kode_nilai'];
    $nis = $_POST ['nis'];
    $kode_mp = $_POST ['kode_mp'];
	$nilai_uts = $_POST ['nilai_uts'];
	$nilai_uas = $_POST ['nilai_uas'];
	$nilai_akhir = $_POST ['nilai_akhir'];
	$semester = $_POST ['semester'];
	
//update data di database sesuai user_id

$sql = "update nilai set
		kode_nilai='$kode_nilai',
		nis='$nis',
		kode_mp='$kode_mp',
		nilai_uts='$nilai_uts',
		nilai_uas='$nilai_uas',
		nilai_akhir='$nilai_akhir',
		semester='$semester'
		where kode_nilai = '$kode_nilai'";
		
 $hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='index.php?act=data_nilai';
	 </script>
<?php
}
?>