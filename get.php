<?php 
	
	$conn = mysqli_connect('localhost','root','','cms');

	// Get Query
	$query = "SELECT * FROM ajax";

	$result = mysqli_query($conn, $query);
	// var_dump($result);
	$data = array();
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	// echo "<pre>";
	// var_dump($data);
	// echo "</pre>";

	$json = json_encode($data);
	echo $json;


 ?>