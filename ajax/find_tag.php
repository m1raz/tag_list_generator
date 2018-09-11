<?php
	include '../conf/db.php';
	$tags = $_POST["tags"];
	if(strlen($tags) > 1)
	{
		$sql = "SELECT * FROM tagsgroup WHERE name = '$tags'";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				$groupid = $row['id'];
				$sql = "SELECT * FROM `tags_tagsgroup` WHERE tags_id = $groupid ORDER BY `order` ASC";
				$result = $conn->query($sql);
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$tsql = "SELECT * FROM `tags` WHERE id = " . $row['tagsGroup_id'];
						$tresult = $conn->query($tsql);
						if($tresult->num_rows > 0)
						{
							while($trow = $tresult->fetch_assoc())
							{
								echo "<li><button type='button' class='btn btn-success' onclick='addTag(this.innerText);'>#" . $trow['tag'] . "</button></li>";
							}
						}
					}
				}
			}
		}
		else
		{
			$sql = "SELECT * FROM tags WHERE tag LIKE '$tags%'";
			$result = $conn->query($sql);
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<li><button type='button' class='btn btn-primary' onclick='addTag(this.innerText);'>#" . $row['tag'] . "</button></li>";
				}
			}
			else
			{
				echo "You got unique tag! Do you want to <button type='button' class='btn btn-primary' onclick='createTag();'>add it to base</button>?";
			}
		}
	}
?>