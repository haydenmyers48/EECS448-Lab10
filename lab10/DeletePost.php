<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$mysqli = new mysqli("mysql.eecs.ku.edu", "h616m004", "ii9kaequ", "h616m004");
	if (!isset($_POST["delete"])) 
	{
		echo "<p>You did not delete any posts</p>";
	}
	else 
	{

		if ($mysqli->connect_errno) 
		{
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}
		$delete = $_POST["delete"];
		for($i=0; $i<sizeof($delete); $i++)
		{
			$query = "DELETE FROM Posts WHERE post_id='$delete[$i]'";
			if ($result = $mysqli->query($query)) 
			{
				echo "<p>Deleted Post with ID: $delete[$i]</p>";
			} 
			else 
			{
				printf("Error message: %s\n", $mysqli->error);
			}
		}
	}
	$link = "https://people.eecs.ku.edu/~h616m004/EECS448-Lab10/lab10/AdminHome.html";
    	echo "<a href='$link'>Back to Admin Home</a>";
	$mysqli->close();
?>
