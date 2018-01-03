<?php

if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
		//===========CODE DELETE RECORD ================
			
				if(isset($_GET['act'])) {
					$id = $_GET['id'];
					$sql = "delete from kapal where idKapal='$id' ";
					mysql_query($sql) or die(mysql_error());

				}
				//==========================================?>
<div class='bs-docs-example'>
	<h2 id="headings"> Data Kapal</h2>
	<table  class="table table-striped table-condensed">
		<thead>
		<th><td><b>Id Kapal </b></td><td><b>Nama Kapal</b></td><td style='min-width: 2px'><b>Aksi</b></td></th>
		</thead>
		<tbody>
		<?php
				//bata paging 
$batas='10';
$tabel="kapal";
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
		
$query="SELECT * from kapal order by Nama desc limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

		?>
		<tr>
			<td><? echo $posisi+$no
			?></td>
			<td><?		echo $rows -> idKapal;?></td>
			<td><?		echo $rows -> Nama;?></td>
			
			<td><a title="Ubah data" href="index.php?mod=kapal&pg=kapal_form&id=<?=	$rows -> idKapal;?>" 
				class='btn btn-warning'><i class="icon-pencil"></i></a><a title="Hapus data"href="index.php?mod=kapal&pg=kapal_view&act=del&id=<?=	$rows -> idKapal;?>"
			onclick="return confirm('Yakin data akan dihapus?') ";
			class='btn btn-danger'> <i class="icon-trash"></i></a></td>
		</tr>
		<?
	$no++;
	}?>

		<tr>
			<td colspan='3' ></td><td><a title="Tambah data" href="index.php?mod=kapal&pg=kapal_form"
			class='btn btn-success'	><i class="icon-plus"></i></a></td>
		</tr>
		</tbody>
	</table>
<?php	
//=============CUT HERE for paging====================================
$tampil2=mysql_query("select idKapal from kapal");
$jmldata=mysql_num_rows($tampil2);
$jumlah_halaman=ceil($jmldata/$batas);



?>
<div class='pagination'> 
	<ul>
<?php pagination($halaman, $jumlah_halaman, "kapal"); ?>
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
