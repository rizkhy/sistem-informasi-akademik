<?php
include('koneksi.php');

$nis = $_GET['nis'];

$query = mysqli_query($kon, "select * from siswa where nis='$nis'") or die(mysqli_error());
$data = mysqli_fetch_array($query);

$sql2="select * from akun where username = '$nis'";
$hasil2=mysqli_query($kon, $sql2) ;
$data2 = mysqli_fetch_array($hasil2);
?>

<h2>Edit Siswa</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Edit Siswa
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_edit_siswa.php" method="POST">

<div class="form-group">
    <label>NIS</label>
    <input class="form-control" name="nis" value="<?php echo $data['nis']; ?>" />
</div>

<div class="form-group">
    <label>Nama </label>
    <input class="form-control" name="nama" value="<?php echo $data['nama']; ?>" />
</div>

<div class="form-group">
    <label>Alamat</label>
    <input class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" />
</div>

<div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control" name="jk">
        <option value="<?php echo $data['jk']; ?>"><?php echo $data['jk']; ?></option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select> 
</div>

<div class="form-group">
    <label>Password</label>
    <input class="form-control" name="password" value="<?php echo $data2['password']; ?>" />
</div>

<div class="form-group">
    <label>Nama Orang Tua</label>
    <input class="form-control" name="nama_ortu" value="<?php echo $data['nama_ortu']; ?>" />
</div>

<div class="form-group">
    <label>Pekerjaan Orang Tua</label>
    <input class="form-control" name="pkjr_ortu" value="<?php echo $data['pkjr_ortu']; ?>" />
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
    <label>Semester</label>
    <select class="form-control" name="semester">
        <option value="<?php echo $data['semester']; ?>"><?php echo $data['semester']; ?></option>
        <option value="Ganjil">Ganjil</option>
        <option value="Ganjil">Genap</option>
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

<div>
    <input type="submit" value="Simpan" name="simpan" class="btn btn-success">
    <input onclick="window.history.back()" type="reset" class="btn btn-warning" value="Batal">
</div>

</form>
</div>
</div>
</div>
</div>