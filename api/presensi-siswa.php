<?php
   header('Access-Control-Allow-Origin: *'); 
   
   $koneksi = mysqli_connect('localhost','root','','siakad');
   $data = file_get_contents('php://input');

    // $data =  json_decode($data, true);

   
   $data =  json_decode($data, true);
   $nis = str_replace('"','',$data);

      $query = "SELECT p.thn_ajaran, p.kode_mp, mp.nama_mp, p.semester, p.tanggal, 
                  COUNT(IF(Keterangan LIKE 'hadir%', Keterangan, NULL)) AS hadir, 
                  COUNT(IF(Keterangan LIKE 'izin%', Keterangan, NULL)) AS izin, 
                  COUNT(IF(Keterangan LIKE 'sakit%', Keterangan, NULL)) AS sakit, 
                  COUNT(IF(Keterangan LIKE 'alpa%', Keterangan, NULL)) AS alpa 
               FROM presensi p, mata_pelajaran mp 
               WHERE p.nis = '$nis' 
               AND p.kode_mp = mp.kode_mp 
               GROUP BY p.kode_mp";
              
     // echo $query;
     $data = array();
     $res = mysqli_query($koneksi, $query);
    $jsonArray = Array();
    $i = 0;

    foreach ($res as $row ) {
        $data = array('thn_ajaran'   => $row['thn_ajaran'],
                      'kode_mp'       => $row['kode_mp'],
                      'nama_mp'=> $row['nama_mp'],
                      'semester'      => $row['semester'],
                      'tanggal'      => $row['tanggal'],
                      'hadir'      => $row['hadir'],
                      'izin'      => $row['izin'],
                      'sakit'      => $row['sakit'],
                      'alpa'      => $row['alpa'],
              );
              $jsonArray[$i]=$data;
              $i++;
   }
   echo json_encode($jsonArray);

?>