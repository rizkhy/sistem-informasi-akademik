<?php
include "koneksi.php";
$nis = $_GET['nis'];
$kelas = $_GET['kelas'];
//$tahun = $_GET['tahun'];
//$kelasnya = "$kelas";


$pilih = mysqli_query($kon, "SELECT * FROM siswa WHERE kode_kelas = '$kelas'");
// die("SELECT * FROM nilai WHERE nis = '$nis' ORDER BY thn_ajaran DESC");
$ambil = mysqli_query($kon, "SELECT n.kode_mp,n.semester,n.tahun_ajaran,
						n.nilai_harian,n.nilai_uts,n.nilai_uas,
						n.nilai_harian2,n.nilai_uts2,n.nilai_uas2,n.nilai_akhir,m.KKM 
						FROM nilai n JOIN mata_pelajaran m ON 
						n.kode_mp = m.kode_mp
						WHERE n.nis = '$nis' GROUP BY n.kode_mp");
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
<title>Nilai Siswa</title>
<h1><div align="center">Rekapitulasi Nilai Siswa</div></h1>
<div class="panel panel-default" align="center">
    <div class="panel-heading">
         Data Kelas
    </div>
    <div class="panel-body">
        
            
<table border="0">
	  <tr>
		<td width="130">Nama Lengkap </td>
		<td width="11">:</td>
		<td width="207">
		<?php $sql = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM siswa s JOIN kelas r ON s.kode_kelas=r.kode_kelas WHERE nis = '$nis'"));
		echo $sql['nama'];?></td>
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

<link rel="stylesheet" href="style2.css" />
<body>
	<div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr align="center" bgcolor="#8EBEED">
					<th rowspan='5'>No</th>
					<th rowspan='5'>Mata Pelajaran</th>
					<th rowspan='5'>Semester</th>
					<th rowspan='5'>Tahun Ajaran</th>
					<th rowspan='5'>KKM</th>
					<th colspan='6'>Penilaian</th>
					<th rowspan='4'>Nilai Akhir</th>
					<th rowspan='4'>Pilihan</th>
				</tr>
				<tr align="center" bgcolor="#8EBEED">
					<th colspan='3'>Keterampilan</th>
					<th colspan='3'>Pengetahuan</th>
				</tr>
				<tr align="center" bgcolor="#8EBEED">
					<!-- Nilai Keterampilan-->
					<th>Nilai Harian</th>
					<th>Nilai UTS</th>
					<th>Nilai UAS</th>
					
					<!-- Nilai Pengetahuan-->
					<th>Nilai Harian</th> 
					<th>Nilai UTS</th>
					<th>Nilai UAS</th>
		
                </tr>
            </thead>
            <tbody>
			<?php
			//$st="";
			//$tmpl="";
			$kls = join('+',explode(" ",$kelas));
			$i=0;
			while ($nilai= mysqli_fetch_array($ambil)){
			$plj = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM mata_pelajaran WHERE kode_mp = '$nilai[kode_mp]'"));
			//if ($plj ['status']=="0")
				
			//	$st="Belum Tampil";	
			//else
			//	$st="tampil";
			$i++;
			echo"<tr align=\"center\">
			<td>$i</td>
			<td>$plj[nama_mp]</td>
			<td>$nilai[semester]</td>
			<td>$nilai[tahun_ajaran]</td>
			<td>$nilai[KKM]</td>
			
			<td>$nilai[nilai_harian]</td> 
			<td>$nilai[nilai_uts]</td>
			<td>$nilai[nilai_uas]</td>
			
			<td>$nilai[nilai_harian2]</td> 
			<td>$nilai[nilai_uts2]</td>
			<td>$nilai[nilai_uas2]</td>
			<td>$nilai[nilai_akhir]</td>
		<td>";
			?>

		 <a href=cetak_nilai.php?nis=<?php echo $sql['nis'] ?>&kode_mp=<?php echo $nilai['kode_mp'] ?>&semester=<?php echo $nilai['semester'] ?>&tahun_ajaran=<?php echo $nilai['tahun_ajaran'] ?>&kelas=<?php echo $kls ?> class="btn btn-primary btn-xs">
				  Print</a></td>
            </tr>
            <?php 
        		}
			?>
            </tbody>
      </table>
        <a href="index.php?act=laporan_nilai" class="btn btn-warning btn-lg">Kembali</a>
	</div>
	
</body></div></div>