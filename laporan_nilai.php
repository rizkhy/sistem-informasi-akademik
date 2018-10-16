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
<h1><div align="center">Data Nilai</div></h1><br /><hr>
<table border="0" align="center">
<form action="index.php?act=laporan_nilai" name="form" method="POST" >
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
    <td width="118">
        <span class="form-group input-group-btn">
            <button name="on" class="btn btn-default" type="submit">Tampilkan</button>
        </span>
    </td>
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
                    <th>PROSES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        if (isset($_POST['kelas'])== '') {
                           echo 'Kelas Belum Di pilih';
                        }elseif (isset($_POST['kelas']) !== '') {
                            $i=0;
                            $query = "SELECT * FROM siswa WHERE kode_kelas = $_POST[kelas] order by nis asc ";
                            
                            $sql = mysqli_query($kon, $query); 
                            while($data = mysqli_fetch_assoc($sql)){ 
                                $i++;
                                ?>
                                    <tr align=\"center\">
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $data['nis'] ?></td>
                                    <td><?php echo $data['nama'] ?></td>
                                    <td><?php echo $data['alamat'] ?></td>
                                    <td><a href=index.php?act=laporan_nilai_rincian&nis=<?php echo$data['nis'] ?>&kelas=<?php echo $data['kode_kelas'] ?> class="btn btn-primary btn-xs">Lihat</a></td>
                                    </tr>
                   
                   <?php }
                        }

              
        ?>
            </tbody>
        </table>
            <?php }else{ ?>
                <h2 align="center">Kelas belum dipilih...</h2>
            <?php } ?>
    </div>
</div></div></body>
</html>