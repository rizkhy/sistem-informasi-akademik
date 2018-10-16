<!DOCTYPE html>
<html lang="en">
<body>
  
  <h2>Ganti Password</h2>
  
  <?php
  //mengatasi error notice dan warning
  //error ini biasa muncul jika dijalankan di localhost, jika online tidak ada masalah
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  
  //koneksi ke database
  $conn = new mysqli("localhost", "root", "", "siakad");
  if ($conn->connect_errno) {
    echo die("Failed to connect to MySQL: " . $conn->connect_error);
  }
  
  //proses jika tombol rubah di klik
  if($_POST['submit']){
    //membuat variabel untuk menyimpan data inputan yang di isikan di form
    $password_lama      = $_POST['password_lama'];
    $password_baru      = $_POST['password_baru'];
    $konfirmasi_password  = $_POST['konfirmasi_password'];
    
    //cek dahulu ke database dengan query SELECT
    //kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
    //encrypt -> md5($password_lama)
    $password_lama  = md5($password_lama);
    $cek      = $conn->query("SELECT password FROM tata_usaha WHERE password='$password_lama'");
    
    if($cek->num_rows){
      //kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
      //membuat kondisi minimal password adalah 5 karakter
      if(strlen($password_baru) >= 5){
        //jika password baru sudah 5 atau lebih, maka lanjut ke bawah
        //membuat kondisi jika password baru harus sama dengan konfirmasi password
        if($password_baru == $konfirmasi_password){
          //jika semua kondisi sudah benar, maka melakukan update kedatabase
          //query UPDATE SET password = encrypt md5 password_baru
          //kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
          $password_baru  = md5($password_baru);
          $nip    = $_SESSION['nip']; //ini dari session saat login
          
          $update     = $conn->query("UPDATE tata_usaha SET password='$password_baru' WHERE nip='$nip'");
          if($update){
            //kondisi jika proses query UPDATE berhasil
            echo 'Password berhasil di rubah';
          }else{
            //kondisi jika proses query gagal
            echo 'Gagal merubah password';
          }         
        }else{
          //kondisi jika password baru beda dengan konfirmasi password
          echo 'Konfirmasi password tidak cocok';
        }
      }else{
        //kondisi jika password baru yang dimasukkan kurang dari 5 karakter
        echo 'Minimal password baru adalah 5 karakter';
      }
    }else{
      //kondisi jika password lama tidak cocok dengan data yang ada di database
      echo 'Password lama tidak cocok';
    }
  }
  ?>
  
  <!-- mulai form rubah password -->
  <form method="post" action="">
    <table>
      <tr>
        <td>Password Lama</td>
        <td>:</td>
        <td><input type="password" name="password_lama" required></td>
      <tr>
      <tr>
        <td>Password Baru</td>
        <td>:</td>
        <td><input type="password" name="password_baru" required></td>
      <tr>
      <tr>
        <td>Konfirmasi Password</td>
        <td>:</td>
        <td><input type="password" name="konfirmasi_password" required></td>
      <tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td><input type="submit" name="submit" value="Simpan"></td>
      <tr>
    </table>
  </form>
  <!-- selesai form rubah password -->
</body>
</html>