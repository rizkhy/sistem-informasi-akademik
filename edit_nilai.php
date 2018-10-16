<?php
include('koneksi.php');

$kode_nilai = $_GET['kode_nilai'];

$query = mysqli_query($kon, "select * from nilai where kode_nilai='$kode_nilai'") or die(mysqli_error());

$data = mysqli_fetch_array($query);
?>


<h2>Tambah Buku</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Tambah Buku
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_edit_nilai.php" method="POST">

<div class="form-group">
    <label>kode nilai</label>
    <input class="form-control" name="kode_nilai" value="<?php echo $data['kode_nilai']; ?>" />
</div>

<div class="form-group">
    <label>nis</label>
    <input class="form-control" name="nis"value="<?php echo $data['nis']; ?>"  />
</div>

<div class="form-group">
    <label>kode mp</label>
    <input class="form-control" name="kode_mp" value="<?php echo $data['kode_mp']; ?>" />
</div>

<div class="form-group">
    <label>uts</label>
    <input class="form-control" name="nilai_uts" value="<?php echo $data['nilai_uts']; ?>" />
</div>

<div class="form-group">
    <label>uas</label>
    <input class="form-control" name="nilai_uas" value="<?php echo $data['nilai_uas']; ?>" />
</div>

<div class="form-group">
    <label>nilai akhir</label>
    <input class="form-control" name="nilai_akhir" value="<?php echo $data['nilai_akhir']; ?>" />
</div>

<div class="form-group">
    <label>semester</label>
    <input class="form-control" name="semester"value="<?php echo $data['semester']; ?>"  />
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