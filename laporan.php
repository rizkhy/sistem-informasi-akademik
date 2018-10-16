<?php
include "koneksi.php";
$no = 1;
$sql="select * from transaksi";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;


?>
<h2>Data Laporan</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Laporan
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Buku</th>
                        <th>Nama Peminjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
                    <tr class="odd gradeX">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['tgl_pinjam']; ?></td>
                        <td><?php echo $data['tgl_kembali']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <a href="?act=tambah_transaksi" class="btn btn-warning btn-lg">Cetak</a>
        </div>
        
    </div>
</div>