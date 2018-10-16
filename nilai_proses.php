<?php

include "koneksi.php";
//print_r($_POST);
//die();
//$KKN            = $_POST['KKN'];
$nis        = $_POST['nis'];
$kelas      = $_POST['kelas'];
$semester   = $_POST['semester'];

$kode_mp       = $_POST['kode_mp'];
$tahun_ajaran     = $_POST['tahun_ajaran'];


$uiharian1 = $_POST['uiharian1'];
$uts1	   = $_POST['uts1'];
$uas1	   = $_POST['uas1'];

$uiharian2 = $_POST['uiharian2'];
$uts2	   = $_POST['uts2'];
$uas2	   = $_POST['uas2'];


// $kode_mp        = $_POST['kode_mp'];
// var_dump($idRuang_Kelas); exit();

//$cek=mysql_query("SELECT * from nilai  ");

    $jumlah = $afektif[$key] + $komulatif[$key] + $psikomotorik[$key] + $afektif2[$key] + $komulatif2[$key] + $psikomotorik2[$key];
    $nilai_akhir = $jumlah / 6;

    $query ="UPDATE nilai  SET 
    			nilai_harian	='$uiharian1', 
    			nilai_uts 		='$uts1', 
    			nilai_uas 		='$uas1', 
    			nilai_harian2 	='$uiharian2', 
    			nilai_uts2 		='$uts2', 
    			nilai_uas2 		='$uas2',
    			nilai_akhir 	='$nilai_akhir' 
    			WHERE nis = '$nis' and semester = '$semester' and tahun_ajaran = '$tahun_ajaran' and kode_mp ='$kode_mp'";
// echo $query;

$query_edit =mysqli_query($kon, $query);

 if ($query_edit) {
 
    echo "    <script >
            alert('Data  Berhasil diedit!');

            document.location='index.php?act=nilai_rincian&nis=$nis&kelas=$kelas';
        </script>";
 
    }
  else {
 //Jika Gagal
    echo "data gagal";
    }

  ?>