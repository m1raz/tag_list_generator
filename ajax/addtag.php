<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pony";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$tag = $_POST["tag"];
	$tag = str_replace(" ", "_", $tag);
	$tag = str_replace(".", "", $tag);
	$sql = "INSERT INTO `tags`(`id`, `tag`) VALUES (NULL, \"$tag\")";
	if ($conn->query($sql) === TRUE) {
		echo "<li><button type='button' class='btn btn-success' onclick='addTag(this.innerText);'>#" . $tag . "</button></li>";
	}
	$conn->close();
?>