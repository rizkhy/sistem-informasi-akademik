<?php
include "koneksi.php";

$nis = $_GET['nis'];
$mapel = $_GET['kode_mp'];
$kelas = $_GET['kelas'];
$semester = $_GET['semester'];
$tahun_ajaran = $_GET['tahun_ajaran'];

?>

<h2 align="center">Nilai Peserta Didik Kelas <?php $kls = mysqli_fetch_array(mysqli_query($kon, "SELECT nama_kelas FROM kelas WHERE kode_kelas = '$kelas'")); echo $kls['nama_kelas']; ?></h2>
<hr />
<center>
<div class="panel panel-default">
	<div class="panel-heading">
         Edit Nilai
    </div>
<table>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php 
			$p = mysqli_query($kon, "SELECT * FROM siswa WHERE nis = $_GET[nis]");  
			while($ambil = mysqli_fetch_array($p)){
			  	echo $ambil['nama'];	
			}
		?></td>
	</tr>
	<tr>
		<td>Mata Pelajaran</td>
		<td>:</td>
		<td><?php $pilih = mysqli_query($kon, "SELECT * FROM mata_pelajaran WHERE kode_mp = $_GET[kode_mp]");  
			while($ambil = mysqli_fetch_array($pilih)){
			  	echo $ambil['nama_mp'];	
			}
		?></td>
	</tr>
	<tr>
		<td>Semester</td>
		<td>:</td>
		<td><?php echo $semester; ?></td>
	</tr>
	<tr>
		<td>Tahun Ajaran</td>
		<td>:</td>
		<td><?php echo $tahun_ajaran; ?></td>
	</tr>
</table>
<hr>
<form name="form" id="form" class="form" action="nilai_proses.php" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return validate(this)" method="post">
<input type="hidden" name="nis" value="<?=$_GET['nis']?>" />
<input type="hidden" name="kelas" value="<?=$_GET['kelas']?>" />
<input type="hidden" name="semester" value="<?php echo $semester; ?>" />
<input type="hidden" name="kode_mp" value="<?=$_GET['kode_mp']; ?>" />
<input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran;?>" />
<div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr align="center" bgcolor="#8EBEED">
					<th rowspan='5'>MATA PELAJARAN</th>
					<th rowspan='5'>SEMESTER</th>
					<th rowspan='5'>TAHUN AJARAN</th>
					<th colspan='8'>PENILAIAN</th>
				</tr>
				<tr align="center" bgcolor="#8EBEED">
					<th colspan='3'>KETERAMPILAN</th>
					<th colspan='3'>PENGETAHUAN</th>
				</tr>
				<tr align="center" bgcolor="#8EBEED">
					<!-- Nilai Keterampilan-->
					<th>Ul Harian</th>
					<th>UTS</th>
					<th>UAS</th>
					
					<!-- Nilai Pengetahuan-->
					<th>Ul Harian</th> 
					<th>UTS</th>
					<th>UAS</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<?php 
			$pilih = mysqli_query($kon, "SELECT * FROM mata_pelajaran WHERE kode_mp = $_GET[kode_mp]");  
			while($ambil = mysqli_fetch_array($pilih)){
			  	echo $ambil['nama_mp'];	
			}
		?>
					</td>
					<td><?php echo $semester; ?></td>
					<td><?php echo $tahun_ajaran; ?></td>
					<td><select name="uiharian1" id="uiharian1" class="form-control">
	<option value="<?php echo $_GET['uiharian1'];?>"><?php echo $_GET['uiharian1'];?></option>
	<?php 
	$nilai = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM nilai WHERE nis = '$nis' AND idmata_pelajaran = '$mapel' AND semester = '$semester' AND thn_ajaran = '$tahun_ajaran'"));
	for($i=0;$i<=100;$i++){
	if($nilai['tugas'] == $i){
	echo  "<option value='0'>$i</option>";
	}else{
	echo "<option>$i</option>";
	}}?>
    </select></td>
					<td><select name="uts1" id="uts1" class="form-control">
	  <option value="<?php echo $_GET['uts1'];?>"><?php echo $_GET['uts1'];?></option>
	  <?php for($i=0;$i<=100;$i++){
	if($nilai['uts'] == $i){
	echo  "<option value='0'>$i</option>";
	}else{
	echo "<option>$i</option>";
	}}?>
      </select></td>
					<td><select name="uas1" id="uas1" class="form-control">
	  <option value="<?php echo $_GET['uas1'];?>"><?php echo $_GET['uas1'];?></option>
	  <?php for($i=0;$i<=100;$i++){
	if($nilai['uas'] == $i){
	echo  "<option value='0'>$i</option>";
	}else{
	echo "<option>$i</option>";
	}}?>
      </select></td>
					<td><select name="uiharian2" id="uiharian2" class="form-control">

	<option value="<?php echo $_GET['uiharian2'];?>"><?php echo $_GET['uiharian2'];?></option>
	<?php 
	$nilai = mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM nilai WHERE nis = '$nis' AND idmata_pelajaran = '$mapel' AND semester = '$semester' AND thn_ajaran = '$tahun_ajaran'"));
	for($i=0;$i<=100;$i++){
	if($nilai['tugas'] == $i){
	echo  "<option value='0'>$i</option>";
	}else{
	echo "<option>$i</option>";
	}}?>
    </select></td>
					<td><select name="uts2" id="uts2" class="form-control">
	  <option value="<?php echo $_GET['uts2'];?>"><?php echo $_GET['uts2'];?></option>
	  <?php for($i=0;$i<=100;$i++){
	if($nilai['uts'] == $i){
	echo  "<option value='0'>$i</option>";
	}else{
	echo "<option>$i</option>";
	}}?>
      </select></td>
					<td><select name="uas2" id="uas2" class="form-control">
	  <option value="<?php echo $_GET['uas2'];?>"><?php echo $_GET['uas2'];?></option>
	  <?php for($i=0;$i<=100;$i++){
	if($nilai['uas'] == $i){
	echo  "<option value='0'>$i</option>";
	}else{
	echo "<option>$i</option>";
	}}?>
      </select></td>

				</tr>
			</tbody>
		</table>
	</div></div>
	<div align="center">
      <input type="submit" name="Submit" class="btn btn-success btn-lg" value="Simpan Data" />
    <input onclick="window.history.back()" type="reset" class="btn btn-warning btn-lg" value="Batal">
    </div>
</form>
</center>