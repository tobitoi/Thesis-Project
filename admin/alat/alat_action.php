<?php
include ('../../inc/config.php');
include('../../inc/function.php');
//data dari alat
if(isset($_POST)){
$idAlat=$_POST['idAlat'];
$namaAlat=$_POST['namaAlat'];
$status=$_POST['status'];
$tanggala=$_POST['tanggala'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];
$sql = null;
$sql1=null;

if($aksi == 'tambah') {
	$sql = "INSERT INTO masteralat(idAlat,namaAlat,
	statusa)
		VALUES('$idAlat',
		'$namaAlat','$status')";
	$sql1 = "INSERT INTO statusa(idAlat,statusa,tanggal
	)
		VALUES('$idAlat',
		'$status','$tanggala')";
}else if($aksi== 'edit') {
	
		$sql = "update masteralat set namaAlat='$namaAlat',
	statusa='$status'
	where idAlat='$idAlat'";
	$sql1 = "INSERT INTO statusa(idAlat,statusa,tanggal
	)
		VALUES('$idAlat',
		'$status','$tanggala')";
}

$result = mysql_query($sql) or die(mysql_error());
$result1 = mysql_query($sql1) or die(mysql_error());
//check if query successful
if($result) {
	header('location:../index.php?mod=alat&pg=alat_view&status=0');
} else {
	header('location:../index.php?mod=alat&pg=alat_view&status=1');
}
}
?>
