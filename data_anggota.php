<?php
include "koneksi.php";
$no = 1;
$sql="select * from siswa";
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
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>nama ortu</th>
                        <th>pekerjaan ortu</th>
                        <th>kode kelas</th>
                        <th>semester</th>
                        <th>tahun ajaran</th>
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
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['nama_ortu']; ?></td>
                        <td><?php echo $data['pkjr_ortu']; ?></td>
                        <td><?php echo $data['kode_kelas']; ?></td>
                        <td><?php echo $data['semester']; ?></td>
                        <td><?php echo $data['thn_ajaran']; ?></td>
                        <td>
                            <a href="#" class="btn btn-info btn-xs">Lihat</a>
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
            <a href="?act=tambah_guru class="btn btn-success btn-lg">Tambah Data</a>
        </div>
        
    </div>
</div>