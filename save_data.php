<?php
	///prepere
	$pony_list = nl2br(file_get_contents("pony_list.txt"));
	$re = '/A/m';
	$pony_list = str_replace(" ", "_", $pony_list);
	$pony_list = str_replace(".", "", $pony_list);
	
	$re = '/.+/m';
	preg_match_all($re, $pony_list, $matches, PREG_SET_ORDER, 0);
	/*
	echo "<pre>";
	print_r($matches);
	echo "</pre>";
	*/
	$dat = array();
	$i = 0;
	foreach($matches as $m)
	{
		$dat[] = $m[0];
		$i++;
	}
	
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
	
	foreach($dat as $d)
	{
		$re = "/<br_\/>/m";
		$k = str_replace("<br_/>","",$d);
		$sql = "INSERT INTO `tags`(`id`, `tag`) VALUES (NULL, \"".$k."\")";
		if ($conn->query($sql) === TRUE) {
			echo "[" . $k . "] - New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	
	
?>