<?php
include ('../inc/config.php');

$sql = "SELECT status, COUNT(idkontainer) as jumlah FROM container GROUP BY status";
$query = mysql_query($sql) or die(mysql_error());
?>
<html>
	<head>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/theme.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
			renderTo: 'container',
            type: 'column',
			
         },   
         title: {
			
			text: 'Jumlah Kontainer disetiap Status '
         },
         xAxis: {
            categories: ['status']
         },
         yAxis: {
            title: {
               text: 'Jumlah kontainer'
            }
         },
		
         legend: {
            borderRadius:0,
            backgroundColor: '#FFFFFF',
            itemMarginBottom: 7,
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',                
            y: 30,
            x: 2,
            borderWidth: 0,
            width:150,
            symbolPadding: 10,
            useHTML:true,
            shadow: {
              color: '#000',
              width: 3,
              opacity: 0.15,
              offsetY: 2,
              offsetX: 1
			  },
			  labelFormatter: function() {
              var total = 0;
			  for(var i=this.yData.length; i--;) { total += this.yData[i]; };
              return this.name + '.Total Kontainer: ' + total;
   
		 }},
              series:             
            [
          <?php
while ($ret = mysql_fetch_array($query)) {
    $nama_browser = $ret['status'];
    $jumlah_kunjungan = $ret['jumlah'];
    ?>
                        {
                            name: '<?php echo $nama_browser; ?>',
                            data: [<?php echo $jumlah_kunjungan; ?>]
                        },
<?php 
} 
?>
            ]
        });
    });	
</script>
	</head>
	<body>
		<div id='container'></div>		
	</body>
</html>