<h2>Tambah Anggota</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Tambah Anggota
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_tambah_anggota.php" method="POST">

<div class="form-group">
    <label>NIS</label>
    <input class="form-control" name="nis" />
</div>

<div class="form-group">
    <label>Nama</label>
    <input class="form-control" name="nama_anggota" />
</div>

<div class="form-group">
    <label>Tanggal Lahir</label>
    <input class="form-control" name="tgl_lahir" type="date" />
</div>

<div class="form-group">
    <label>Jenis Kelamin</label>
</div>
<div class="radio">
    <label>
        <input type="radio" name="jekel" value="Laki-Laki" checked />Laki-Laki
    </label>
    <label>
        <input type="radio" name="jekel" value="Perempuan" checked />Perempuan
    </label>
</div>

<div class="form-group">
    <label>Kelas</label>
    <input class="form-control" name="kelas" />
</div>

<div class="form-group">
    <label>Jurusan</label>
    <input class="form-control" name="jurusan" />
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