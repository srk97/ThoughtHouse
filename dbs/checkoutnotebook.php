<?php

session_start();

if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }
    else
    {
    	//echo "hello";
    }

    if (array_key_exists("id", $_SESSION)) {

        
        /*echo "<p>Logged In! <a href='index.php?logout=1'>Log out</a></p>";*/

        /*$_SESSION['id'] = 0;*/

        include("connection.php");
        //echo $_SESSION['id'];
        $query = "SELECT `NotebookName` FROM `Notebook` WHERE User_id='".$_SESSION['id']."'";
        $frow = mysqli_query($link,$query);

                if(array_key_exists("submit", $_POST))
        {
        	
        	$_SESSION['Notebook'] = $_POST['submit'];
        	header("Location: loggedinpage.php");
        }

    }
    ?>


<?php include("header.php"); ?>

<?php 
$i=0;
while($row = mysqli_fetch_array($frow))
{
echo '<form method="post">
<button type="submit" name="submit" class="btn btn-success btn-lg btn-block" value='.$row['NotebookName'].'>'.$row['NotebookName'].'</button><br /><br /><br /></form>';
}

?>

 <?php include("footer.php"); ?>