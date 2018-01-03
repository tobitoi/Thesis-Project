<?php
include ('../../inc/config.php');
include('../../inc/function.php');
//data dari kapal
if(isset($_POST)){
$idKapal=$_POST['idKapal'];
$Nama=$_POST['Nama'];

$aksi = $_POST['aksi'];
$id = $_POST['id'];


if($aksi == 'tambah') {
	$sql = "INSERT INTO kapal(idKapal,Nama)
		VALUES
		('$idKapal',
		'$Nama')";
				
	
}else if($aksi== 'edit') {
		$sql = "update kapal set Nama='$Nama'
	where idKapal='$idKapal'";
	
	
	}


$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
	header('location:../index.php?mod=kapal&pg=kapal_view&status=0');
} else {
	header('location:../index.php?mod=kapal&pg=kapal_view&status=1');
}
}
?>
