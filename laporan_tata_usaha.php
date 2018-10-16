<?php
include "koneksi.php";
$no = 1;
$sql="select * from tata_usaha";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;



?>
<h2>Data Tata Usaha</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Tata Usaha
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr bgcolor="#8EBEED">
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
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
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
			<a href="cetak_tu.php" class="btn btn-success btn-lg">Print Preview</a>
        </div>
        
    </div>
</div>