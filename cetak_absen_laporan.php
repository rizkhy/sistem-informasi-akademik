<html>
<head>
<style type="text/css">
#nilai a { padding:5px; text-decoration:none; }
#nilai a:hover { background-color: #77D2ED; box-shadow:0px 0px 1px white; }
#menu tr th{text-align:center; float:center;}
</style>
</head>
<?php 

$kode_kelas = $_GET ['kode_kelas'];
$nama_mp = $_GET ['nama_mp'];
// $nis = $_GET['nis'];
include "koneksi.php";
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['on'])) {
    $ambil = "SELECT * FROM siswa";

    $pilih = mysqli_query($kon, "SELECT * FROM kelas k 
      join jadwal_pelajaran jp on k.kode_kelas=jp.kode_kelas
      join presensi p on jp.kode_mp=p.kode_mp 
      where jp.kode_mp group by nama_kelas  ");

    
 $sqli = mysqli_query($kon,"SELECT * FROM kelas where kode_kelas='$_POST[kelas]'");
 $plh= mysqli_fetch_array($sqli);
}
?>
<script>
    function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }

    function valid(form){
    var nis = form.nis.value;
    if(nis==""){
        alert('Nama Siswa Belum Dipilih');
        return false;
        }
    return true;
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
        
<body>
<div id="div1">
<div align="center">
<h3>
Data Presensi Kelas : 
<?php 
    $query = "SELECT * FROM kelas WHERE kode_kelas ='$kode_kelas' ";
    $sql = mysqli_query($kon, $query);
    $sql  = mysqli_fetch_assoc($sql);
    echo $sql['nama_kelas']; 
?>
</h3>
<h4>Mata Pelajaran : <?php echo $nama_mp; ?> </h4>
    </tr>
</table>
</div>
<hr>
<div class="panel panel-default">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    
                    <th>NO</th>
                    <th>NIS</th>
                    <th>NAMA SISWA</th>
                    <th>ALAMAT</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                    <th>Hadir</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                    <th>Alpa</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                            $i=1;
                            
                                
                    
                            $ambil = mysqli_query($kon,"SELECT  mp.nama_mp,p.semester,p.thn_ajaran,p.nis, s.nama, s.alamat,
                            COUNT(IF(Keterangan LIKE 'hadir%', Keterangan, NULL)) AS hadir,
                            COUNT(IF(Keterangan LIKE 'izin%', Keterangan, NULL)) AS izin,
                            COUNT(IF(Keterangan Like 'sakit%', Keterangan, NULL)) AS sakit,
                            COUNT(IF(Keterangan Like 'alpa%', Keterangan, NULL)) AS alpa   
                            FROM presensi p
                            join jadwal_pelajaran jp on p.kode_mp=jp.kode_mp
                            join mata_pelajaran mp on jp.kode_mp=mp.kode_mp 
                            join siswa s on p.nis= s.nis
                            where mp.nama_mp = '$nama_mp' GROUP BY p.nis");

    while ($nilai= mysqli_fetch_array($ambil)){
        echo"<tr  class=\"odd gradeX\" align=\"center\">
                
                <td>$i</td>
                <td>$nilai[nis]</td>
                <td>$nilai[nama]</td>
                <td>$nilai[alamat]</td>
                <td>$nilai[semester]</td>
                <td>$nilai[thn_ajaran]</td>
                <td>$nilai[hadir]</td> 
                <td>$nilai[izin]</td>
                <td>$nilai[sakit]</td>
                <td>$nilai[alpa]</td>";
                $i++;

}
    
                    
                        
              
        ?>

            </tbody>
        </table>    
</div></div></body></div>
</html>
<button onclick="printContent('div1')" class="btn btn-success btn-lg">Print</button>
<a href="index.php?act=absen_laporan" class="btn btn-warning btn-lg">Kembali</a>