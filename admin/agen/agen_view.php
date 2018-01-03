<?php

if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
		//===========CODE DELETE RECORD ================
			
				if(isset($_GET['act'])) {
					$id = $_GET['id'];
					$sql = "delete from agen where idAgen='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
				//==========================================?>
<div class='bs-docs-example'>
	<h2 id="headings"> Data Agen</h2>
	<table  class="table table-striped table-condensed">
		<thead>
		<th><td><b>Id Agen </b></td><td><b>Nama Agen</b></td><td><b>Alamat</b></td><td style='min-width: 2px'><b>Aksi</b></td></th>
		</thead>
		<tbody>
		<?php
				//bata paging 
$batas='10';
$tabel="agen";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
		
$query="SELECT * from agen order by namaAgen desc limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><? echo $posisi+$no
			?></td>
			<td><?		echo $rows -> idAgen;?></td>
			<td><?		echo $rows -> namaAgen;?></td>
			<td><?		echo $rows -> alamat;?></td>
			<td><a  title="Ubah data"href="index.php?mod=agen&pg=agen_form&id=<?=	$rows -> idAgen;?>" 
				class='btn btn-warning'><i class="icon-pencil"></i></a><a title="Hapus data" href="index.php?mod=agen&pg=agen_view&act=del&id=<?=	$rows -> idAgen;?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn btn-danger'> <i class="icon-trash"></i></a></td>
		</tr>
		<?
	$no++;
	}?>

		<tr>
			<td colspan='4' ></td><td><a title="Tambah data"href="index.php?mod=agen&pg=agen_form"
			class='btn btn-primary'	><i class="icon-plus"></i></a></td>
		</tr>
		</tbody>
	</table>
<?php	
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("SELECT idAgen from agen");

	$jmldata = mysql_num_rows($tampil2);
	$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?php pagination($halaman, $jumlah_halaman, "agen"); ?>
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
