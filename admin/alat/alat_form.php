<?php
 if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}

$aksi = null;
if (isset($_GET['id'])) {
	$aksi = "edit";
	$id = $_GET['id'];
	//baris dibawah ini disesuaikan dengan nama tabel dan idtabelnya
	$sql = "select * from masteralat where idAlat='$id' ";
	$result = mysql_query($sql) or die(mysql_error());
	$data = mysql_fetch_object($result);

} else {
	$aksi = "tambah";
}
?>

<!--kolom kiri-->

<h2> Form Alat</h2>

<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="alat/alat_action.php">

	<?php $id = $_GET['id']; ?>
	<input type='hidden' name='id' value="<?=$id?>">
	<div class="control-group">
		<label class="control-label" for="idAlat">id Alat</label>
		<div class="controls">
			<input type="text" name='idAlat'   value ='<?=$data->idAlat?>'class='required'
			>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" >Nama Alat</label>
		<div class="controls">
			<input type="text" name='namaAlat' value='<?=$data->namaAlat?>' class='required'
			>
		</div>
	</div>
	<div class="control-group">
        <label class="col-xs-3 control-label">Status</label>
        <div class="controls">
            <select class="control-control" name="status" class='required' >
                <option value="">Pilih Status Alat</option>
                <option value="Baik">Baik</option>
                <option value="Maintenance">Maintenance</option>
                 <option value="Rusak">Rusak</option>
            </select>
        </div>
    </div>
	<div class="control-group">
			<label class="control-label" for="lon">Tanggal Mulai</label>
			<div class="controls">
				<input type="text" name='tanggala' value='<?=tanggal1(); ?>'>
			</div>
		</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-success" name='aksi'value='<?=$aksi?>'>
				<?=$aksi ?>
			</button>
		</div>
	</div>

</form>
</div>