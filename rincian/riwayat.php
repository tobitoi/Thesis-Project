<body class="container">
<div class="panel panel-info class">
<div class="panel-heading"><h2>Kontainer Info<h2></div>
  <div class="panel-body">
	
	<table  class="table table-bordered ">
		<thead>
			<td><b>#</b></td><td><b>Id Kontainer </b></td><td><b>Status Kontainer</b></td><td><b>Tanggal</b></td>
			
		</thead>
		<tbody>
<?
if(isset($_GET['id'])) {  
$id=$_GET['id'];
$query="select * from status where idkontainer='$id'";
 

$result=mysql_query($query) or die(mysql_error());
$no=1;
if(mysql_num_rows($result) > 0){
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><? echo $posisi+$no?></td>
				
				<td><?		echo $rows ->idkontainer;?></td>
				<td><?		echo $rows ->status;?></td>
				<td><?		echo $rows ->tanggal;?></td>
					<td><?
						if($no == 1) {
							echo "-";
						}  else {
							$nowdate = strtotime($rows ->tanggal);
							$diffdate = $nowdate - $beforedate;
							
							echo "Telat: ".date("d", $diffdate)." Hari, ".date("H", $diffdate)." Jam ".date("i", $diffdate);
							echo " Menit ".date("s", $diffdate)." Detik"; 
						}
						$beforedate = strtotime($rows ->tanggal);
				?></td>
				
					
			</tr>
<?	$no++;}?>
<?
}} ?>
			
		</tbody>	
		</div>
	</table>
	<div class="control-group">
			<div class="controls">
				
				<button type="submit" class="btn btn-lg btn-info class "> <a href="index.php?module=home"><font color="white">Kembali</font></button></a>
			</div>
		</div><br>
	<div class="panel panel-danger">
	<div class="panel-heading"><center>Keterangan Status Kontainer</div>
	<div class="panel-body">
    1 :<br>
	2 :<br>
	3 :<br>
	4 :<br>
	5 :<br>
  </div>
</div></div>
</body>
