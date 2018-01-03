<?php
include ('../../inc/config.php');
include('../../inc/function.php');
//data dari agen
if(isset($_POST)){
$idAgen=$_POST['idAgen'];
$namaAgen=$_POST['namaAgen'];
$alamat=$_POST['alamat'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];


if($aksi == 'tambah') {
	$sql = "INSERT INTO agen(idAgen,namaAgen,alamat)
		VALUES
		('$idAgen',
		'$namaAgen','$alamat')";
				
	
}else if($aksi== 'edit') {
		$sql = "update agen set namaAgen='$namaAgen',
	alamat='$alamat'
	where idAgen='$idAgen'";
	
	
	}


$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
	header('location:../index.php?mod=agen&pg=agen_view&status=0');
} else {
	header('location:../index.php?mod=agen&pg=agen_view&status=1');
}
}
?>
