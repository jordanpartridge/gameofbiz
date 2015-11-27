 <div class="container-fluid" style="padding: 50px;">  
	<form method="POST" action="">

		<h4>Game Setup</h4>
		<input class="name form-control" type="text" placeholder="Name of Business" name="name" required>
		<div class="row">
			<div class="col-sm-4 text-left" style="padding: 30px;">
				<h4> Business Type</h4>
				
					<?php 
					$sql="SELECT * FROM type";
					$result = $conn->query($sql);
					if($result->num_rows >0){
						while($row = $result->fetch_assoc()){ ?>
						<div class="radio">
					<label>
						<input type="radio" name="business" id="optionsRadios1" value="<?php echo $row['Name']; ?>" required>
						<?php echo $row['Name']; ?>
					</label>
				</div>
						
						
						<?php
						}
						
					}
					?>
				
			</div>
			<div class="col-sm-4" style="padding: 30px;">
				<h4>Industry</h4>
				<?php 
				$sql="SELECT * FROM industry";
				
				
				?>
				
				<label id="cindustry" style="color:red; display: none;">Business is Required</label>
				<select size="5" class="pull-right; form-control required" name="industry" required>
					
					<?php 
					$result = $conn->query($sql);
					if($result->num_rows >0){
		                        	while($row = $result->fetch_assoc()){
							echo '<option value="'. $row['Name'] .'" >' . $row['Name'] . '</option>';
						}
					}
					?>
				</select>
			</div>
			<div class="col-sm-4 text-left" style="padding: 30px;">
				<h4> Education </h4>
				<label id="ceducation" style="color:red; display: none;">Education is Required</label>
				<?php 
					$sql="SELECT * FROM education";
					$result = $conn->query($sql);
					if($result->num_rows >0){
						while($row = $result->fetch_assoc()){ ?>
				<div class="radio">
					<label>
						<input type="radio" name="education" id="optionsRadios1" value="<?php echo $row['Name']; ?>" required>
						<?php echo $row['Name']; ?>
					</label>
				</div>
				<?php }
				} ?>
				
				</div>
				</div>
			</div>
		
		<input type="submit" class="btn btn-default">
	</form>
	</div>