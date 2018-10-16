<?php

    $koneksi = new mysqli ("localhost", "root", "", "siakad");

    $nip = $_POST ['nip'];
    $nama = $_POST ['nama'];
    $password = $_POST ['password'];
    $alamat = $_POST ['alamat'];
    

        include "koneksi.php";
        $sql = "insert into guru (nip, nama, alamat) 
                values
                ('$nip', '$nama', '$alamat')";
        $hasil = mysqli_query($kon, $sql);
        $bos = mysqli_query($kon, "INSERT INTO akun (username, password,  level) VALUES($nip, $password, 1)");

        if (!$hasil || !$bos){
    echo "Gagal Simpan, silahkan diulangi!<br />";
    echo mysqli_error($kon);
    echo "<br/><input type='button' value='Kembali'
          onClick='self.history.back()'>";
    exit;
    } else {
        ?>
        <script language="JavaScript">
            alert('Anda Berhasil Menambah Data');
            window.location='index.php?act=data_guru';
        </script>
        <?php
    }
    ?>