<?php
include('koneksi.php');

$id_jadwal = $_GET['id_jadwal'];

$query = mysqli_query($kon, "select * from jadwal_pelajaran where id_jadwal='$id_jadwal'") or die(mysqli_error());

$data = mysqli_fetch_array($query);
?>

<h2>Edit Jadwal Pelajaran</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Edit Jadwal Pelajaran
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_edit_jadwal.php" method="POST">


    <input type="hidden" class="form-control" name="id_jadwal" value="<?php echo $data['id_jadwal']; ?>" />


<div class="form-group">
    <label>Mata Pelajaran</label>
    <select class="form-control" name="kode_mp">
      <?php 
              $sql  = "SELECT * FROM mata_pelajaran";
              $kelas  = mysqli_query($kon, $sql);
              $kelas2 = mysqli_fetch_assoc($kelas);
                    echo "<option value=$data[kode_mp]>$kelas2[nama_mp]</option>"; 
             ?>
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
        <option value="<?php echo $data['jam']; ?>"><?php echo $data['jam']; ?></option>
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
      <?php 
              $sql  = "SELECT * FROM kelas";
              $kelas  = mysqli_query($kon, $sql);
              $kelas2 = mysqli_fetch_assoc($kelas);
                    echo "<option value=$data[kode_kelas]>$kelas2[nama_kelas]</option>"; 
             ?>
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
        <option value="<?php echo $data['hari']; ?>"><?php echo $data['hari']; ?></option>
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
      <?php 
              $sql  = "SELECT * FROM guru";
              $kelas  = mysqli_query($kon, $sql);
              $kelas2 = mysqli_fetch_assoc($kelas);
                    echo "<option value=$data[nip]>$kelas2[nama]</option>"; 
             ?>
      <?php 
      $guru = mysqli_query($kon, "SELECT * FROM guru");
      while($hasil = mysqli_fetch_array($guru)){
      echo "<option value='$hasil[nip]'>$hasil[nama]</option>";
      }
      ?>
    </select>
</div>

<div class="form-group">
    <label>Tahun Ajaran</label>
    <select class="form-control" name="thn_ajaran">
        <option value="<?php echo $data['thn_ajaran']; ?>"><?php echo $data['thn_ajaran']; ?></option>
            <?php
                for($i=2009;$i<=2100;$i++){
                    $a = $i+1; 
                    echo "<option>$i-$a</option>";
                }
            ?>
    </select> 
</div>

<div class="form-group">
    <label>Semester</label>
    <select class="form-control" name="semester">
        <option value="<?php echo $data['semester']; ?>"><?php echo $data['semester']; ?></option>
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
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