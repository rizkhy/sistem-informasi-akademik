<?php
include "koneksi.php";
  
  $sql = mysqli_query($kon, "select * from kelas where kode_kelas");
  $kelas = mysqli_fetch_array($sql);
?>
<h2 align="center" >Input Nilai Peserta Didik Kelas <?=$_POST['nama_kelas']?></h2>
<div class="panel panel-default">
    <div class="panel-heading">
         Data Kelas
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            
<table width="350" border="0" align="center" cellpadding="5" cellspacing="0">
<form action="nilai_proses_input.php" method="post" name="postform">


<tr align="center">
  <th align="center">Semester</th>
  <th>Tahun Ajaran</th>
  <th>Mata Pelajaran</th>
</tr>
<tr align="center">
  <td width="25" height="50">
    <?=$_POST['semester']?>
  </td>
  <td width="25" height="50">
    <?=$_POST['tahun_ajaran']?>
  </td>
 <td align="center" width="50" height="50">
    <?php 
    $kek=mysqli_query($kon, "select * from mata_pelajaran where kode_mp='$_POST[mapel]' LIMIT 1");
      while ($mapel=mysqli_fetch_assoc($kek)) { ?>
      <?=$mapel['nama_mp']?>
    <?php } ?>
  </td>
</tr>
</table>

	<table class="table table-striped table-bordered table-hover">
	<thead>
	<tr bgcolor="#8EBEED">
	  <th rowspan='2'>No</th>
	  <th rowspan='2'>NIS</th>
	  <th rowspan='2'>Nama</th>
	  <th rowspan='2'>KKM</th>
	  <th colspan='4'>Penilaian</th>
	</tr>
	<tr bgcolor="#8EBEED">
	  <th>Keterampilan</th>
	  <th>Pengetahuan</th>
	</tr>
	</thead>
	
	   <?php
	   $no=1;
	   $query=mysqli_query($kon, "select * from siswa where kode_kelas='$_POST[id]'");
	   while($row=mysqli_fetch_array($query)){
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
				    $kekm=mysqli_query($kon, "select * from mata_pelajaran where kode_mp=$_POST[mapel] LIMIT 1");
				      while ($mapel=mysqli_fetch_assoc($kekm)) { ?>
				      <?=$mapel['KKM']?>
				    <?php } ?>
			</td>
			
			<!--- Input Nilai Keterampilan-->
			<td align='center'>
				<select name="nilai_harian[]" id="nilai_harian">
					<option value="">Harian</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select> &nbsp;
				<select name="nilai_uts[]" id="nilai_uts">
					<option value="">UTS</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select>	&nbsp;
				<select name="nilai_uas[]" id="nilai_uas">
					<option value="">UAS</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select>      
			</td>
			
			<!--- Input Nilai Pengetahuan-->
			<td align='center'>
				<select name="nilai_harian2[]" id="nilai_harian2">
					<option value="">Harian</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select>
				   &nbsp;
				<select name="nilai_uts2[]" id="nilai_uts2">
					<option value="">UTS</option>
					<?php for($i=30;$i<=100;$i++){echo "<option>$i</option>";}?>
				</select>
					&nbsp;
				<select name="nilai_uas2[]" id="nilai_uas2">
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
      <input type="submit" name="Submit"  class="btn btn-success btn-lg" value="Input Nilai" />
     <input onclick="window.history.back()" type="reset" class="btn btn-warning btn-lg" value="Batal">
    </div></td>
  </tr>
</form>
