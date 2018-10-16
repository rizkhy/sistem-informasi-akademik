<?php
	include "koneksi.php";
	$kd_kelas = $_GET['ruang'];
   $sql = mysqli_query($kon, "select * from kelas where kode_kelas='$kd_kelas' LIMIT 1");
	$kelas = mysqli_fetch_array($sql);
?>


<h2 align="center">Presensi Kelas <?php echo $kelas['nama_kelas'];?></h2>
<form action="absen_proses_input.php" method="post" name="postform">
<input type="hidden" value="<?php echo $kelas['kode_kelas'];?>" name="kode_kelas"/>
<div class="panel panel-default">
    <div class="panel-heading">
         Presensi Kelas <?php echo $kelas['nama_kelas'];?>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <tr  class="odd gradeX">
                <td colspan='6' bgcolor="#8EBEED">
                  <select name="kode_mp" id="pelajaran">
                    <option value="">-Pilih Pelajaran-</option>
                       <?php 
                          $sql  = "SELECT *, mata_pelajaran.nama_mp FROM jadwal_pelajaran, mata_pelajaran where jadwal_pelajaran.kode_kelas=$kd_kelas  and jadwal_pelajaran.kode_mp = mata_pelajaran.kode_mp";
                          $data  = mysqli_query($kon, $sql);
                          while($mapel = mysqli_fetch_assoc($data)){ 
                        ?>
                    
                    <option value="<?php echo $mapel['kode_mp']; ?>"><?php echo $mapel['nama_mp']; ?></option>
                    <?php 
                  }
                    ?>
                  </select>

                  Tanggal :
                  <input type="date" name="tanggal"  value="<?php echo date('Y-m-d') ?>">

                  <select name="semester" id="semester">
                    <option value="">-Pilih-Semester</option>
                    <option>Ganjil</option>
                    <option>Genap</option>
                  </select> 

                  <select name="thn_ajaran" id="tahun">
                     <option value="">-Pilih-Tahun ajaran</option>
                      <?php
                      for($i=2009;$i<=2100;$i++){
                        $a = $i+1; 
                        echo "<option>$i-$a</option>";
                      }
                      ?>
                  </select> 
                </td>
              </tr>
              <tr bgcolor="#8EBEED">
                <th>No</th>
                <th>Nama</th>
                <th>Hadir (H)</th>
                <th>Sakit (S)</th>
                <th>Ijin (I)</th>
                <th>Alfa (A)</th>
              </tr>
               <?php
               //penting nech buat kasih nilai awal cekbox
               $no=1;
               $query=mysqli_query($kon, "select * from siswa where kode_kelas='$kd_kelas'");
               while($row=mysqli_fetch_array($query)){
               ?>
             <tr align="center">
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama'];?></td>
                <td>
                	<?php echo "<input type=radio name=presensi[$row[nis]] value=hadir>"; ?>
                </td>
                <td>
                	<?php echo "<input type=radio name=presensi[$row[nis]] value=sakit>"; ?>
                </td>
                <td>
                	<?php echo "<input type=radio name=presensi[$row[nis]] value=izin>"; ?>
                </td>
                <td>
                	<?php echo "<input type=radio name=presensi[$row[nis]] value=alpa>"; ?>
                </td>
             </tr>
               <?php
               $no++;
               }
               ?>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="nis" value="<?php echo $row['nis'];?>">
<input type="submit" class="btn btn-success btn-lg" value="Simpan" />
</form>
