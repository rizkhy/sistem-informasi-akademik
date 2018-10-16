<?php

include "koneksi.php";
//print_r($_POST);
//die();
// $nis            = $_POST['nis'];
$afektif        = $_POST['nilai_harian'];
$komulatif      = $_POST['nilai_uts'];
$psikomotorik   = $_POST['nilai_uas'];

$afektif2       = $_POST['nilai_harian2'];
$komulatif2     = $_POST['nilai_uts2'];
$psikomotorik2  = $_POST['nilai_uas2'];
// $kode_mp        = $_POST['kode_mp'];
// var_dump($idRuang_Kelas); exit();

//$cek=mysql_query("SELECT * from nilai  ");
 $cek=mysqli_query($kon, "SELECT * from nilai 
                          where kode_mp='$_POST[id_mapel]' 
                          and nis='$_POST[nis]' ");
$d=mysqli_num_rows($cek);
if ($d > 0) {
    
    echo"    <script>
            alert('data nilai sudah ada!, silahkan di cek kembali');
            document.location='nilai_rekapitulasi.php';
        </script>";
  
 }  
foreach ($_POST['nis'] as $key => $val) {
    $jumlah = $afektif[$key] + $komulatif[$key] + $psikomotorik[$key] + $afektif2[$key] + $komulatif2[$key] + $psikomotorik2[$key];
    $nilai_akhir = $jumlah / 6;
    // $rata2 = round((((($afektif2[$key] + $komulatif2[$key] + $psikomotorik2[$key]) / 3) / 100) * 4),2);

    $query="INSERT INTO nilai (nis, kode_mp, semester, tahun_ajaran, nilai_harian, nilai_uts, nilai_uas, nilai_harian2, nilai_uts2, nilai_uas2, nilai_akhir) VALUES (
            $val,
            $_POST[id_mapel],
            '$_POST[semester]',
            '$_POST[tahun]',
            $afektif[$key],
            $komulatif[$key],
            $psikomotorik[$key],
            
            $afektif2[$key],
            $komulatif2[$key],
            $psikomotorik2[$key],
            $nilai_akhir)";
    $bos[] = mysqli_query($kon, $query);
}

$query_input =mysqli_query($kon, $bos);

 if (!$query_input) {
 
    echo "    <script >
            alert('Data  Berhasil diinput!');
            document.location='index.php?act=nilai_rekapitulasi';
        </script>";
 
    }
  else {
 //Jika Gagal
    echo "data gagal";
    }

  ?>