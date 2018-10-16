<?php
include "koneksi.php";
  $sql="select * from kelas where kode_Kelas='$_POST[kode_Kelas]'";
$result=mysqli_query($kon,$sql) or die('Error');
$kelas=mysqli_query($kon, $sql) ;
?>

<table width="350" border="0" align="center" cellpadding="5" cellspacing="0">
<form action="proses_nilai.php" method="post" name="postform">
<h2 align="center" >Input Nilai Peserta Didik Kelas</h2>

<tr align="center">
  <th align="center">Semester</th>
  <th>Tahun Ajaran</th>
  <th>Mata Pelajaran</th>
</tr>
<tr align="center">
  <td width="25" height="50">
    <!-- <?php $_POST['semester']?> -->
  </td>
  <td width="25" height="50">
    <!-- <?=$_POST['tahun_ajaran']?> -->
  </td>
 <td align="center" width="50" height="50">
    <?php 
    $sql="select * from mata_pelajaran";
$result=mysqli_query($kon,$sql) or die('Error');
$kek=mysqli_query($kon, $sql) ;

      while ($mapel=mysqli_fetch_assoc($kek)) {
       ?>
      <?=$mapel['nama_mp']?>
    <?php } ?>
  </td>
</tr>

	<table width="800" border="1" align="center" cellpadding="5" cellspacing="0">
	<tr bgcolor="#8EBEED">
	  <th rowspan='2'>NO</th>
	  <th rowspan='2'>NIS</th>
	  <th rowspan='2'>NAMA</th>
	  <th rowspan='2'>KKM</th>
	  <th colspan='4'>PENILAIAN</th>
	</tr>
	<tr bgcolor="#8EBEED">
	  <th>Keterampilan</th>
	  <th>Pengetahuan</th>
	</tr>
	
	   <?php
	   $no = 1;
$sql="select * from guru";
$result=mysqli_query($kon,$sql) or die('Error');
$hasil=mysqli_query($kon, $sql) ;
	   while($row=mysqli_fetch_array($hasil)){
	   ?>
	   
	   <input type="hidden" value="<?=$_POST['semester']?>" name="semester">
	   <input type="hidden" value="<?=$_POST['mapel']?>" name="id_mapel">
	   <input type="hidden" value="<?=$_POST['tahun_ajaran']?>" name="tahun">
	   <tr>
		  <td align='center'><?=$no++?></td>
		  <input type="hidden" value="<?=$row['nis']?>" name="nis[]"/>
		  <td align='center'><?=$row['nis']?></td> <!--NIS-->
		  <td><?=$row['nama']?></td> <!--Nama-->

		  <!--- Input KKM-->
			<td align='center'>
				<?php 
				    $kekm=mysql_query("select * from mata_pelajaran where idmata_pelajaran=$_POST[mapel] LIMIT 1");
				      while ($mapel=mysql_fetch_assoc($kekm)) { ?>
				      <?=$mapel['KKM']?>
				    <?php } ?>
			</td>
			
			<!--- Input Nilai Keterampilan-->
			<td align='center'>
				<select name="ulHarian[]" id="ulHarian">
					<option value="">UlHarian</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select> &nbsp;
				<select name="uts[]" id="uts">
					<option value="">UTS</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select>	&nbsp;
				<select name="uas[]" id="uas">
					<option value="">UAS</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select>      
			</td>
			
			<!--- Input Nilai Pengetahuan-->
			<td align='center'>
				<select name="ulHarian2[]" id="ulHarian2">
					<option value="">UlHarian</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select>
				   &nbsp;
				<select name="uts2[]" id="uts2">
					<option value="">UTS</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select>
					&nbsp;
				<select name="uas2[]" id="uas2">
					<option value="">UAS</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select> 
			</td>
	   </tr>
	   
	   <?php } ?>
	</table>
<br />
<tr>
    <td colspan="3"><div align="center">
      <input type="submit" name="Submit" value="Input Nilai" />
     <input type="reset" name="reset" value="Reset" />
    </div></td>
  </tr>
</form>
