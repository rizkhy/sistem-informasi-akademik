<?php

    $koneksi = new mysqli ("localhost", "root", "", "siakad");

    $kode_nilai = $_POST ['kode_nilai'];
    $nis = $_POST ['nis'];
    $kode_mp = $_POST ['kode_mp'];
	$nilai_uts = $_POST ['nilai_uts'];
	$nilai_uas = $_POST ['nilai_uas'];
	$nilai_akhir = $_POST ['nilai_akhir'];
	$semester = $_POST ['semester'];
	
        include "koneksi.php";
        $sql = "insert into nilai (kode_nilai, nis, kode_mp, nilai_uts, nilai_uas, nilai_akhir, semester) 
                values
                ('$kode_nilai', '$nis', '$kode_mp', '$nilai_uts', '$nilai_uas', '$nilai_akhir', '$semester')";
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
            window.location='index.php?act=data_nilai';
        </script>
        <?php
    }
    ?>