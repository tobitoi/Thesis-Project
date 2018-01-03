<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();				
	}
	
?>

<div>
	<h2 id="headings"> Riwayat Transaksi</h2>
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Id Kontainer </b></td><td><b>Status</b></td><td><b>Tanggal Status Kontainer</b></td><td><b>Selisih</b></td></th>
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
$query="select * from status where idkontainer='$id'
 limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());

$num = 1;
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><? echo $posisi+$num?></td>
				
				<td><?		echo $rows ->idkontainer;?></td>
				<td><?		echo $rows ->status;?></td>
				<td><?		echo $rows ->tanggal;?></td>
				<td><?
						if($num == 1) {
							echo "-";
						}  else {
							$nowdate = strtotime($rows ->tanggal);
							$diffdate = $nowdate - $beforedate;
							
							echo "Telat: ".date("d", $diffdate)." Hari, ".date("H", $diffdate)." Jam ".date("i", $diffdate);
							echo " Menit ".date("s", $diffdate)." Detik"; 
						}
						$beforedate = strtotime($rows ->tanggal);
				?></td>
				
					
			</tr>
			<?	$num++;}?>
			<?}else{ echo '<script> alert("id kontainer tidak ditemukan.") </script>';}?>
		
		</tbody>
	</table>
	<?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("SELECT idkontainer from status where idkontainer='$id'");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?
pagination($halaman, $jumlah_halaman,"status");
?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?=$jmldata;?> </strong></div>
<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

//close database?>

</div>
