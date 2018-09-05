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
	
	$tags = $_POST["tags"];
	
	if(strlen($tags) > 3)
	{
		$sql = "SELECT * FROM tags WHERE tag LIKE '%$tags%' LIMIT 0,1";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo ltrim($row['tag'], $tags);
			}
		}
	}
?>