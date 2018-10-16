<h2>Tambah Siswa</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Tambah Siswa
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_tambah_siswa.php" method="POST">

<div class="form-group">
    <label>NIS</label>
    <input class="form-control" name="nis" />
</div>

<div class="form-group">
    <label>Nama</label>
    <input class="form-control" name="nama" />
</div>

<div class="form-group">
    <label>Alamat</label>
    <input class="form-control" name="alamat" />
</div>

<div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control" name="jk">
        <option value="">-Pilih Jenis Kelamin-</option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select> 
</div>

<div class="form-group">
    <label>Password</label>
    <input class="form-control" name="password" />
</div>

<div class="form-group">
    <label>Nama Orang Tua</label>
    <input class="form-control" name="nama_ortu" />
</div>

<div class="form-group">
    <label>Pekerjaan Orang Tua</label>
    <input class="form-control" name="pkjr_ortu" />
</div>

<div class="form-group">
    <label>Kelas</label>
    <select class="form-control" name="kode_kelas">
        <option value="">-Pilih Kelas-</option>
           <?php 
              $sql  = "SELECT * FROM kelas";
              $kelas  = mysqli_query($kon, $sql);
              while($kelas2 = mysqli_fetch_assoc($kelas))
                { 
                    echo "<option value=$kelas2[kode_kelas]>$kelas2[nama_kelas]</option>"; 
                }
             ?>
    </select>
</div>

<div class="form-group">
    <label>Semester</label>
    <select class="form-control" name="semester">
        <option value="">-Pilih Semester-</option>
        <option value="Ganjil">Ganjil</option>
        <option value="Ganjil">Genap</option>
    </select> 
</div>

<div class="form-group">
    <label>Tahun Ajaran</label>
    <select class="form-control" name="thn_ajaran">
        <option value="">-Pilih Tahun Ajaran-</option>
            <?php
                for($i=2009;$i<=2100;$i++){
                    $a = $i+1; 
                    echo "<option>$i-$a</option>";
                }
            ?>
    </select> 
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