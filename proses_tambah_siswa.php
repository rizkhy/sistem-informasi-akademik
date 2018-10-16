<?php

    $koneksi = new mysqli ("localhost", "root", "", "siakad");

    $nis = $_POST ['nis'];
    $nama = $_POST ['nama'];
    $alamat = $_POST ['alamat'];
    $jk = $_POST ['jk'];
	$password = $_POST ['password'];
	$nama_ortu = $_POST ['nama_ortu'];
	$pkjr_ortu = $_POST ['pkjr_ortu'];
	$kode_kelas = $_POST ['kode_kelas'];
	$semester = $_POST ['semester'];
	$thn_ajaran = $_POST ['thn_ajaran'];
    

        include "koneksi.php";
        $sql = "insert into siswa (nis, nama, alamat, jk, nama_ortu, pkjr_ortu, semester, kode_kelas, thn_ajaran) 
                values
                ('$nis', '$nama', '$alamat', '$jk', '$nama_ortu', '$pkjr_ortu', '$semester', '$kode_kelas', '$thn_ajaran')";
        $hasil = mysqli_query($kon, $sql);
        $bos = mysqli_query($kon, "INSERT INTO akun (username, password,  level) VALUES($nis, $password, 2)");

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
            window.location='index.php?act=data_siswa';
        </script>
        <?php
    }
    ?>
