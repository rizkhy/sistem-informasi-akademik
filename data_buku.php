<?php
include "koneksi.php";
$no = 1;
$sql="select * from buku";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;



?>
<h2>Data Buku</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Buku
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>ISBN</th>
                        <th>Jumlah Buku</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['pengarang']; ?></td>
                        <td><?php echo $data['penerbit']; ?></td>
                        <td><?php echo $data['isbn']; ?></td>
                        <td><?php echo $data['jumlah_buku']; ?></td>
                        <td>
                        	<a href="#" class="btn btn-info btn-xs">Lihat</a>
		                    <a href="?act=edit_buku&id_buku=<?php echo$data['id_buku'];?>" class="btn btn-primary btn-xs">Edit</a>
		                    <a href="hapus_buku.php?id_buku=<?php echo$data['id_buku'];?>" 
                               onClick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger btn-xs">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
			<a href="?act=tambah_buku" class="btn btn-success btn-lg">Tambah Data</a>
        </div>
        
    </div>
</div>