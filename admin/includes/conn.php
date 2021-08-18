<?php
	$conn = new mysqli('localhost', 'root', '', 'av');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>
