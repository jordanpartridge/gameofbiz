<?php 
require_once('classes.php');
require_once('sql_connect.php');
$pieArray = 'chart2.options.data[0].dataPoints';

	
if(count($_POST) > 0){
	//if the Post array has elements, it means the form has been processed therefore the game can begin and the setup screen is no longer needed.
	$setup = true;	
	   //Grab values from the form store as variables for easier retrieval.
	$name = $_POST["name"];
	 $type = $_POST["business"];
	$industry = $_POST["industry"];
	$education = $_POST["education"];
	
	require_once('market_initialize.php');
	
        
 

}

shuffle($event_deck);
        $event_card = array_pop($event_deck);
        shuffle($opp_deck);
        $opp_card = array_pop($opp_deck);
        
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Game of BIZ</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" href="themes/alertify.core.css" />
	<link rel="stylesheet" href="themes/alertify.default.css" id="toggleCSS" />
	<style>#alertify{
	 color: black;
	}
	</style>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
   <?php if($setup){
   include 'nav.php';
   }
   ?>
    <!-- Intro Header -->
	<header class="intro">
		<div class="intro-body">	
			<?php if(!$setup){
				include 'setup.php';
				
			}	else{
				include 'intro.php';
			}
			?>			
		</div>
	</header
		<!-- About Section -->
		<?php if($setup){
			include 'company-info.php';
			include 'performance.php';
		
	
		?>
   </div>
   </div>
   </div>
   </div>
   <section id="contact" class= text-center" style="margin: 50px;">
        <div class="row">
			<div class="col-lg-12" >
				<h2>Actions</h2>
				<div id="tabs" class="fluid-container" style=" width: 100%;">
					<ul>
					<li><a href="#hr">Human Resources</a></li>
					<li><a href="#inventory">Inventory</a></li>
					<li><a href="#tabs-3">Finance</a></li>
					<li><a href="#tabs-4">Marketing</a></li>
					</ul>
					<div id="hr">
					<h4>In the Human Resources Tab you are able to manage employees</h4>
					<p> You currently have no Employees </p>
					<button class="btn btn-info">Hire some </button>
					</div>
					<div id="inventory">
					<p>Here you are shown your current needs vs your current supply
					these figures will change as you make personnel changes</p>
					<div class="container-fluid" style="padding: 30px; height: 100%">
					<h2>needs</h2>
						 
					  <table class="table table-hover" style="font-size: 2em;">
						<thead>
						  <tr>
							<th class="text-center">Product</th>
							<th class="text-center">On Hand</th>
							<th class="text-center">Required</th>
						  </tr>
						</thead>
						<tbody>
						  <tr>
							<td>Office Furniture</td>
							<td class="officeOnHand">3</td>
							<td class="danger">4</td>
						  </tr>
					  <tr>
						<td>Desktop Computer Package</td>
						<td>2</td>
						<td class="success">2</td>
					  </tr>
					  <tr>
						<td>Software License</td>
						<td>3</td>
						<td class="success">1</td>
					  </tr>
					</tbody>
					</table>
					</div>
					</div>
					<div id="tabs-3">
					<p> Some text</p>
					</div>
				</div>
			</div>
		</div>
    </section>
    <?php } ?>

   

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Game of BIZ 2014</p>
        </div>
    </footer>

    <!!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
	<script src="js/alertify.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>
  
	<script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
 
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <script> 
   
   
   
   
   
   
  
	$(function() {
    		$("#tabs" ).tabs();
	});
	
	</script>
	<?php require_once('js/graphs.php'); ?>
	<script>
	var opportunity_complete = false;
	var event_complete = false;
	var money = 100000;
	var event_profit =  <?php echo $event_card->getProfit(); ?>;
	var opp_profit = <?php echo $opp_card->getProfit(); ?>;
	function update_money(){
		$('.money').text(money);
	}
	
	update_money();

	$('.dismiss-event').click(function(){
	   money += event_profit;
	   update_money();
	   generateGraphs();
	   
	
	
	
        
	$('.event-card').hide();
	if($('.company').hasClass('col-lg-6')){
		$('.company').removeClass('col-lg-6');
		$('.company').addClass('col-lg-9');
	}else{
		$('.company').removeClass('col-lg-9');
		$('.company').addClass('col-lg-12');
	}				
});
$('.opp-yes').click(function(){
	money += opp_profit;
	update_money();
	generateGraphs();
});
$('.opp-button').click(function(){
	opportunity_complete = true;


	$('.opp-card').hide();
	if($('.company').hasClass('col-lg-6')){
		$('.company').removeClass('col-lg-6');
		$('.company').addClass('col-lg-9');
	}else{
		$('.company').removeClass('col-lg-9');
		$('.company').addClass('col-lg-12');
	}
	

});

function incrementShare(index, amount){
 chart2.options.data[0].dataPoints[index].y += amount;
if(chart2.options.data[0].dataPoints[index].y <= 0){
	 chart2.options.data[0].dataPoints[index];
	 if(index == chart2.options.data[0].dataPoints.length - 1){
	 
	 chart2.options.data[0].dataPoints.pop();
	 } else{
	 
	 
	 chart2.options.data[0].datapoints.pop();
	 chart2.render();
	 
	 }
	 
	 }

chart2.render();

}
function setShare(index, amount){
<?php echo $pieArray ?>[index].y = amount;
chart2.render();
}

$('.next-cycle').click(function(){

<?php echo $pieArray ?>.pop();

chart2.render();
incrementShare(1, 5);
incrementShare(2, -5);
});
 
   $(document).ready(function(){
       
	generateGraphs();

	});
	</script>

</body>

</html>