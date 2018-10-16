<?php
include "koneksi.php";
$no     = 1;
$sql    = "select *, kelas.nama_kelas, mata_pelajaran.nama_mp
           from jadwal_pelajaran, kelas, mata_pelajaran 
           where kelas.kode_kelas = jadwal_pelajaran.kode_kelas and 
           mata_pelajaran.kode_mp = jadwal_pelajaran.kode_mp";
$result = mysqli_query($kon,$sql) or die('Error');
$hasil  = mysqli_query($kon, $sql) ;



?>
<h2>Data Jadwal</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Jadwal
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr  bgcolor="#8EBEED">
                        <th>No.</th>
                        <th>Mata Pelajaran</th>
                        <th>Jam</th>
                        <th>Kelas</th>
                        <th>Hari</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_mp']; ?></td>
                        <td><?php echo $data['jam']; ?></td>
                        <td><?php echo $data['nama_kelas']; ?></td>
                        <td><?php echo $data['hari']; ?></td>
                        <td><?php echo $data['semester']; ?></td>
                        <td><?php echo $data['thn_ajaran']; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <a href="cetak_jadwal.php" class="btn btn-success btn-lg">Print Preview</a>
        </div>
        
    </div>
</div>