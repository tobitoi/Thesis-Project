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
		$sql = "select * from kapal where idKapal='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>
	<script type="text/javascript" src="../css/style/js/tinymce/tiny_mce.js"></script>
<script type="text/javascript" src='../css/style/js/editor.js'></script> 

<form  class="form-horizontal" method="POST" id="form1" action="kapal/kapal_action.php" enctype="multipart/form-data">
 <legend> Data Kapal</legend>
	<input type='hidden' name='id' value="<?=$id?>">
  <div class="control-group">
    <label class="control-label" for="idKapal">Id Kapal</label>
    <div class="controls">
	<input type="text" name='idKapal' value='<?=$data->idKapal?>'class='required'> 
    </div>
   </div>
   <div class="control-group">
    <label class="control-label" for="Nama">Nama Kapal</label>
    <div class="controls">
      <input type="text" name='Nama' value='<?=$data->Nama?>'class='required'>
    </div>
   </div>
  <div class="control-group">
    <div class="controls">
     
      <button type="submit" class="btn btn-success" name='aksi'value=<?=$aksi?> ><?=$aksi?></button>
    </div>
  </div>
</form>

<div id="form1_errorloc"  class="text-error"></div>
