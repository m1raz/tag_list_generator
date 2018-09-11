<?php
	session_start();
	include '../conf/db.php';
	
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	//$pwd = hash('sha512', $data);
	$sql = "SELECT * FROM `user` WHERE email = '$email' AND pwd = '$pwd' LIMIT 0,1";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$uid = $row['id'];
			$session_key = generate_session_key(500);
			$sql = "INSERT INTO `login` (`id`, `uid`, `session_key`, `start`, `end`) VALUES (NULL, '$uid', '$session_key', NULL, NULL)";
			if($conn->query($sql) === TRUE)
			{
				$_SESSION['key'] = $session_key;
			}
			exit();
		}
	}
	function generate_session_key($len = 5)
	{
		return substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzQWERTYUIOPASDFGHJKLZXCVBNM{}|:?[]\\;,./!@#$%^&*()-=_+", $len)), 0, $len);
	}
?>