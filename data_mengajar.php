<?php
include "koneksi.php";
$no     = 1;
$sql    = "SELECT mengajar.nip, mp.nama_mp, k.nama_kelas,jadwal_pelajaran.hari,
jadwal_pelajaran.jam, g.nama
FROM mengajar
INNER JOIN jadwal_pelajaran ON mengajar.kode_mp = jadwal_pelajaran.kode_mp
INNER JOIN guru g ON g.nip = mengajar.nip
INNER JOIN mata_pelajaran mp ON mp.kode_mp = mengajar.kode_mp
INNER JOIN kelas k ON k.kode_kelas = mengajar.kode_kelas
WHERE mengajar.nip = $_SESSION[username] ";
$result = mysqli_query($kon,$sql) or die('Error');
$hasil  = mysqli_query($kon, $sql) ;



?>
<h2>Data Jadwal</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Jadwal
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr  bgcolor="#8EBEED">
                        <th>No.</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
						<th>Hari</th>
						<th>Jam</th>
                        <th>Guru</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_mp']; ?></td>
                        <td><?php echo $data['nama_kelas']; ?></td>
						<td><?php echo $data['hari']; ?></td>
						<td><?php echo $data['jam']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
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