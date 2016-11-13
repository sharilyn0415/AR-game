<?php
    $servername = "database.czkqz5sr1paw.us-east-1.rds.amazonaws.com";
	$username = "username";
	$password = "password";
	$dbname = "sunyin";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>