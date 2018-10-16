<h2>Tambah Jadwal</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Tambah Jadwal
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_tambah_jadwal.php" method="POST">

    <input type="hidden" class="form-control" name="id_jadwal" />

<div class="form-group">
    <label>Mata Pelajaran</label>
    <select class="form-control" name="kode_mp">
        <option value="">-Pilih Mata Pelajaran-</option>
           <?php 
              $sql  = "SELECT * FROM mata_pelajaran";
              $mapel  = mysqli_query($kon, $sql);
              while($mapel2 = mysqli_fetch_assoc($mapel))
                { 
                    echo "<option value=$mapel2[kode_mp]>$mapel2[nama_mp]</option>"; 
                }
             ?>
    </select>
</div>

<div class="form-group">
    <label>Jam</label>
    <select class="form-control" name="jam">
        <option value="">-Pilih Jam-</option>
        <option value="07.00">07.00</option>
        <option value="09.30">09.30</option>
        <option value="10.00">10.00</option>
        <option value="12.30">12.30</option>
        <option value="14.00">14.00</option>
    </select>
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
    <label>Hari</label>
    <select class="form-control" name="hari">
        <option value="">-Pilih Hari-</option>
        <option value="Senin">Senin</option>
        <option value="Selasa">Selasa</option>
        <option value="Rabu">Rabu</option>
        <option value="Kamis">Kamis</option>
        <option value="Jum'at">Jum'at</option>
    </select>
</div>

<div class="form-group">
    <label>Guru</label>
    <select name="guru" class="form-control">
      <option value="">-Pilih Guru-</option>
      <?php 
      $guru = mysqli_query($kon, "SELECT * FROM guru");
      while($hasil = mysqli_fetch_array($guru)){
      echo "<option value='$hasil[nip]'>$hasil[nama]</option>";
      }
      ?>
    </select>
</div>

<div class="form-group">
    <label>Semester</label>
    <select class="form-control" name="semester">
        <option value="">-Pilih Semester-</option>
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
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