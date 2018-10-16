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
                    <tr  bgcolor="#8EBEED">
                        <th>No.</th>
                        <th>Kode Kelas</th>
                        <th>Nama kelas</th>
                        <th>jumlah siswa</th>
                        <th width="150px">Aksi</th>
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
                        <td>
                            <a href="?act=edit_kelas&kode_kelas=<?php echo$data['kode_kelas'];?>" class="btn btn-primary btn-xs">Edit</a>
                            <a href="hapus_kelas.php?kode_kelas=<?php echo$data['kode_kelas'];?>" 
                               onClick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger btn-xs">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
			<a href="?act=tambah_kelas" class="btn btn-success btn-lg">Tambah Data</a>
        </div>
        
    </div>
</div>