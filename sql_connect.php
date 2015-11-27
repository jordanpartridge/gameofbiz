<?php
$servername = "localhost";
$username = "jordanp0_jordan";
$password = "food4me22";
$event_deck = new deck();
$opp_deck = new deck();
// Create connection
$conn = new mysqli($servername, $username, $password, "jordanp0_gameofbiz");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
function createDeck($tableName, $objectName, $column1, $column2)
{
	global $conn;
	$sql ="SELECT $column1, $column2 FROM $tableName";
	$result = $conn->query($sql);
	$return = array();
	if($result->num_rows >0){
		while($row = $result->fetch_assoc())
		$return[] = new $objectName($row[$column1], $row[$column2]);

		return $return;
	}
}

$event_deck = createDeck('eventCard', 'event_card', 'Description', 'profit');
$opp_deck = createDeck('oppCard', 'opp_card', 'Description', 'profit');




  ?>