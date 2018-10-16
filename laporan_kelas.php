<?php
include "koneksi.php";
$no = 1;
$sql="select * from kelas";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;



?>
<h2>Data Kelas</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Kelas
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr bgcolor="#8EBEED">
                        <th>No.</th>
                        <th>Kode Kelas</th>
                        <th>Nama kelas</th>
                        <th>jumlah siswa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['kode_kelas']; ?></td>
                        <td><?php echo $data['nama_kelas']; ?></td>
                        <td><?php echo $data['jumlah_siswa']; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
			<a href="cetak_kelas.php" class="btn btn-success btn-lg">Print Preview</a>
        </div>
        
    </div>
</div>