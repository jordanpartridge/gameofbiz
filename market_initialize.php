<?php
$number_of_groups   = 5;
	$sum_to             = 100 - $mshare;
	$share             = array();
	$group              = 0;
	while(array_sum($share) != $sum_to){
		$share[$group] = mt_rand(0, $sum_to/mt_rand(1,5));

		if(++$group == $number_of_groups){
			$group  = 0;
		}
	}
	?>
