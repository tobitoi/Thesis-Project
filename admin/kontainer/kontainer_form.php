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
			$sql = "select * from masterkontainer where idkontainer='$id' ";
		$result = mysql_query($sql) or die(mysql_error());
		$data = mysql_fetch_object($result);

	} else {
		$aksi = "tambah";
	}?>



	<!--kolom kiri-->

		<h2> Form Kontainer</h2>
		
<form  class="form-horizontal" method="POST" id="form1"  enctype="multipart/form-data"
action="kontainer/kontainer_action.php">
	
		<?php		$id = $_GET['id'];?>
		<input type='hidden' name='id' value="<?=$id?>">
	<div class="control-group">
			<label class="control-label" for="idkontainer">Id Kontainer</label>
			<div class="controls">
				<input type="text" name='idkontainer' value='<?=$data->idkontainer?>'class='required'
				>
			</div>
		</div>

		
		
		
	<div class="control-group">
        <label class="col-xs-3 control-label">Jenis</label>
        <div class="controls">
            <select class="control-control" name="jenis" class='required' >
                <option value="">Pilih Jenis Kontainer</option>
                <option value="DRY">DRY</option>
                <option value="UC">UC</option>
                
            </select>
        </div>
    </div>

		<div class="control-group">
        <label class="col-xs-3 control-label">Ukuran</label>
        <div class="controls">
            <select class="control-control" name="ukuran" class='required' >
                <option value="">Pilih ukuran Kontainer</option>
                <option value="20">20</option>
                <option value="40">40</option>
                 <option value="80">80</option>
            </select>
        </div>
    </div>
		<div class="control-group">
			<label class="control-label" for="idAgen">Agen</label>
			<div class="controls">
				<select id='idAgen' name='idAgen' class="required " >
						<?php
   
			combo_agen($data->idAgen);
			?>
				</select>
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