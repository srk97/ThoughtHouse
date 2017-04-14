<?php

    $link = mysqli_connect("localhost", "root", "", "dbsproject");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

?>