<?php  
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$users = $_POST["users"];
	echo "<b>$users's Posts:</b>";
	echo "<br><br>";
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Post ID</th>";
	echo "<th>Content</th>";
	echo "</tr>";
	
	$mysqli = new mysqli("mysql.eecs.ku.edu", "h616m004", "ii9kaequ", "h616m004");

	if ($mysqli->connect_errno) 
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$query = "SELECT * FROM Posts WHERE author_id = '$users'";
	if ($result = $mysqli->query($query)) 
	{
		while ($row = $result->fetch_assoc()) 
		{
			echo "<tr>";
			echo "<td>" . $row["post_id"] . "</td>";
			echo "<td>" . $row["content"] . "</td>";
			echo "</tr>";
		}
		$result->free();
	} 
	else 
	{
		printf("Error message: %s\n", $mysqli->error);
	}
	echo "</table><br><br>";
	$link = "https://people.eecs.ku.edu/~h616m004/EECS448-Lab10/lab10/AdminHome.html";
    	echo "<a href='$link'>Back to Admin Home</a>";
	$mysqli->close();
?>
