<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Siakad</title>
    <link href="assets/img/logo.jpg" rel="shortcut icon">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<style type="text/css">
  body{
    background-image: url(assets/img/blue.jpg);
  }
</style>
<body>
    <div class="container">
        
        <br /><br />
            
        
<div class="row ">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="post">
                    <h3 align="center">
                        Portal Akademik<br></h3>
                    <center><img src="assets/img/logo.jpg" align="center" width="200px" height="200px"></center>
                    <h3 align="center">
                        SMK Pariwisata Bantul
                    </h3>
                    <hr>
                    <label>Username</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            
                            <input type="text" name="username" class="form-control" />
                    </div>
                    <label>Password</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            
                            <input type="password" name="password" class="form-control"/>
                    </div>
                        <hr>
                     <input type="submit" name="login" class="btn btn-primary btn-lg" value="Login">
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
         <?php
        include "koneksi.php"; 
        if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($kon, "SELECT * FROM akun 
                                     WHERE username='$username' 
                                     AND password='$password'");
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
        $_SESSION['level'] = $row['level'];
        
        if (empty($username)){
            echo "<script>alert('Username belum diisi')</script>";
            echo "<meta http-equiv='refresh' content='1 url=login_page.php'>";
        }else if (empty($password)){
            echo "<script>alert('Password belum diisi')</script>";
            echo "<meta http-equiv='refresh' content='1 url=login_page.php'>";
        }else if ($row['level'] == "2") {
            echo "<script>alert('Siswa Tidak Bisa Menggunakan Web Ini')</script>";
            echo "<meta http-equiv='refresh' content='1 url=login.php'>";
          
        }else{
            session_start();
            $login =$kon->query("select * from akun where username='$username' and password='$password'");
            if ($login->fetch_assoc() > 0){
                $_SESSION['username'] = $username;

                $ambil_id =$kon->query("select level from akun where username='$username' and password='$password'");
                $hasil = $ambil_id->fetch_assoc();
                $_SESSION['level'] = $hasil['level'];


                header("location:index.php");
            }else{
                echo "<script>alert('Username atau Password salah')</script>";
                echo "<meta http-equiv='refresh' content='1 url=login.php'>";
            }
        }
    }
    ?>

     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
