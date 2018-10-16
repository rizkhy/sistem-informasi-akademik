    <?php

    include "koneksi.php";

    $kode_mp = $_POST ['kode_mp'];
    $jam = $_POST ['jam'];
    $kode_kelas = $_POST ['kode_kelas'];
    $hari = $_POST ['hari'];
    $guru = $_POST['guru'];
    $thn_ajaran = $_POST['thn_ajaran'];
    $semester = $_POST['semester'];
    
    $sql = "SELECT * FROM jadwal_pelajaran where kode_mp = '$kode_mp' and kode_kelas = '$kode_kelas' and jam = '$jam' hari = '$hari'";
     $q=mysqli_query($kon, $sql);
if ($q > 1) {
    echo "<script>
          alert('jadwal sudah ada');
          document.location.href='index.php?act=data_jadwal';
          </script>";
} else {
    $hajar = mysqli_query($kon, "INSERT INTO jadwal_pelajaran (kode_mp, jam, kode_kelas, hari, thn_ajaran, semester ) VALUES ($kode_mp, '$jam', '$kode_kelas', '$hari', '$thn_ajaran', '$semester')");
    $bos = mysqli_query($kon, "INSERT INTO mengajar (nip, kode_mp,  kode_kelas) VALUES($guru, $kode_mp,$kode_kelas)");
    if(!$hajar || !$bos) { 
        echo "<script>
        alert('Terjadi kesalahan sistem saat input data!');
        document.location.href='index.php?act=data_jadwal';
        </script>";
    } else {
        echo "<script>
        alert('jadwal berhasil di inputkan!');
        document.location.href='index.php?act=data_jadwal'</script>";
    }
}
?>