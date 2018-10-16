<?php
include('koneksi.php');

$kode_kelas = $_GET['kode_kelas'];

$query = mysqli_query($kon, "select * from kelas where kode_kelas='$kode_kelas'") or die(mysqli_error());

$data = mysqli_fetch_array($query);
?>

<h2>Edit Kelas</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Edit Kelas
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_edit_kelas.php" method="POST">

<div class="form-group">
    <label>Kode kelas</label>
    <input class="form-control" name="kode_kelas" value="<?php echo $data['kode_kelas']; ?>" />
</div>

<div class="form-group">
    <label>Nama Kelas</label>
    <input class="form-control" name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>" />
</div>

<div class="form-group">
    <label>Jumlah Siswa</label>
    <input class="form-control" name="jumlah_siswa" value="<?php echo $data['jumlah_siswa']; ?>" />
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