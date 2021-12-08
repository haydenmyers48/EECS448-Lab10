<?php 
    error_reporting(E_ALL); 
    ini_set("display_errors", 1);
    $mysqli = new mysqli("mysql.eecs.ku.edu", "h616m004", "ii9kaequ", "h616m004");
    if ($mysqli->connect_errno) { 
        printf("Connect failed: %s\n", $mysqli->connect_error); 
        exit();
    }
    $content = $_POST["content"];
    $author = $_POST["author"];
    if($content == "")
    {
        echo "<p>You must enter content</p>";
    }
    //else if($author!=)
    else
    {
        $query = "INSERT INTO Posts (content, author_id) VALUES('$content', '$author')";
        if ($result = $mysqli->query($query))
        {
            echo "<p>Your post has been added</p>";
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
