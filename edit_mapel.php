<?php
include('koneksi.php');

$kode_mp = $_GET['kode_mp'];

$query = mysqli_query($kon, "select * from mata_pelajaran where kode_mp='$kode_mp'") or die(mysqli_error());

$data = mysqli_fetch_array($query);
?>

<h2>Edit Mata Pelajaran</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Edit Mata Pelajaran
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_edit_mapel.php" method="POST">

<div class="form-group">
    <label>Kode Mata Pelajaran</label>
    <input class="form-control" name="kode_mp" value="<?php echo $data['kode_mp']; ?>" />
</div>

<div class="form-group">
    <label>Nama Mata Pelajaran</label>
    <input class="form-control" name="nama_mp" value="<?php echo $data['nama_mp']; ?>" />
</div>

<div class="form-group">
    <label>KKM</label>
    <input class="form-control" name="kkm" value="<?php echo $data['KKM']; ?>" />
</div>

<div>
    <input type="submit" value="Simpan" name="simpan" class="btn btn-success">
    <input onclick="window.history.back()" type="reset" class="btn btn-warning" value="Batal">
</div>

</form>
</div>
</div>
</div>
</div>