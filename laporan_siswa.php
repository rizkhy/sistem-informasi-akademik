<?php
include "koneksi.php";
$no = 1;
$sql="select *, kelas.nama_kelas from siswa, kelas where siswa.kode_kelas = kelas.kode_kelas";
$result=mysqli_query($kon,$sql) or die('Error');

?>
<h2>Data Siswa</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Siswa
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr bgcolor="#8EBEED">
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Nama Ortu</th>
                        <th>Pekerjaan Ortu</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_assoc($result)){ 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nis']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['jk']; ?></td>
                        <td><?php echo $data['nama_ortu']; ?></td>
                        <td><?php echo $data['pkjr_ortu']; ?></td>
                        <td><?php echo $data['nama_kelas']; ?></td>
                        <td><?php echo $data['semester']; ?></td>
                        <td><?php echo $data['thn_ajaran']; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <a href="cetak_siswa.php" class="btn btn-success btn-lg">Print Preview</a>
        </div>
        
    </div>
</div>