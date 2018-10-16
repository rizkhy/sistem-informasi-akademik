<?php

    $koneksi = new mysqli ("localhost", "root", "", "db_sma1");

    $judul = $_POST ['judul'];
    $nama = $_POST ['nama'];
    $tgl_pinjam = $_POST ['tgl_pinjam'];
    $tgl_kembali = $_POST ['tgl_kembali'];
    $status = $_POST ['status'];


        include "koneksi.php";
        $sql = "insert into transaksi (judul, nama, tgl_pinjam, tgl_kembali, status) 
                values
                ('$judul', '$nama', '$tgl_pinjam', '$tgl_kembali', '$status')";
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
            window.location='index.php?act=transaksi';
        </script>
        <?php
    }
    ?>