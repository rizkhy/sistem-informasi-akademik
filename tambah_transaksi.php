<?php

include "koneksi.php"; 

$sql="select * from anggota order by nis";
$result=mysqli_query($kon,$sql) or die('Error');
$anggota=mysqli_query($kon, $sql) ;

$sql="select * from buku order by id_buku";
$result=mysqli_query($kon,$sql) or die('Error');
$buku=mysqli_query($kon, $sql) ;


$tgl_pinjam = date("d-m-Y");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$Kembali = date("d-m-Y", $tujuh_hari);
?>
<h2>Transaksi Pinjam</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Transaksi Pinjam
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_tambah_transaksi.php" method="POST">

<div class="form-group">
    <label>Judul Buku</label>
    <select class="form-control" name="judul" />
        <?php
            while($data = mysqli_fetch_assoc($buku)){ 
                echo "<option value='$data[judul]'>$data[judul]</option>";
            }
        ?>
    </select> 
</div>

<div class="form-group">
    <label>Nama Peminjam</label>
    <select class="form-control" name="nama" />
        <?php
            while($data = mysqli_fetch_assoc($anggota)){ 
                echo "<option value='$data[nis]-$data[nama_anggota]'>$data[nis]-$data[nama_anggota]</option>";
            }
        ?>
    </select> 
</div>

<div class="form-group">
    <label>Tanggal Pinjam</label>
    <input class="form-control" name="tgl_pinjam" value="<?php echo $tgl_pinjam; ?>" readonly />
</div>

<div class="form-group">
    <label>Tanggal Kembali</label>
    <input class="form-control" name="tgl_kembali" value="<?php echo $Kembali; ?>" readonly />
</div>

<div class="form-group">
    <input class="form-control" name="status" value="Pinjam" readonly />
</div>


<div>
    <input type="submit" value="Pinjam" name="simpan" class="btn btn-success">
    <input type="reset" class="btn btn-warning" value="Batal">
</div>

</form>
</div>
</div>
</div>
</div>