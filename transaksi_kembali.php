<?php

$id_transaksi = $_GET['id_transaksi'];
$judul = $_GET['judul'];

 include "koneksi.php";

 $query = mysqli_query($kon, "update transaksi, buku set transaksi.status ='Kembali', buku.jumlah_buku = (jumlah_buku+1) 
 								where transaksi.id_transaksi='$id_transaksi' AND buku.id_buku") or die(mysqli_error());
?>
	<script type="text/javascript">
		alert("Proses Pengembalian Berhasil");
		window.location.href = "?act=transaksi";
	</script>
