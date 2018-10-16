<?php
include('koneksi.php');

//tangkap data dari form
	$id_jadwal = $_POST ['id_jadwal'];
    $kode_mp = $_POST ['kode_mp'];
    $jam = $_POST ['jam'];
    $kode_kelas = $_POST ['kode_kelas'];
	$guru = $_POST ['guru'];
	$hari = $_POST ['hari'];
	$semester = $_POST ['semester'];
	$thn_ajaran = $_POST ['thn_ajaran'];
	
//update data di database sesuai user_id

$sql = "update jadwal_pelajaran set
		id_jadwal='$id_jadwal',
		kode_mp='$kode_mp',
		jam='$jam',
		kode_kelas='$kode_kelas',
		hari='$hari',
		semester='$semester',
		thn_ajaran='$thn_ajaran'
		where id_jadwal = '$id_jadwal'";
		
 $hasil = mysqli_query($kon, $sql);
$sql2 = "UPDATE mengajar nip='$guru', kode_mp='$kode_mp', kode_kelas='$kode_kelas'";
$bos = mysqli_query($kon, $sql2);
    if(!$hasil || !$bos) { ?>

	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='index.php?act=data_jadwal';
	</script>
<?php
}
?>