<?php
if($_SESSION['level'] == '1'){
include "koneksi.php";
$no = 1;
$sql="select * from guru where nip = $_SESSION[username]";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;

$sql2="select * from akun where username = $_SESSION[username]";
$result2=mysqli_query($kon,$sql2) or die('Error');
$hasil2=mysqli_query($kon, $sql2) ;


?>
<h2 align="center">Profil</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table align="center">
                <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
    
                    <tr>
                        <th>NIP</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['nip']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;
                            <?php
                                while($data2 = mysqli_fetch_assoc($hasil2)){ 
                                    echo $data2['password']; 

                                }
                            ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php echo $data['alamat']; ?>
                        </td>
                    </tr>
                    
                <?php
                    }
                ?>
            </table>

        </div>
        
    </div>
</div>
<?php } ?>

<?php
if($_SESSION['level'] == '3'){
include "koneksi.php";
$no = 1;
$sql="select * from tata_usaha where nip = $_SESSION[username]";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;

$sql2="select * from akun where username = $_SESSION[username]";
$result2=mysqli_query($kon,$sql2) or die('Error');
$hasil2=mysqli_query($kon, $sql2) ;


?>
<h2 align="center">Profil</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table align="center">
                <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
    
                    <tr>
                        <th>NIP</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['nip']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;
                            <?php
                                while($data2 = mysqli_fetch_assoc($hasil2)){ 
                                    echo $data2['password']; 

                                }
                            ?>
                        </td>
                    </tr>
                    
                <?php
                    }
                ?>
            </table>

        </div>
        
    </div>
</div>
<?php } ?>

<?php
if($_SESSION['level'] == '4'){
include "koneksi.php";
$no = 1;
$sql="select * from administrator where id_admin = $_SESSION[username]";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;

$sql2="select * from akun where username = $_SESSION[username]";
$result2=mysqli_query($kon,$sql2) or die('Error');
$hasil2=mysqli_query($kon, $sql2) ;


?>
<h2 align="center">Profil</h2>
<hr>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table align="center">
                <?php
                    while($data = mysqli_fetch_assoc($hasil)){ 
                ?>
    
                    <tr>
                        <th>NIP</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['id_admin']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['username']; ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>:</td>
                        <td>&nbsp;&nbsp;&nbsp;
                            <?php
                                while($data2 = mysqli_fetch_assoc($hasil2)){ 
                                    echo $data2['password']; 

                                }
                            ?>
                        </td>
                    </tr>
                    
                <?php
                    }
                ?>
            </table>

        </div>
        
    </div>
</div>
<?php } ?>