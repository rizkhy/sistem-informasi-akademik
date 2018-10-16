<?php

    $koneksi = new mysqli ("localhost", "root", "", "db_sma1");

    $id_buku = $_POST ['id_buku'];
    $judul = $_POST ['judul'];
    $pengarang = $_POST ['pengarang'];
    $penerbit = $_POST ['penerbit'];
    $tahun_terbit = $_POST ['tahun_terbit'];
    $isbn = $_POST ['isbn'];
    $jumlah_buku = $_POST ['jumlah_buku'];
    $lokasi = $_POST ['lokasi'];
    $tgl_buku_masuk = $_POST ['tgl_buku_masuk'];


        include "koneksi.php";
        $sql = "insert into buku (id_buku, judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi, tgl_buku_masuk) 
                values
                ('$id_buku', '$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$isbn', '$jumlah_buku', '$lokasi', '$tgl_buku_masuk')";
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
            window.location='index.php?act=data_buku';
        </script>
        <?php
    }
    ?>