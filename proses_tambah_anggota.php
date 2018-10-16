<?php

    $koneksi = new mysqli ("localhost", "root", "", "db_sma1");

    $nis = $_POST ['nis'];
    $nama_anggota = $_POST ['nama_anggota'];
    $tgl_lahir = $_POST ['tgl_lahir'];
    $jekel = $_POST ['jekel'];
    $kelas = $_POST ['kelas'];
    $jurusan = $_POST ['jurusan'];
    

        include "koneksi.php";
        $sql = "insert into anggota (nis, nama_anggota, tgl_lahir, jekel, kelas, jurusan) 
                values
                ('$nis', '$nama_anggota', '$tgl_lahir', '$jekel', '$kelas', '$jurusan')";
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
            window.location='index.php?act=data_anggota';
        </script>
        <?php
    }
    ?>