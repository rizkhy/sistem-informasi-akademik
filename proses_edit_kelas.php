<?php
include('koneksi.php');

//tangkap data dari form
	$kode_kelas = $_POST ['kode_kelas'];
    $nama_kelas = $_POST ['nama_kelas'];
    $jumlah_siswa = $_POST ['jumlah_siswa'];
	
//update data di database sesuai user_id

$sql = "update kelas set
		kode_kelas='$kode_kelas',
		nama_kelas='$nama_kelas',
		jumlah_siswa='$jumlah_siswa'
		where kode_kelas = '$kode_kelas'";
		
 $hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='index.php?act=data_kelas';
	 </script>
<?php
}
?>