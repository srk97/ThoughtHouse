<?php

    session_start();

    if (array_key_exists("content", $_POST)) {
        
        include("connection.php");
        
               
        $query = "UPDATE `NotePak` SET `Notes` = '".mysqli_real_escape_string($link, $_POST['content'])."' WHERE Note_ID = ".$_SESSION['NoteID']." LIMIT 1";
        
        if(!mysqli_query($link, $query))
        	{die("i didn't update");}
        //echo mysqli_errno($link) . ": " . mysqli_error($link) . "\n";
        
    }

?>
