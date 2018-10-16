<?php
include "koneksi.php";
$no = 1;
$sql="select *, kelas.nama_kelas from siswa, kelas where siswa.kode_kelas = kelas.kode_kelas";
$result=mysqli_query($kon,$sql) or die('Error');

?>
<script>
    function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<title>Siakad</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
 <!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
 <!-- MORRIS CHART STYLES-->
<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
<link href="custom.css" rel="stylesheet" />
 <!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<div class="panel panel-default">
        <div class="table-responsive">
            <div id="div1">
                    <h1 align="center">Laporan Data Siswa</h1>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
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
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
<button onclick="printContent('div1')" class="btn btn-success btn-lg">Print</button>
<button onclick="window.history.back()" class="btn btn-warning btn-lg">Kembali</button>