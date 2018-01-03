<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();				
	}
	
?>

<div>
	<h2 id="headings"> Riwayat Alat</h2>
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Id Alat </b></td><td><b>Tanggal</b></td><td><b>Status</b></td>
		</thead>
		<tbody>
<?php
$batas='10';
$tabel="ts";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
if(isset($_GET['id'])) {
$id=$_GET['id'];
$query="select * from statusa where idAlat='$id'
 limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());

$num = 1;
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><? echo $posisi+$num?></td>
				
				<td><?		echo $rows ->idAlat;?></td>
				<td><?		echo $rows ->tanggal;?></td>
				<td><?		echo $rows ->statusa;?></td>
				
				
				
					
			</tr>
			<?	$num++;}?>
			<?}?>
		
		</tbody>
	</table>
	<?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("SELECT idAlat from statusa where idAlat='$id'");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?
pagination($halaman, $jumlah_halaman,"statusa");
?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?=$jmldata;?> </strong></div>
<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['statusa'])) {
	if($_GET['statusa'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

//close database?>

</div>
