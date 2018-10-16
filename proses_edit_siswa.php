<?php
include('koneksi.php');

//tangkap data dari form
	$nis = $_POST ['nis'];
    $nama = $_POST ['nama'];
    $alamat = $_POST ['alamat'];
    $jk = $_POST ['jk'];
	$password = $_POST ['password'];
	$nama_ortu = $_POST ['password'];
	$pkjr_ortu = $_POST ['pkjr_ortu'];
	$kode_kelas = $_POST ['kode_kelas'];
	$semester = $_POST ['semester'];
	$thn_ajaran = $_POST ['thn_ajaran'];
	
//update data di database sesuai user_id

$sql = "update siswa set
		nis='$nis',
		nama='$nama',
		alamat='$alamat',
		jk='$jk',
		nama_ortu='$nama_ortu',
		pkjr_ortu='$pkjr_ortu',
		kode_kelas='$kode_kelas',
		semester='$semester',
		thn_ajaran='$thn_ajaran'
		where nis = '$nis'";
		
 $hasil = mysqli_query($kon, $sql);
$bos = mysqli_query($kon, "UPDATE akun set username='$nis', password='$password',  level=2");
if ($hasil  || $bos) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='index.php?act=data_siswa';
	 </script>
<?php
}
?>