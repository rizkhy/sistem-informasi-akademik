<h2>Tambah Buku</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Tambah Buku
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_tambah_buku.php" method="POST">

<div class="form-group">
    <label>ID Buku</label>
    <input class="form-control" name="id_buku" />
</div>

<div class="form-group">
    <label>Judul Buku</label>
    <input class="form-control" name="judul" />
</div>

<div class="form-group">
    <label>Pengarang</label>
    <input class="form-control" name="pengarang" />
</div>

<div class="form-group">
    <label>Penerbit</label>
    <input class="form-control" name="penerbit" />
</div>

<div class="form-group">
    <label>Tahun Terbit</label>
    <select class="form-control" name="tahun_terbit" >
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
    <input class="form-control" name="isbn" />
</div>

<div class="form-group">
    <label>Jumlah Buku</label>
    <input class="form-control" name="jumlah_buku" />
</div>

<div class="form-group">
    <label>Lokasi Buku</label>
    <input class="form-control" name="lokasi" />
</div>

<div class="form-group">
    <label>Tanggal Buku Masuk</label>
    <input class="form-control" name="tgl_buku_masuk" type="date" />
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