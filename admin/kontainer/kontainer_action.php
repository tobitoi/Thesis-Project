<?php
include ('../../inc/config.php');
include('../../inc/function.php');
//data dari kontainer
if(isset($_POST)){
$idkontainer=$_POST['idkontainer'];
$jenis=$_POST['jenis'];
$ukuran=$_POST['ukuran'];
$idAgen=$_POST['idAgen'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];


if($aksi == 'tambah') {
	$sql = "INSERT INTO masterkontainer(idkontainer,tipe,size,
	idAgen)
		VALUES
		('$idkontainer',
		'$jenis','$ukuran','$idAgen')";
				
	
}else if($aksi== 'edit') {
		$sql = "update masterkontainer set tipe='$jenis',
	size='$ukuran',idAgen='$idAgen'
	where idkontainer='$idkontainer'";
	
	
	}


$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
	header('location:../index.php?mod=kontainer&pg=kontainer_view&status=0');
} else {
	header('location:../index.php?mod=kontainer&pg=kontainer_view&status=1');
}
}
?>
