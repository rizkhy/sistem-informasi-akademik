<?php

$error=''; 

include "koneksi.php";
if(isset($_POST['login']))
{               
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    
                    
    $query = mysqli_query($connection, "SELECT * FROM akun WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($query) == 0)
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
        $_SESSION['level'] = $row['level'];
        
        if($row['level'] == "1")
        {
            
            header("Location: index.php");
        }
        else if($row['level'] =="3")
        {
            header("Location: index.php");
        }
        else
        {
            $error = "Failed Login";
        }
    }
}           
?>