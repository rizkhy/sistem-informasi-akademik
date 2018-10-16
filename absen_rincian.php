<?php
include "koneksi.php";
$nis = $_GET['nis'];
$kelas = $_GET['kelas'];
//$tahun = $_GET['tahun'];
//$kelasnya = "$kelas";


$pilih = mysqli_query($kon, "SELECT * FROM siswa WHERE kode_kelas = '$kelas'");

?>
<script type="text/javascript">
function valid(form){
var nis = form.nis.value;
if(nis==""){
	alert('Nama Siswa Belum Dipilih');
	return false;
	}
return true;
}
</script>
<div align="right">
<h1><div align="center">Data Presensi</div></h1><br />
<table border="0" align="center">
<form action="?act=absen_rincian" name="form" method="get" onSubmit="return valid(this)">
<input type="hidden" name="kelas" value="<?php echo $kelas; ?>">
  
 </form>
</table></div>
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
    <div class="panel-heading">
         Presensi Siswa
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr bgcolor="#8EBEED">
                  	
                  <th>Mata Pelajaran</th>
				  <th>Semester</th>
				  <th>Tahun Ajaran</th>
                  <th>Hadir</th>
                  <th>Izin</th>
				  <th>Sakit</th>
				  <th>Alpa</th>
				  <th>Pilihan</th>
				  
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
						WHERE p.nis = $nis AND p.kode_mp = mp.kode_mp
						GROUP BY p.kode_mp");

// SELECT mp.kode_mp, mp.nama_mp,p.semester,p.thn_ajaran,p.id,p.nis, p.tanggal,
// 			COUNT(IF(Keterangan LIKE 'hadir%', Keterangan, NULL)) AS hadir,
// 			COUNT(IF(Keterangan LIKE 'izin%', Keterangan, NULL)) AS izin,
// 			COUNT(IF(Keterangan Like 'sakit%', Keterangan, NULL)) AS sakit,
// 			COUNT(IF(Keterangan Like 'alpa%', Keterangan, NULL)) AS alpa   
// 			FROM presensi p
// 			join jadwal_pelajaran jp on p.kode_mp=jp.kode_mp
// 			join mata_pelajaran mp on jp.kode_mp=mp.kode_mp 
// 			where p.nis='98112' and p.kode_mp = '126' group by Keterangan desc
			
	while ($nilai= mysqli_fetch_array($ambil)){
		echo"<tr  class=\"odd gradeX\" align=\"center\">
			
				<td>$nilai[nama_mp]</td>
				<td>$nilai[semester]</td>
				<td>$nilai[thn_ajaran]</td>
				<td>$nilai[hadir]</td> 
				<td>$nilai[izin]</td>
				<td>$nilai[sakit]</td>
				<td>$nilai[alpa]</td>
				
			<td>"
			?>
			<a href=?act=absen_edit&nis=<?php echo $nis ?>&semester=<?php echo $nilai['semester'] ?>&tahun=<?php echo $nilai['thn_ajaran'] ?>&kelas=<?php echo $kls ?>&kode_mp=<?php echo $nilai['kode_mp'] ?>&tanggal=<?php echo $nilai['tanggal']?> class="btn btn-primary btn-xs">Edit</a>&nbsp;
			|
		<a href=absen_hapus.php?nis=<?php echo $nis ?>&semester=<?php echo $nilai['semester'] ?>&tahun=<?php echo $nilai['thn_ajaran'] ?>&kelas=<?php echo $kls ?>&kode_mp=<?php echo $nilai['kode_mp'] ?> onClick=\"return confirm('Apakah Anda Yakin Akan Menghapus Data?')\" class="btn btn-danger btn-xs">Hapus</a>&nbsp;
			|	
		<a href=cetak_absen.php?nis=<?php echo $nis ?>&semester=<?php echo $nilai['semester'] ?>&tahun=<?php echo $nilai['thn_ajaran'] ?>&kelas=<?php echo $kls ?>&kode_mp=<?php echo $nilai['kode_mp'] ?> class="btn btn-success btn-xs">Print</a>&nbsp;</td>
            </tr>
			
		 <?php 
		}
			?>
            </tbody>
      </table>
      <a href="?act=absen">
            <input type="submit" class="btn btn-warning btn-lg" name="submit" value="Kembali" />
        </a>
</div>
</div></div>
</body>