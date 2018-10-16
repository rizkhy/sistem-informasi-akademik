<?php
include "koneksi.php";
$no = 1;
$sql="select * from nilai";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;



?>
<h2>Data Nilai</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Nilai
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr bgcolor="#8EBEED">
                        <th>No.</th>
                        <th>kode nilai</th>
                        <th>nis</th>
                        <th>kode_mp</th>
						<th>nilai_uts</th>
						<th>nilai_uas</th>
						<th>nilai_akhir</th>
						<th>semester</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['kode_nilai']; ?></td>
                        <td><?php echo $data['nis']; ?></td>
                        <td><?php echo $data['kode_mp']; ?></td>
						<td><?php echo $data['nilai_uts']; ?></td>
						<td><?php echo $data['nilai_uas']; ?></td>
						<td><?php echo $data['nilai_akhir']; ?></td>
						<td><?php echo $data['semester']; ?></td>
                        <td>
                            <a href="?act=edit_nilai&kode_nilai=<?php echo$data['kode_nilai'];?>" class="btn btn-primary btn-xs">Edit</a>
                            <a href="hapus_nilai.php?kode_nilai=<?php echo$data['kode_nilai'];?>" 
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