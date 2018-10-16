<?php

    $koneksi = new mysqli ("localhost", "root", "", "siakad");

    $kode_kelas = $_POST ['kode_kelas'];
    $nama_kelas = $_POST ['nama_kelas'];
    $jumlah_siswa = $_POST ['jumlah_siswa'];
    
        include "koneksi.php";
        $sql = "insert into kelas (kode_kelas, nama_kelas, jumlah_siswa) 
                values
                ('$kode_kelas', '$nama_kelas', '$jumlah_siswa')";
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
            window.location='index.php?act=data_kelas';
        </script>
        <?php
    }
    ?>