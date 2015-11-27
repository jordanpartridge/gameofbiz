<?php
$names = array();

	$sql="SELECT * FROM company_name";
	$result = $conn->query($sql);
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
		$names[] = $row['name'];
		}
	}
	

	shuffle($names);
	

 ?>
<script>
mshare = 10;
function generateGraphs(){
	var dps = []; // dataPoints

	var chart = new CanvasJS.Chart("chartContainer",{
		title :{
			text: "<?php echo $name; ?> Performance"
		},
		axisY: {
			prefix: "$",
			suffix: "K"},
		axisX: {valueFormatString: "hh:mm:ss",
		 
				interval: 100,
				labelAngle: -50,
		},
					
		data: [{
			type: "line",
			dataPoints: dps 
		}]
	});
	var d = new Date();

	var xVal = 800;
	var yVal = 100;	
	var updateInterval = 1000;
	var dataLength = 15; // number of dataPoints visible at any point

	var updateChart = function (count) {
	count = count || 1;
	// count is number of times loop runs to generate random dataPoints.

	for (var j = 0; j < count; j++) {	
		yVal = yVal +  Math.round(5 + Math.random() *(-5-5));
		dps.push({
		x: new Date(),
		y: yVal
		});
		xVal++;
		};
		if (dps.length > dataLength){
			dps.shift();				
		}
		chart.render();		

	};

	// generates first set of dataPoints
	updateChart(dataLength); 

	// update chart after specified time. 
	setInterval(function(){updateChart()}, updateInterval); 
	chart2 = new CanvasJS.Chart("chartContainer2",{
		title:{
			text: "Market Share by Company for The <?php echo $industry; ?> Industry",
		},
                addPoint: function(value , name){
                   this.options.data[0].dataPoints.push( {y: value, legendText: name, label: name} );

                  }
 
                 ,
		exportFileName: "Pie Chart",
		exportEnabled: true,
		animationEnabled: true,
		legend:{
			verticalAlign: "bottom",
			horizontalAlign: "center"
		},
		data: [{       
			type: "pie",
				showInLegend: true,
				toolTipContent: "{legendText}: <strong>${y}</strong>",
				indexLabel: "{label} ${y}",
				dataPoints: [
					{  y: money, legendText: "<?php echo $name; ?>", exploded: true, label: "<?php echo $name; ?>"},
					
					{  y: Math.floor((Math.random() * 500000) + 75000), legendText: "<?php echo $names[0]; ?>", label: "<?php echo $names[0]; ?>" },
					{  y: Math.floor((Math.random() * 500000) + 75000), legendText: "<?php echo $names[1]; ?>", label: "<?php echo $names[1]; ?>" },
					{  y: Math.floor((Math.random() * 500000) + 75000), legendText: "<?php echo $names[2]; ?>", label: "<?php echo $names[2]; ?>"},
					{  y: Math.floor((Math.random() * 500000) + 75000), legendText: "<?php echo $names[3]; ?>", label: "<?php echo $names[3]; ?>" },
					{  y: Math.floor((Math.random() * 500000) + 75000), legendText: "<?php echo $names[4]; ?>", label: "<?php echo $names[4]; ?>"}
				]

			}
		]
	});
	chart2.render();
	

}

</script>	