<?php
    header('Access-Control-Allow-Origin: *');

    function login()
    {
        $data = file_get_contents('php://input');
        $data =  json_decode($data, true);
        $username = $data['username'];
        $password = $data['password'];
        $koneksi = mysqli_connect('localhost','root','','siakad');

        $sql    = "SELECT username, password, level FROM akun WHERE username='$username' and password='$password'";

        $data   = mysqli_query($koneksi, $sql);
        $row = mysqli_fetch_array($data);
        
        if ($row != '') {
            $data = json_encode($row);
            echo '{"userData": ' .$data . '}';
        }
        else{
            $alert = array('alert' => 'Terjadi Kesalahan');
            echo json_encode($alert);
        }
    

    }

    login();