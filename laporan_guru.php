<?php
include "koneksi.php";
$no = 1;
$sql="select * from guru";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;



?>
<h2>Data Guru</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Guru
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr bgcolor="#8EBEED">
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nip']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
			<a href="cetak_guru.php" class="btn btn-success btn-lg">Print Preview</a>
        </div>
        
    </div>
</div>