<?php
include('inc/config.php');

 $alert= "<div class='alert alert-success' style='text-align: center;'>Data tidak ditemukan</div>";
 
	
		

		
		switch ($_GET['page']) {
			case 'rinci':
				include "rincian/riwayat.php";
		break;
		case 'grafik':
				include "grafik.php";
		break;
		}
?>


<html>
<head>
    
    <link href="css/style/css/bootstrap.min.css" rel="stylesheet">
	 <link href="css/style/css//login.css" rel="stylesheet">
</head>

<body class="container">
<div class="panel panel-info class">
<div class="panel-heading"><h2>Kontainer Info<h2></div>
  <div class="panel-body">
	
	<table  class="table table-bordered ">
		<thead>
			<td><b>#</b></td><td><b>Id Kontainer </b></td><td><b>Status Kontainer</b></td><td><b>Blok</b></td><td><b>Baris</b></td><td><b>Celah</b></td><td><b>Ketinggian</b></td></th><td><b>Tipe</b></td></th><td><b>Ukuran</b></td></th><td><b>Nama Kapal</b></td></th>
			<td><b>Nama Agen</b></td></th><td><b>Nama Alat</b></td></th><td><b>Status Alat</td></th><td><b>Tanggal Status Kontainer</b></td></th>
		</thead>
		<tbody>
<?
  
$idkontainer=$_POST['idkontainer'];
$idAgen=$_POST['idAgen'];
$query="SELECT container.*,masterkontainer.tipe,masterkontainer.size,masterkontainer.idAgen,agen.namaAgen,kapal.Nama,masteralat.statusa,masteralat.namaAlat
 from container,masterkontainer,kapal,masteralat,agen
 where container.idkontainer='$idkontainer' AND masterkontainer.idAgen='$idAgen' AND agen.idAgen=masterkontainer.idAgen AND container.idkontainer=masterkontainer.idkontainer  AND  container.idKapal=kapal.idKapal
  AND  container.idAlat=masteralat.idalat";
 
// where  idkontainer='$idkontainer'";
$result=mysql_query($query) or die(mysql_error());
$no=1;
if(mysql_num_rows($result) > 0){
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
					
			
			
				
<?	$no++;
	}?>
<?
	}else{ echo '<script> alert("id kontainer atau idAgen tidak ditemukan.") </script>';} ?>
			
		</tbody>	
		</div>
	</table>
	<div class="control-group">
			<div class="controls">

				
				<button type="submit" class="btn btn-lg btn-info class "> <a href="index.php?module=home"><font color="white">Kembali</font></button></a>
			</div>
		</div><br>
	<div class="panel panel-danger">
	<div class="panel-heading"><center>Keterangan Status Kontainer</div>
	<div class="panel-body">
    1 : Berada di atas kapal<br>
	2 : Gudang penumpukan sementara<br>
	3 : Gudang pemeriksaan <br>
	4 : Lapangan penumpukan<br>
	
  </div>
</div></div>
</body>
</html>
