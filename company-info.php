<section id="company-info" class="container content-section text-center" style="padding: 50px;">
	<div class="row">
		<div class="col-lg-12 ">
				<div class="col-lg-3 opp-card">
					<h5>Oppourtunity Card</h5>
					<p><?php echo $opp_card->getDescription(); ?></p>
					<button class="btn-default btn opp-yes opp-button">Yes</button>
					<button class="btn-default btn opp-no opp-button">No</button>
				</div>
			<div class=" company col-lg-6">
				<div class="row">
					<div id="business-title" class="col-sm-12 text-left">
						<h1 class="text-center"><span class='business-name text-center'><?php echo $name; ?></span></h1>
						<h2 class="business-type text-center"><?php echo $type; ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 text-center">
						<p>Industry:<br> <span class='industry'> <?php echo $industry; ?></span></p>
					</div>
					<div class="col-sm-6 text-center">
						<p>Education Level:<br> <span class='education'><?php echo $education; ?></span></p>
					</div>
				</div>
				<div class="row"  >
					<div  class="col-sm-6">
						<h4>Capital: $<span class="money"></span></h4>
					</div>
					<div class="cycle col-sm-6" >
					        <p>Cycle Number: 1</p>
						<button style="width: 140px;" class="next-cycle btn btn-primary">  Next Cycle  </button><br /><br />
						<button class="retire-button btn btn-primary">retire now</button>
					</div>
				</div>
			</div>
			<div class="col-lg-3 event-card" >
				<h5>Event Card</h5>
				<p><?php echo $event_card->getDescription(); 
				   
				   
				?></p>
				
				
				<button  class="dismiss-event btn btn-primary">ok</button>
			</div>
		</div>
	</div>
</section>