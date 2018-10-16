<?php
include "koneksi.php";
?>

<html>
<head>
<title>data absen</title>

<style type="text/css">
#absen a { padding:5px; text-decoration:none; }
#absen a:hover { background-color: #77D2ED; box-shadow:0px 0px 1px white; }
</style>

</head>
<body>
<h1 align="center">Tampilan Input Presensi</h1>
<div class="panel panel-default">
    <div class="panel-heading">
         Pilih Kelas
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>No.</th>
            <th>Nama Kelas</th>
            <th>Jumlah Siswa</th>
            <th>Proses</th>

        </tr>
    </thead>
    <tbody>

    <?php
    $kelas=mysqli_query($kon, "SELECT siswa.`kode_kelas`,`nama_kelas`, count(*) as jumlah 
						FROM `kelas` 
						inner join siswa on kelas.kode_kelas=siswa.kode_kelas 
						group by siswa.kode_kelas");
    
    $no = 1;
    while($data = mysqli_fetch_assoc($kelas)){ 
    ?>
        <tr>
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo $data['nama_kelas']; ?></td>
            <td align="center"><?php echo $data['jumlah']; ?></td>
            <td id="absen" align="center">
			<a href="?act=absen_input2&ruang=<?php echo $data['kode_kelas'];?>">Presensi</a>
			</td>
        </tr>
    <?php
        $no++;
    }
    ?>
    </tbody>
</table><br>
</div></div></div></body>
</html>