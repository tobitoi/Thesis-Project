<?php
require_once ('../../inc/config.php');
if(isset($_POST)){
$username=$_POST['username'];
$password = md5(trim($_POST['password']));


$sql = "update pengelola set password='$password' where username='$username'";

$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if ($result) {
	header('location:../index.php?mod=login&pg=cp_form&status=0');
} else {
	header('location:../index.php?mod=login&pg=cp_form&status=1');
}
}
?>
