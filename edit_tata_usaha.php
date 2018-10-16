<?php
include('koneksi.php');

$nip = $_GET['nip'];

$query = mysqli_query($kon, "select * from tata_usaha where nip='$nip'") or die(mysqli_error());
$data = mysqli_fetch_array($query);

$sql2="select * from akun where username = '$nip'";
$hasil2=mysqli_query($kon, $sql2) ;
$data2 = mysqli_fetch_array($hasil2);
?>

<h2>Edit Tata Usaha</h2>
<hr>
<div class="panel panel-default">
<div class="panel-heading">
    Form Edit Tata Usaha
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form action="proses_edit_tu.php" method="POST">

<div class="form-group">
    <label>Nip</label>
    <input class="form-control" name="nip" value="<?php echo $data['nip']; ?>" />
</div>

<div class="form-group">
    <label>Nama </label>
    <input class="form-control" name="nama" value="<?php echo $data['nama']; ?>" />
</div>

<div class="form-group">
    <label>Password</label>
    <input class="form-control" name="password" value="<?php echo $data2['password']; ?>" />
</div>


<div>
    <input type="submit" value="Simpan" name="simpan" class="btn btn-success">
    <input onclick="window.history.back()" type="reset" class="btn btn-warning" value="Batal">
</div>

</form>
</div>
</div>
</div>
</div>