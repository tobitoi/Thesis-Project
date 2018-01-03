<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
 
 				//===========CODE DELETE RECORD ================

					if(isset($_GET['act'])) {
						$id = $_GET['id'];
						$sql = "delete from container where kode='$id' ";
						mysql_query($sql) or die(mysql_error());

					}
	
?>

					
<div>
	<!--<a href='index.php?mod=stok&pg=peta'><i class="icon-map-marker"></i>Map View</a>-->
	<h2 id="headings"> Data Transaksi</h2>
	 <form  action=" index.php?mod=invoice&pg=ts" class="form-signin"  method="POST">
            <br>
			<div class="input-group">
				<input type="text" class="form-control" name="status" placeholder="status kontainer..."> 
			<span class="input-group-btn">
			
				<button class="btn btn-lg btn-success" type="submit">Cari!</button></a>
				</span>
    </div><!-- /input-group -->
 
        </form>

				
	<table  class="table table-striped table-condensed">
		<thead>
			<th><td><b>Id Kontainer </b></td><td><b>Status</b></td><td><b>Blok</b></td><td><b>Baris</b></td><td><b>Celah</b></td><td><b>Ketinggian</b></td></th><td><b>Tipe</b></td></th><td><b>Ukuran</b></td></th><td><b>Nama Kapal</b></td></th>
			<td><b>Nama Agen</b></td></th><td><b>Nama Alat</b></td></th><td><b>Status Alat</b></td></th><td><b>Tanggal Status Kontainer</b></td></th><td style='min-width: 100px'><b>Aksi</b></td></th>
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
$query="SELECT container.*,masterkontainer.tipe,masterkontainer.size,masterkontainer.idAgen,agen.namaAgen,kapal.Nama,masteralat.namaAlat,masteralat.statusa
 from container,masterkontainer,kapal,masteralat,agen
 where container.idkontainer=masterkontainer.idkontainer   AND masterkontainer.idAgen = agen.idAgen AND container.idKapal=kapal.idKapal
 AND    container.idAlat=masteralat.idalat 
 limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data .Nama,agen.namaAgen,masteralat.namaAlat  AND container.idKapal=kapal.idKapal AND container.idAgen=agen.idAgen AND container.idAlat=masteralat.idAlat
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><? echo $posisi+$no?></td>
				
				<td><?		echo $rows ->idkontainer;?></td>
				<td><?		echo $rows ->status;?></td>
				<td><?		echo $rows ->blok;?></td>
				<td><?		echo $rows ->row;?></td>
				<td><?		echo $rows ->slot;?></td>
				<td><?		echo $rows ->tier;?></td>
				<td><?		echo $rows ->tipe;?></td>
				<td><?		echo $rows ->size;?></td>
				<td><?		echo $rows ->Nama;?></td>
				<td><?		echo $rows ->namaAgen;?></td>
				<td><?		echo $rows ->namaAlat;?></td>
				<td><?		echo $rows ->statusa;?></td>
				<td><?		echo $rows ->tanggalm;?></td>
				<td>
				
				<a title="Ubah data" href="index.php?mod=invoice&pg=ts_form1&id=<?=	$rows -> kode;?>"class='btn btn-warning'> <i class="icon-pencil"></i></a>
				<a title="Hapus data" href="index.php?mod=invoice&pg=ts_view&act=del&id=<?=$rows -> kode;?>"
				onclick="return confirm('Yakin data akan dihapus?') "; class='btn btn-danger'> <i class="icon-trash"></i></a>
				<a title="Riwayat" href="index.php?mod=invoice&pg=ts_riwayat&id=<?=	$rows -> idkontainer;?>"class=' btn btn-lg btn-success'> <i class="icon-list"></i></a></td></td>
				
				
				
			</tr>
			<?	$no++;
	}?>

			<tr>
				
				<td><a title="Tambah data" href="index.php?mod=invoice&pg=ts_form"  class='btn btn-primary'	><i class="icon-plus" alt="tambah data"> </i></a></td>
				
			</tr>
		</tbody>
	</table>
	<?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("SELECT kode from container");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);
?>
<div class='pagination'> 
	<ul>
<?
pagination($halaman, $jumlah_halaman,"container");
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
