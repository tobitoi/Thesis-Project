<?php
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
	$aksi = null;
	if(isset($_GET['id'])) {
		$aksi = "edit";
		$id = $_GET['id'];
		//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
		$sql = "select * from agen where idAgen='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>
	<script type="text/javascript" src="../css/style/js/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src='../css/style/js/editor.js'></script> 

<form  class="form-horizontal" method="POST" id="form1" action="agen/agen_action.php" enctype="multipart/form-data">
 <legend> Data Agen</legend>
	<input type='hidden' name='id' value="<?=$id?>">
  <div class="control-group">
    <label class="control-label" for="idAgen">id Agen</label>
    <div class="controls">
	<input type="text" name='idAgen' value='<?=$data->idAgen?>'class='required'> 
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="namaAgen">Nama Agen</label>
    <div class="controls">
      <input type="text" name='namaAgen' value='<?=$data->namaAgen?>'class='required'>
    </div>
   </div>
    
  <div class="control-group">
    <label class="control-label" for="alamat">Alamat</label>
    <div class="controls">
      <input type="text" name='alamat' value='<?=$data->alamat?>'class='required'>
    </div>
   </div>

  <div class="control-group">
    <div class="controls">
     
      <button type="submit" class="btn btn-success" name='aksi'value=<?=$aksi?> ><?=$aksi?></button>
    </div>
  </div>
</form>

<div id="form1_errorloc"  class="text-error"></div>
