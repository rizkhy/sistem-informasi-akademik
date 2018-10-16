<?php
include('koneksi.php');

$id_buku = $_GET['id_buku'];

$query = mysqli_query($kon, "select * from buku where id_buku='$id_buku'") or die(mysqli_error());

$data = mysqli_fetch_array($query);
?>

<h2>Edit Buku</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Edit Buku
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_edit_buku.php" method="POST">

<div class="form-group">
    <label>ID Buku</label>
    <input class="form-control" name="id_buku" value="<?php echo $data['id_buku']; ?>" />
</div>

<div class="form-group">
    <label>Judul Buku</label>
    <input class="form-control" name="judul" value="<?php echo $data['judul']; ?>" />
</div>

<div class="form-group">
    <label>Pengarang</label>
    <input class="form-control" name="pengarang" value="<?php echo $data['pengarang']; ?>" />
</div>

<div class="form-group">
    <label>Penerbit</label>
    <input class="form-control" name="penerbit" value="<?php echo $data['penerbit']; ?>" />
</div>

<div class="form-group">
    <label>Tahun Terbit</label>
    <select class="form-control" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" >
    <?php

        $tahun = date("Y");

        for ($i = $tahun - 29; $i <= $tahun; $i++){
            echo '

                <option value="'.$i.'">'.$i.'</option>

            ';
        }
        ?>
        
    </select> 
</div>

<div class="form-group">
    <label>ISBN</label>
    <input class="form-control" name="isbn" value="<?php echo $data['isbn']; ?>" />
</div>

<div class="form-group">
    <label>Jumlah Buku</label>
    <input class="form-control" name="jumlah_buku" value="<?php echo $data['jumlah_buku']; ?>" />
</div>

<div class="form-group">
    <label>Lokasi Buku</label>
    <input class="form-control" name="lokasi" value="<?php echo $data['lokasi']; ?>" />
</div>

<div class="form-group">
    <label>Tanggal Buku Masuk</label>
    <input class="form-control" name="tgl_buku_masuk" type="date"  value="<?php echo $data['tgl_buku_masuk']; ?>" />
</div>

<div>
    <input type="submit" value="Simpan" name="simpan" class="btn btn-success">
    <input type="reset" class="btn btn-warning" value="Batal">
</div>

</form>
</div>
</div>
</div>
</div>