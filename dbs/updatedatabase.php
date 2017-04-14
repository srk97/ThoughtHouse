<?php

    session_start();

    if (array_key_exists("content", $_POST)) {
        
        include("connection.php");
        
        $_SESSION['id'] = 0;
        
        $query = "UPDATE `users` SET `diary` = '".mysqli_real_escape_string($link, $_POST['content'])."' WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
        
        if(!mysqli_query($link, $query))
        	{die("i didn't update");}
        echo mysqli_errno($link) . ": " . mysqli_error($link) . "\n";
        
    }

?>
