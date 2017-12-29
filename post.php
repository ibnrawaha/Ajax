<?php 
	
	$conn = mysqli_connect('localhost','root','','cms');


	// var_dump($result);

	if(!empty($_POST)){

		$name = mysqli_escape_string($conn, $_POST['name'] );
		$email = mysqli_escape_string($conn, $_POST['email']);
		
		// POST Query
		$query = "INSERT INTO `ajax` (`name`,`email`) VALUES ('".$name."' , '".$email."')";
		// echo $query;
		$result = mysqli_query($conn, $query);

		$msg = "Successfully Added User: $name with Email: $email.";

		echo $msg;

		
	}
	
	// var_dump($_POST);
	
	
	


 ?>