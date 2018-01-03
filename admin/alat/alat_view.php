<?php
 	if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
 				//===========CODE DELETE RECORD ================

					if(isset($_GET['act'])) {
						$id = $_GET['id'];
						$sql = "delete from masteralat where idAlat='$id' ";
						mysql_query($sql) or die(mysql_error());

					}
					?>

<div>
	<h2 id="headings"> Data Alat</h2>
	<!--<a href='index.php?mod=a&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>id Alat</b></td><td><b>Nama Alat</b></td><td><b>status</b></td><td><b>Tanggal </b></td><td style='min-width: 100px'><b>Aksi</b></td></th>
		</thead>
		<tbody>
<?php
$batas='5';
$tabel="alat";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$query="SELECT masteralat.idAlat,masteralat.namaAlat,masteralat.statusa,statusa.tanggal
 from masteralat,statusa where masteralat.IdAlat=statusa.idAlat AND masteralat.statusa =statusa.statusa
 limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><? echo $posisi+$no
				?></td>
			
				<td><?		echo $rows -> idAlat;?></td>
			<td><?		echo $rows ->namaAlat;?></td>
			<td><?		echo $rows->statusa;?></td>
			<td><?		echo $rows->tanggal;?></td>
			
				<td>	
					
				<a title="Ubah data"href="index.php?mod=alat&pg=alat_form&id=<?=	$rows -> idAlat;?>"class='btn btn-warning'> <i class="icon-pencil"></i></a>
				<a title="Hapus data"href="index.php?mod=alat&pg=alat_view&act=del&id=<?=	$rows -> idAlat;?>"onclick="return confirm('Yakin data akan dihapus?') ";  class='btn btn-danger'> <i class="icon-trash"></i></a>
				<a title="Riwayat data"href="index.php?mod=alat&pg=alat_riwayat&id=<?=	$rows -> idAlat;?>"class=' btn btn-lg btn-success'> <i class="icon-list"></i></a></td>
			</tr>
			<?	$no++;
	}?>

			<tr>
				<td colspan='5' ></td><td><a title="Tambah data"href="index.php?mod=alat&pg=alat_form"
				class='btn btn-primary'	><i class="icon-plus"></i></a></td>
			</tr>
		</tbody>
	</table>
	<?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("SELECT idalat from masteralat");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?
pagination($halaman, $jumlah_halaman,"alat");
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
