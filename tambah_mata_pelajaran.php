<h2>Tambah Mata Pelajaran</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Tambah Pelajaran
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_tambah_mapel.php" method="POST">

<div class="form-group">
    <label>Kode Mata Pelajaran</label>
    <input class="form-control" name="kode_mp" />
</div>

<div class="form-group">
    <label>Nama Mata Pelajaran</label>
    <input class="form-control" name="nama_mp" />
</div>

<div class="form-group">
    <label>KKM</label>
    <input class="form-control" name="kkm" />
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