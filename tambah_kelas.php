<h2>Tambah Kelas</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Tambah Kelas
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_tambah_kelas.php" method="POST">

<div class="form-group">
    <label>Kode Kelas</label>
    <input class="form-control" name="kode_kelas" />
</div>

<div class="form-group">
    <label>Nama Kelas</label>
    <input class="form-control" name="nama_kelas" />
</div>

<div class="form-group">
    <label>Jumlah Siswa</label>
    <input class="form-control" name="jumlah_siswa" />
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