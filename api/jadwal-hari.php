<?php
   header('Access-Control-Allow-Origin: *'); 

    $koneksi = mysqli_connect('localhost','root','','siakad');
    $data = file_get_contents('php://input');

    // $data =  json_decode($data, true);

   

   $nis = str_replace('"','',$data);
   $nis = preg_replace('/\\\\/', '', $nis);
   $nis = substr($nis, 0,3);


   // $nis = substr($nis, 1,5);
   $data = substr($data, 10);
   $hari = str_replace('"', '', $data);
   

    $query = "SELECT mata_pelajaran.nama_mp, kelas.nama_kelas, jadwal_pelajaran.hari, jadwal_pelajaran.jam FROM mata_pelajaran, kelas, jadwal_pelajaran, siswa WHERE mata_pelajaran.kode_mp=jadwal_pelajaran.kode_mp AND kelas.kode_kelas=jadwal_pelajaran.kode_kelas AND jadwal_pelajaran.hari = '$hari' AND kelas.kode_kelas = siswa.kode_kelas AND siswa.nis = '$nis'";
              
     
     $data = array();
     $res = mysqli_query($koneksi, $query);
    $jsonArray = Array();
    $i = 0;

    foreach ($res as $row ) {
        $data = array('nama_mp'   => $row['nama_mp'],
                      'jam'       => $row['jam'],
                      'nama_kelas'=> $row['nama_kelas'],
                      'hari'      => $row['hari'],
              );
              $jsonArray[$i]=$data;
              $i++;
   }
   echo json_encode($jsonArray);
   ?>