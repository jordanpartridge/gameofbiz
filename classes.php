<?php
class opp_card{
	private $description;
	private $profit;
	public function __construct($description, $profit) {
		$this->description = $description;
		$this->profit = $profit;
		
	
	}
	public function getDescription(){
		return $this->description;
	}
	public function getProfit(){
	        return $this->profit;
	}
}
class deck{
	private $deck = array();
	public function push($card){
		array_push($this->deck, $card);
		
	}
	public function pop(){
		return array_pop($this->deck);
	}
	public function shuffle(){
	      
		shuffle($deck);
		
	}
}
class event_card{
	private $description;
	private $profit;
	public function __construct($description, $profit) {
		$this->description = $description;
		$this->profit = $profit;
		
	
	}
	public function getDescription(){
		return $this->description;
	}
	public function getProfit(){
	        return $this->profit;
	}


}

?>