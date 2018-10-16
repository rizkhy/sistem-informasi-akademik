<html>
<head>
<style type="text/css">
#nilai a { padding:5px; text-decoration:none; }
#nilai a:hover { background-color: #77D2ED; box-shadow:0px 0px 1px white; }
#menu tr th{text-align:center; float:center;}
</style>
</head>
<?php 

include "koneksi.php";
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST['on'])) {
    $ambil = "SELECT * FROM siswa";

    $pilih = mysqli_query($kon, "SELECT * FROM kelas k 
      join jadwal_pelajaran jp on k.kode_kelas=jp.kode_kelas
      join presensi p on jp.kode_mp=p.kode_mp group by nama_kelas  ");

    
 $sqli = mysqli_query($kon,"SELECT * FROM kelas where kode_kelas='$_POST[kelas]'");
 $plh= mysqli_fetch_array($sqli);
}
?>
<div align="center">
<?php error_reporting(E_ALL ^ E_DEPRECATED); ?>
<h1><div align="center">Rekapitulasi Presensi</div></h1><br /><hr>
<table border="0" align="center">
<form action="index.php?act=absen_laporan" name="form" method="POST" >
  <tr>
    <td>
    <div class="input-group">
    <select name="kelas" id="kelas" class="form-control">
        <option value="">-Pilih Kelas-</option>
        <?php 
            $pilih = mysqli_query($kon, "SELECT * FROM kelas");
            while($hasil = mysqli_fetch_array($pilih)){ ?>
            <option value="<?=$hasil['kode_kelas']?>"><?=$hasil['nama_kelas']?></option>
        <?php } ?>
    </select>
    </td>
        <td>
    <div class="input-group">
    <select name="nama_mp" id="nama_mp" class="form-control">
        <option value="">-Pilih mp-</option>
        <?php 
            $pilih = mysqli_query($kon, "SELECT * FROM mata_pelajaran");
            while($hasil = mysqli_fetch_array($pilih)){ ?>
            <option value="<?=$hasil['nama_mp']?>"><?=$hasil['nama_mp']?></option>
        <?php } ?>
    </select>
    </td>
    <td width="118">
        <span class="form-group input-group-btn">
            <button name="on" class="btn btn-default" type="submit">Tampilkan</button>
        </span></td>
    </div>
  </tr>
  <!-- <input type="hidden" name="on" value="true"> -->
 </form>
</table>
</div>

<hr><br />
<link rel="stylesheet" href="style.css" />
    <?php if (isset( $_POST['on'] )){ ?>
        
<body>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Kelas <?=(isset( $_POST['on'])) ? $plh['nama_kelas'] : '' ?>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    
                    <th>NO</th>
                    <th>NIS</th>
                    <th>NAMA SISWA</th>
                    <th>ALAMAT</th>
                    <th>Mata Pelajaran</th>
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
                        if (isset($_POST['kelas'])== '') {
                           echo 'Kelas Belum Di pilih';
                        }elseif (isset($_POST['kelas']) !== '') {
                            $nama_mp = $_POST['nama_mp'];
                
                            $i=1;
                                
                        $ambil = mysqli_query($kon,
                            "SELECT  mp.nama_mp,p.semester,p.thn_ajaran,p.nis, s.nama, s.alamat,
                            COUNT(IF(Keterangan LIKE 'hadir%', Keterangan, NULL)) AS hadir,
                            COUNT(IF(Keterangan LIKE 'izin%', Keterangan, NULL)) AS izin,
                            COUNT(IF(Keterangan Like 'sakit%', Keterangan, NULL)) AS sakit,
                            COUNT(IF(Keterangan Like 'alpa%', Keterangan, NULL)) AS alpa   
                            FROM presensi p
                            join jadwal_pelajaran jp on p.kode_mp=jp.kode_mp
                            join mata_pelajaran mp on jp.kode_mp=mp.kode_mp 
                            join siswa s on p.nis= s.nis
                            where mp.nama_mp = '$nama_mp' GROUP BY nis "); 

    while ($nilai= mysqli_fetch_array($ambil)){
        echo"<tr  class=\"odd gradeX\" align=\"center\">
                
                <td>$i</td>
                <td>$nilai[nis]</td>
                <td>$nilai[nama]</td>
                <td>$nilai[alamat]</td>
                <td>$nilai[nama_mp]</td>
                <td>$nilai[semester]</td>
                <td>$nilai[thn_ajaran]</td>
                <td>$nilai[hadir]</td> 
                <td>$nilai[izin]</td>
                <td>$nilai[sakit]</td>
                <td>$nilai[alpa]</td>";
                $i++;
} 
    
                    
                        }
              
        ?>

            </tbody>
        </table>
        <a href="cetak_absen_laporan.php?kode_kelas=<?=(isset( $_POST['on'])) ? $plh['kode_kelas'] : '' ?>&nama_mp=<?php echo $nama_mp ?>" class="btn btn-success btn-lg">Print Preview</a>
    <?php }else{ ?>
        <h2 align="center">Kelas belum dipilih...</h2>
    <?php } ?>
    </div>
</div></div></body>
</html>