<?php
include "koneksi.php";
?>

<html>
<head>
<title>Input Nilai</title>
</head>

<body>
<h1 align="center">Tampilan Input Nilai</h1>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Kelas
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
            <thead>
        <tr align="center" bgcolor="#8EBEED">
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>Nama Mapel</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $kelas=mysqli_query($kon, "SELECT * FROM kelas GROUP BY nama_kelas");
    $no = 1;
    while ($data = mysqli_fetch_array($kelas)) {
    ?>
    <form action="index.php?act=nilai_input2" method="POST">
    <input name="id" type="hidden" value="<?=$data['kode_kelas']?>">
    <input name="nama_kelas" type="hidden" value="<?=$data['nama_kelas']?>">

        <tr>
            <td width="10" align="center"><?php echo $no; ?></td>
            <td width="190" align="center"><?php echo $data['nama_kelas']; ?></td>
            <td width="50" align="center">
            <select name="semester">
                <option value="">-Pilih Semester-</option>
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
            </select>
            </td>
            <td width="50" align="center">
            <select name="tahun_ajaran">
                <option value="">-Pilih Tahun Ajaran-</option>
                <?php if ($query = mysqli_query($kon, "SELECT thn_ajaran FROM siswa WHERE kode_kelas=$data[kode_kelas] GROUP BY thn_ajaran ")) :?>
                    <?php while ($ta = mysqli_fetch_assoc($query)) :?>
                        <option value="<?=$ta['thn_ajaran']?>"><?=$ta['thn_ajaran']?></option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>
            </td>
            <td width="50" align="center">
            <select name="mapel">
                <option value="">-Pilih Mata Pelajaran-</option>
                <?php if ($query_2 = mysqli_query($kon, "SELECT *
                        FROM siswa s
                        JOIN kelas rk ON s.kode_kelas = rk.kode_kelas
                        JOIN jadwal_pelajaran jm ON rk.kode_kelas = jm.kode_kelas
                        JOIN mata_pelajaran mp ON jm.kode_mp = mp.kode_mp
                        WHERE rk.kode_kelas=$data[kode_kelas]
                        GROUP BY mp.nama_mp")) :?>
                    <?php while ($ta = mysqli_fetch_assoc($query_2)) :?>
                        <option value="<?=$ta['kode_mp']?>"><?=$ta['nama_mp']?></option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>
            </td>
            <td  align="center">
            <button type="submit"  class="btn btn-success btn-lg">input nilai</button>
            </td>
        </tr>
        </form>
    <?php
        $no++;
    }
    ?>
    </tbody>
</table>
<a href="index.php?act=nilai_rekapitulasi" class="btn btn-danger btn-lg"> Kembali</a>
</div></div></div></body>
</html>