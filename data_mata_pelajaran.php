<?php
include "koneksi.php";
$no = 1;
$sql="select * from mata_pelajaran";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;

?>
<h2>Data Mata Pelajaran</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Mata Pelajaran
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr bgcolor="#8EBEED">
                        <th>No.</th>
                        <th>Kode Mata Pelajaran</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>KKM</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['kode_mp']; ?></td>
                        <td><?php echo $data['nama_mp']; ?></td>
                        <td><?php echo $data['KKM']; ?></td>
                        <td>
                            <a href="?act=edit_mapel&kode_mp=<?php echo$data['kode_mp'];?>" class="btn btn-primary btn-xs">Edit</a>
                            <a href="hapus_mapel.php?kode_mp=<?php echo$data['kode_mp'];?>" 
                               onClick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger btn-xs">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
			<a href="?act=tambah_mata_pelajaran" class="btn btn-success btn-lg">Tambah Data</a>
        </div>
        
    </div>
</div>