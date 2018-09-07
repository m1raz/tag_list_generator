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
	
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	//$pwd = hash('sha512', $data);
	$sql = "SELECT * FROM `user` WHERE email = '$email' AND pwd_sha = '$pwd' LIMIT 0,1";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			exit("<button type='button' class='btn btn-primary' onclick='openPony();'>Continue as " . $row['name'] . ".</button>");	
		}
	}
	
?>

<div class="form-group">
	<label for="email">Email address:</label>
	<input type="email" class="form-control" id="email">
</div>
<div class="form-group">
	<label for="pwd">Password:</label>
	<input type="password" class="form-control" id="pwd">
</div>
<div class="checkbox">
	<label><input type="checkbox"> Remember me</label>
</div>
<button type="submit" class="btn btn-default" onclick="login();">Submit</button>