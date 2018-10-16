<html>
<head>
<title>Input Nilai</title>
</head>

<body>
<h1 align="center">Tampilan Input Nilai</h1>

<table width="710" border="1" align="center" cellpadding="5" cellspacing="0">
    <thead>
        <tr align="center" bgcolor="#8EBEED">
            <th width="10">No</th>
            <th width="250">Nama Kelas</th>
            <th width="100">Semester</th>
            <th width="210">Tahun Ajaran</th>
            <th width="100">Nama Mapel</th>
            <th width="100">Aksi</th>
        </tr>
    </thead>
    <tbody>

    <?php
    include "koneksi.php";
$no = 1;
$sql="select * from kelas";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;
    while($data = mysqli_fetch_array($hasil)){
    ?>
    <form action="nilai4.php" method="POST">
    <input name="id" type="hidden" value="<?php echo $data['kode_Kelas']; ?>">
    <input name="nama_kelas" type="hidden" value="<?php echo $data['nama_kelas']; ?>">

        <tr>
            <td width="10" align="center"><?php echo $no; ?></td>
            <td width="190" align="center"><?php echo $data['nama_kelas']; ?></td>
            <td width="50" align="center">
            <select name="semester">
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
            </select>
            </td>
            <td width="50" align="center">
            <select name="tahun_ajaran">
                <?php 
                    $sql="SELECT * FROM siswa GROUP BY thn_ajaran";
                    $result=mysqli_query($kon,$sql) or die('Error');
                    $hasil=mysqli_query($kon, $sql) ;
                        while($ta=mysqli_fetch_assoc($hasil)){
                        echo "<option value=$ta[thn_ajaran]>$ta[thn_ajaran]</option>";
                    } 
                ?>
            </select>
            </td>
            <td width="50" align="center">
            <select name="mapel">
                <?php 
                    $sql="SELECT * FROM mata_pelajaran GROUP BY nama_mp";
                    $result=mysqli_query($kon,$sql) or die('Error');
                    $hasil=mysqli_query($kon, $sql) ;
                        while($mapel=mysqli_fetch_assoc($hasil)){
                        echo "<option value=$mapel[nama_mp]>$mapel[nama_mp]</option>";
                    } 
                ?>
            </select>
            </td>
            <td>
            <button type="submit">input nilai</button>
            </td>
        </tr>
        </form>
    <?php
        $no++;
    }
    ?>
    </tbody>
</table><br>


</body>
</html>