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
                        <th>Aksi</th>
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
                        <td>
                            <a href="?act=edit_siswa&nis=<?php echo$data['nis'];?>" class="btn btn-primary btn-xs">Edit</a>
                            <a href="hapus_siswa.php?nis=<?php echo$data['nis'];?>" 
                               onClick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger btn-xs">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
			<a href="?act=tambah_siswa" class="btn btn-success btn-lg">Tambah Data</a>
        </div>
        
    </div>
</div>