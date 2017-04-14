<?php

session_start();
error_reporting(0);
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
        //echo $_SESSION['Notebook'];

        $query2 = "SELECT `Notebook_ID` FROM `Notebook` WHERE User_ID='".$_SESSION['id']."' AND `NotebookName`='".$_SESSION['Notebook']."'";
        $exec2 = mysqli_query($link,$query2);
        $result = mysqli_fetch_array($exec2);
        $query = "SELECT `NoteName` FROM `NotePak` WHERE Notebook_ID='".$result['Notebook_ID']."'";
        $frow = mysqli_query($link,$query);

                if(array_key_exists("submit", $_POST))
        {
        	
        	$_SESSION['NoteName'] = $_POST['submit'];
            $queryforid = "SELECT `Note_ID` FROM NotePak WHERE NoteName='".$_POST['submit']."' AND Notebook_ID='".$result['Notebook_ID']."'";
            if(!($idresult = mysqli_query($link,$queryforid)))
            {
                //echo mysqli_errno($link) . ": " . mysqli_error($link) . "\n";
            }
            $idres = mysqli_fetch_array($idresult);
            print_r($idres);
            //echo $idres['Note_ID'];
            $_SESSION['NoteID'] = $idres['Note_ID'];
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
<button type="submit" name="submit" class="btn btn-success btn-lg btn-block" value='.$row['NoteName'].'>'.$row['NoteName'].'</button><br /><br /><br /></form>';
}

?>

 <?php include("footer.php"); ?>