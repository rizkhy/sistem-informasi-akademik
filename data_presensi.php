<?php
include "koneksi.php";
$no = 1;
$sql="select * from presensi";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;



?>
<h2>Data Presensi</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Presensi
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr bgcolor="#8EBEED">
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Kode MP</th>
                        <th>Tanggal</th>
						<th>kode kelas</th>
						<th>Semester</th>
						<th>Tahun Ajaran</th>
						<th>Keterangan</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nis']; ?></td>
                        <td><?php echo $data['kode_mp']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
						<td><?php echo $data['kode_kelas']; ?></td>
						<td><?php echo $data['semester']; ?></td>
						<td><?php echo $data['thn_ajaran']; ?></td>
						<td><?php echo $data['Keterangan']; ?></td>
                        <td>
                            <a href="?act=edit_jadwal&nis=<?php echo$data['nis'];?>" class="btn btn-primary btn-xs">Edit</a>
                            <a href="hapus_jadwal.php?nis=<?php echo$data['nis'];?>" 
                               onClick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger btn-xs">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
			<a href="?act=tambah_jadwal_pelajaran" class="btn btn-success btn-lg">Tambah Data</a>
        </div>
        
    </div>
</div>