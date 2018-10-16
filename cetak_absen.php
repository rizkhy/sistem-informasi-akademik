<?php
include "koneksi.php";
$nis = $_GET['nis'];
$kelas = $_GET['kelas'];
$kode_mp = $_GET['kode_mp'];
//$tahun = $_GET['tahun'];
//$kelasnya = "$kelas";


$pilih = mysqli_query($kon, "SELECT * FROM siswa WHERE kode_kelas = '$kelas'");

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
<div id="div1">
<h1><div align="center">Data Presensi</div></h1><br />
<table border="0" align="center">
<form action="?act=absen_rincian" name="form" method="get" onSubmit="return valid(this)">
<input type="hidden" name="kelas" value="<?php echo $kelas; ?>">
  
 </form>
</table>
<hr>
<div align="center">
<table border="0">
  <tr>
    <td width="130">Nama Lengkap </td>
    <td width="11">:</td>
    <td width="207"><?php $sql = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM siswa s JOIN kelas k ON s.kode_kelas=k.kode_kelas WHERE nis = '$nis'"));
    echo $sql['nama'];
     ?></td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>:</td>
    <td><?php echo $sql['nama_kelas'];?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $sql['alamat'];?></td>
  </tr>
</table><hr />
</div>
<br />
<link rel="stylesheet" href="style2.css" />
<body>
<div class="panel panel-default">
        <div class="table-responsive">

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    
                  <th>Mata Pelajaran</th>
                  <th>Semester</th>
                  <th>Tahun Ajaran</th>
                  <th>hadir</th>
                  <th>izin</th>
                  <th>sakit</th>
                  <th>alpa</th>
                  
                </tr>
            </thead>
            <tbody>
            <?php
            //$st="";
            //$tmpl="";
            $kls = join('+',explode(" ",$kelas));
            // $ambil = mysqli_query($kon,"SELECT * FROM presensi WHERE nis =  $nis");
            $ambil = mysqli_query($kon,"SELECT p.thn_ajaran, p.kode_mp, mp.nama_mp, p.semester, p.tanggal,
            COUNT(IF(Keterangan LIKE 'hadir%', Keterangan, NULL)) AS hadir,
            COUNT(IF(Keterangan LIKE 'izin%', Keterangan, NULL)) AS izin,
            COUNT(IF(Keterangan LIKE 'sakit%', Keterangan, NULL)) AS sakit,
            COUNT(IF(Keterangan LIKE 'alpa%', Keterangan, NULL)) AS alpa
            FROM presensi p, mata_pelajaran mp
            WHERE p.nis = $nis 
            AND p.kode_mp = mp.kode_mp 
            AND p.kode_mp = $kode_mp
            GROUP BY p.kode_mp");

    while ($nilai= mysqli_fetch_array($ambil)){
        echo"<tr  class=\"odd gradeX\" align=\"center\">
            
                <td>$nilai[nama_mp]</td>
                <td>$nilai[semester]</td>
                <td>$nilai[thn_ajaran]</td>
                <td>$nilai[hadir]</td> 
                <td>$nilai[izin]</td>
                <td>$nilai[sakit]</td>
                <td>$nilai[alpa]</td>
            </tr>";
            
         }
            ?>
            </tbody>
      </table>            
      </div>
  </div>
</div>
<button onclick="printContent('div1')" class="btn btn-success btn-lg">Print</button>
<button onclick="window.history.back()" class="btn btn-warning btn-lg">Kembali</button>