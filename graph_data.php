<?php

include 'server_side\scripts\fetch_differentials.php';
include 'server_side\scripts\navbar.php';
//get connection
//$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
//
//if(!$mysqli){
//die("Connection failed: " . $mysqli->error);
//}
//
//query to get data from the table
$graph_query = sprintf("SELECT param_name, date_, time_difference FROM daily_differentials ORDER BY date_");
//
//execute query
$graph_result = $mysqli->query($graph_query);
//
//loop through the returned data
$data = array();
foreach ($graph_result as $row) {
  $data[] = $row;
}
//free memory associated with result
$graph_result->close();
//close connection
$mysqli->close();
//now print the data
print json_encode($data);

?>