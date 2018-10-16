<?php
   header('Access-Control-Allow-Origin: *'); 

    $koneksi = mysqli_connect('localhost','root','','siakad');
    $data = file_get_contents('php://input');

   $nis = str_replace('"','',$data);
   $nis = preg_replace('/\\\\/', '', $nis);
   $nis = substr($nis, 0,3);


   // $nis = substr($nis, 1,5);
   $data = substr($data, 10);
   $semester = str_replace('"', '', $data);
   


   $sql = "SELECT mata_pelajaran.nama_mp, nilai.nilai_akhir 
                              FROM mata_pelajaran, nilai 
                              WHERE nilai.kode_mp=mata_pelajaran.kode_mp
                              AND nilai.nis = '$nis'
                              AND nilai.semester='$semester'";
      // echo $sql;
   $data = array();
     $res = mysqli_query($koneksi, $sql);
    $jsonArray = Array();
    $i = 0;

    foreach ($res as $row ) {
        $data = array('nama_mp'         => $row['nama_mp'],
                      'nilai_akhir'     => $row['nilai_akhir'],
              );
              $jsonArray[$i]=$data;
              $i++;
   }
   echo json_encode($jsonArray);
   ?>