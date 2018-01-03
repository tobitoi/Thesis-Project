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
			$sql = "select * from container where kode='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>



	<!--kolom kiri-->

		<h2> Form TS</h2>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="invoice/ts_action.php">
	
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?=$id?>">

	<div class="control-group">
			<label class="control-label" for="idkontainer">Nama Kontainer</label>
			<div class="controls">
				<select id='idkontainer' name='idkontainer' class="required " >
						<?php
   
    combo_kontainer($data->idkontainer);
   	?>
				</select>
			</div>
		</div>
		
		
		<div class="control-group">
        <label class="col-xs-3 control-label">Status</label>
        <div class="controls">
            <select class="control-control" name="status" class='required'  >
                <option value="">Pilih status Kontainer</option>
                <option value="1">1</option>
                <option value="2">2</option>
                 <option value="3">3</option>
				  <option value="4">4</option>
                 <option value="5">5</option>
            </select>
        </div>
    </div>
		<div class="control-group">
			<label class="control-label" for="lon">Blok</label>
			<div class="controls">
				<input type="text" name='blok'  value='<?=$data->blok?>' class='required'
				>
			</div>
		</div>
		<div class="control-group">
        <label class="col-xs-3 control-label">Baris</label>
       <div class="controls">
            <select class="control-control" name="baris" class='required'  >
                <option value="">Pilih Baris Kontainer</option>
                <option value="1">1</option>
                <option value="2">2</option>
                 <option value="3">3</option>
				  <option value="4">4</option>
                 <option value="5">5</option>
            </select>
			
        </div>
    </div>
		<div class="control-group">
        <label class="col-xs-3 control-label">Celah</label>
        <div class="controls">
            <select class="control-control" name="celah" class='required' >
                <option value="">Pilih status Kontainer</option>
                <option value="1">1</option>
                <option value="2">2</option>
                 <option value="3">3</option>
				  <option value="4">4</option>
                 <option value="5">5</option>
            </select>
        </div>
    </div>
		<div class="control-group">
        <label class="col-xs-3 control-label">Ketinggian</label>
        <div class="controls">
            <select class="control-control" name="ketinggian" class='required' >
                <option value="">Pilih Ketinggian Kontainer</option>
                <option value="1">1</option>
                <option value="2">2</option>
                 <option value="3">3</option>
				  <option value="4">4</option>
                 <option value="5">5</option>
            </select>
        </div>
    </div>
		
		
			<div class="control-group">
			<label class="control-label" for="idAlat">id Alat</label>
			<div class="controls">
				<select id='idAlat' name='idAlat' class="required " >
						<?php
   
    combo_alat($data->idAlat);
   	?>
				</select>
			</div>
		</div>

	<div class="control-group">
			<label class="control-label" for="lon">Tanggal Ubah Status</label>
			<div class="controls">
				<input type="text" name='tanggalm' value='<?=tanggal1(); ?>'>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success" name='aksi'value='<?=$aksi?>'>
				<?=$aksi?>
				</button>
			</div>
		</div>

</form>
</div>