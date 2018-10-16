<?php
include('koneksi.php');

//tangkap data dari form
	$id_buku = $_POST ['id_buku'];
    $judul = $_POST ['judul'];
    $pengarang = $_POST ['pengarang'];
    $penerbit = $_POST ['penerbit'];
    $tahun_terbit = $_POST ['tahun_terbit'];
    $isbn = $_POST ['isbn'];
    $jumlah_buku = $_POST ['jumlah_buku'];
    $lokasi = $_POST ['lokasi'];
    $tgl_buku_masuk = $_POST ['tgl_buku_masuk'];

//update data di database sesuai user_id

$sql = "update buku set
		id_buku='$id_buku',
		judul='$judul',
		pengarang='$pengarang',
		penerbit='$penerbit',
		tahun_terbit='$tahun_terbit',
		isbn='$isbn',
		jumlah_buku='$jumlah_buku',
		lokasi='$lokasi',
		tgl_buku_masuk='$tgl_buku_masuk'
		where id_buku = '$id_buku'";
		
 $hasil = mysqli_query($kon, $sql);

if ($hasil) { ?>
	
	<script language="JavaScript">
		alert('Anda Berhasil Mengubah Data');
	 	window.location='index.php?act=data_buku';
	 </script>
<?php
}
?>