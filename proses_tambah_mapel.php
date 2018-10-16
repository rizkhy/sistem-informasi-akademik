<?php

    $koneksi = new mysqli ("localhost", "root", "", "siakad");

    $kode_mp = $_POST ['kode_mp'];
    $nama_mp = $_POST ['nama_mp'];
    $kkm = $_POST ['kkm'];
	
        include "koneksi.php";
        $sql = "insert into mata_pelajaran (kode_mp, nama_mp, kkm) 
                values
                ('$kode_mp', '$nama_mp', '$kkm')";
        $hasil = mysqli_query($kon, $sql);

        if (!$hasil){
    echo "Gagal Simpan, silahkan diulangi!<br />";
    echo mysqli_error($kon);
    echo "<br/><input type='button' value='Kembali'
          onClick='self.history.back()'>";
    exit;
    } else {
        ?>
        <script language="JavaScript">
            alert('Anda Berhasil Menambah Data');
            window.location='index.php?act=data_mata_pelajaran';
        </script>
        <?php
    }
    ?>