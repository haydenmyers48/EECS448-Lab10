<?php 
    error_reporting(E_ALL); 
    ini_set("display_errors", 1);
    $mysqli = new mysqli("mysql.eecs.ku.edu", "h616m004", "ii9kaequ", "h616m004");
    if ($mysqli->connect_errno) { 
        printf("Connect failed: %s\n", $mysqli->connect_error); 
        exit(); 
    }
    $user = $_POST["user"];
    if($user == "")
    {
        echo "<p>You must enter a username</p>";
    }
    else
    {
        $query = "INSERT INTO Users (user_id) VALUES('$user')";
        if ($result = $mysqli->query($query))
        {
            echo "<p>Your username has been entered</p>";
            //$result->free();
        }
        else 
        {
            printf("Error: %s", $mysqli->error);
        }
    }
    $link = "https://people.eecs.ku.edu/~h616m004/EECS448-Lab10/lab10/index.html";
    echo "<a href='$link'>Back to Index Page</a>";
    $mysqli->close();
?>
