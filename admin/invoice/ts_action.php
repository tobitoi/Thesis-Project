<?php
include ('../../inc/config.php');
include ('../../inc/function.php');
//data dari ts
if(isset($_POST)){
$idkontainer = $_POST['idkontainer'];
$status = $_POST['status'];
$blok = $_POST['blok'];
$baris = $_POST['baris'];
$celah = $_POST['celah'];
$ketinggian = $_POST['ketinggian'];
$namaKapal = $_POST['namaKapal'];

$idAlat = $_POST['idAlat'];
$aksi = $_POST['aksi'];
$id = $_POST['id'];
$tanggalm = $_POST['tanggalm'];
$sql = null;
$sql1=null;

if ($aksi == 'tambah') {
	$sql = "INSERT INTO container(idkontainer,status,blok,row,slot,tier,idKapal,idAlat,tanggalm)
		VALUES('$idkontainer',
		'$status','$blok','$baris','$celah','$ketinggian','$namaKapal','$idAlat','$tanggalm')";
		
	$sql1="INSERT INTO status (status,idkontainer,tanggal)
		VALUES('$status','$idkontainer','$tanggalm')";	
} else if ($aksi == 'edit') {

	$sql = "update container set idkontainer='$idkontainer',
	status='$status',blok='$blok',row='$baris',slot='$celah',tier='$ketinggian',idKapal='$namaKapal',idAlat='$idAlat',tanggalm='$tanggalm'
	where kode='$id'";
	$sql1="INSERT INTO status (status,idkontainer,tanggal)
		VALUES('$status','$idkontainer','$tanggalm')";
}

$result = mysql_query($sql) or die(mysql_error());
$result1 = mysql_query($sql1) or die(mysql_error());

//check if query successful
if ($result) {
	header('location:../index.php?mod=invoice&pg=ts_view&status=0');
} else {
	header('location:../index.php?mod=invoice&pg=ts_view&status=1');
}
}
?>
