<?php
	include "koneksi.php";
	$kd_kelas   = $_GET['kelas'];
  $nis        = $_GET['nis'];
  // $presensi   = $_GET['id'];
  $tanggal    = $_GET['tanggal'];
  $kode_mp    = $_GET['kode_mp'];
  $semester   = $_GET['semester'];
  $thn_ajaran = $_GET['tahun'];


  $sql   = mysqli_query($kon, "select * from kelas where kode_kelas='$kd_kelas' LIMIT 1");
	$kelas = mysqli_fetch_array($sql);
?>

  <center>
    <h2>Presensi Kelas
      <?php echo $kelas['nama_kelas'];?>
    </h2>
  </center>
  <form action="absen_proses.php" method="post" name="postform">
    <input type="hidden" value="<?php echo $kelas['kode_kelas'];?>" name="kode_kelas" />
    
<div class="panel panel-default">
    <div class="panel-heading">
         Presensi Kelas <?php echo $kelas['nama_kelas'];?>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <tr>
                <td bgcolor="#8EBEED">

          <select class="form-control" name="kode_mp" id="pelajaran" disabled>
          
            <option value="">
              <?php 
                $sql  = "SELECT nama_mp FROM mata_pelajaran WHERE kode_mp = '$kode_mp'";
                $sql  = mysqli_query($kon, $sql);
                $sql  = mysqli_fetch_assoc($sql);
                echo $sql['nama_mp'];
              ?>
              
            </option>

          </select>
                 </td>
                 <td bgcolor="#8EBEED">
                   <select class="form-control" name="tanggal" id="pelajaran" disabled>
          
            <option value=""><?php echo $tanggal ?></option>
          </select>

                 </td>
                 <td bgcolor="#8EBEED">
                   <select class="form-control" name="semester" id="pelajaran" disabled>
          
            <option value=""><?php echo $semester ?></option>
          </select>

                 </td>
                 <td bgcolor="#8EBEED">
                   <select class="form-control" name="thn_ajaran" id="pelajaran" disabled>
          
            <option value=""><?php echo $thn_ajaran ?></option>
          </select>

                 </td>
               </tr>
             </table>
             <table class="table table-striped table-bordered table-hover">
          <tr>
          <th bgcolor="#8EBEED">No</th>
          <th bgcolor="#8EBEED">Nama</th>
          <th bgcolor="#8EBEED">Hadir (H)</th>
          <th bgcolor="#8EBEED">Sakit (S)</th>
          <th bgcolor="#8EBEED">Ijin (I)</th>
          <th bgcolor="#8EBEED">Alfa (A)</th>
        </tr>
        <?php
   //penting nech buat kasih nilai awal cekbox
   $no=1;
   $query=mysqli_query($kon, "SELECT p.*, s.nama
   FROM presensi p, siswa s
   WHERE s.nis = '$nis' AND p.nis = '$nis' AND p.tanggal = '$tanggal' AND p.kode_mp = $kode_mp");
   while($row=mysqli_fetch_array($query)){
   ?>
          <tr align="center">
            <td>
              <?php echo $no; ?>
            </td>
            <td>
              <?php echo $row['nama'];?>
            </td>
            <td>
              <input type="radio" name="presensi" value="hadir" <?php if($row['Keterangan']=='hadir'){echo 'checked';}?>>
            </td>
            <td>
              <input type="radio" name="presensi" value="sakit" <?php if($row['Keterangan']=='sakit'){echo 'checked';}?>>
            </td>
            <td>
              <input type="radio" name="presensi" value="izin" <?php if($row['Keterangan']=='izin'){echo 'checked';}?>>
            </td>
            <td>
              <input type="radio" name="presensi" value="alpa" <?php if($row['Keterangan']=='alpa'){echo 'checked';}?>>
            </td>
            <input type="hidden" value="<?php echo $nis; ?>" name="nis">
          </tr>
          <?php
   $no++;
   }
   ?>
   </table>
    <input type="submit" name="update" class="btn btn-success btn-lg" value="Simpan" />
        <input onclick="window.history.back()" type="reset" class="btn btn-warning btn-lg" value="Batal">

    </div>
    </div>
    </div>
    <br />
  </form>