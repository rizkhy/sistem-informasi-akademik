<h2>Tambah Tata Usaha</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Tambah Tata Usaha
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_tambah_tu.php" method="POST">

<div class="form-group">
    <label>NIP</label>
    <input class="form-control" name="nip" />
</div>

<div class="form-group">
    <label>Nama </label>
    <input class="form-control" name="nama" />
</div>

<div class="form-group">
    <label>Password</label>
    <input class="form-control" name="password" />
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