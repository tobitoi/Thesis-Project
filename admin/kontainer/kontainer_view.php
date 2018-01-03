<?php //===========CODE DELETE RECORD ================
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}

if (isset($_GET['act'])) {
	$id = $_GET['id'];
	$sql = "delete from masterkontainer where idkontainer='$id' ";
	mysql_query($sql) or die(mysql_error());

}
					?>

<div>
	<h2 id="headings"> Data Kontainer</h2>
	<!--<a href='index.php?mod=produk&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Id Kontainer </b></td><td><b>Jenis</b></td><td><b>Tipe</b></td><td><b>Agen</b></td><td style='min-width: 2px'><b>Aksi</b></td></th>
		</thead>
		<tbody>
<?php
$batas='10';
$tabel="kontainer";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$query="SELECT masterkontainer.*, agen.namaAgen
 from masterkontainer,agen
 where masterkontainer.idAgen=agen.idAgen
 limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><?php echo $posisi+$no
				?></td>
			
				<td><?php echo $rows ->idkontainer; ?></td>
				<td><?php echo $rows ->tipe; ?></td>
				<td><?php echo $rows ->size; ?></td>
				<td><?php echo $rows ->namaAgen; ?></td>
			
				<td>	
					
					<a title="Ubah data" href="index.php?mod=kontainer&pg=kontainer_form&id=<?= $rows -> idkontainer; ?>"

				class='btn btn-warning'> <i class="icon-pencil"></i></a><a title="Hapus data" href="index.php?mod=kontainer&pg=kontainer_view&act=del&id=<?= $rows -> idkontainer; ?>"
				onclick="return confirm('Yakin data akan dihapus?') ";
				class='btn btn-danger'> <i class="icon-trash"></i></a></td>
			</tr>
			<?php $no++;
				}
			?>
			
			<tr>
				<td colspan='5' ></td><td><a title="Tambah data" href="index.php?mod=kontainer&pg=kontainer_form"
				class='btn btn-primary'	><i class="icon-plus"></i></a></td>
			</tr>
		</tbody>
	</table>
	<?php //=============CUT HERE for paging====================================
	$tampil2 = mysql_query("SELECT idkontainer from masterkontainer");

	$jmldata = mysql_num_rows($tampil2);
	$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php pagination($halaman, $jumlah_halaman, "kontainer"); ?>
	</ul>
</div>
<div class='well'>Jumlah data :<strong><?= $jmldata; ?> </strong></div>
<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}

//close database
?>

</div>
