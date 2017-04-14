
<?php
  error_reporting(0);
    session_start();
    if(array_key_exists("id", $_GET))
    {
      $_SESSION['id'] = $_GET['id'];
    }
    //echo "It is ".$_SESSION['Notebook']."!";

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
       // echo "hello";
        
    }

    if (array_key_exists("id", $_SESSION)) {
       // echo "world";
        /*echo "<p>Logged In! <a href='index.php?logout=1'>Log out</a></p>";*/

        /*$_SESSION['id'] = 0;*/
       // echo $_SESSION['id'];
        include("connection.php");

       // echo $_SESSION['Notebook'];

        $query = "SELECT Notes FROM `NotePak` WHERE Note_ID = '".$_SESSION['NoteID']."'LIMIT 1";

        if(!($row1 = mysqli_query($link,$query)))
        	{echo mysqli_errno($link) . ": " . mysqli_error($link) . "\n";}

        $row2 = mysqli_fetch_array($row1);

        $diaryContent = $row2['Notes'];
        
    } else {
        
        header("Location: index.php");
        
    }

    /*include("header.php");*/
?>

<?php include("header.php"); ?>


<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse sticky-top">

  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Thought House</a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <button class="btn btn-outline-success nav-item" type="button" id="diaryclk">Save </button>
      <!-- <a class="nav-item nav-link active" href="#">Save <span class="sr-only">(current)</span></a> -->
      <a class="nav-item nav-link" href="newnotebook.php">NewNotebook</a>
      <a class="nav-item nav-link" href="newnote.php">NewNote</a>
      <a class="nav-item nav-link" href="checkoutnotebook.php">CheckoutNotebook</a>
      <a class="nav-item nav-link" href="checkoutnote.php">CheckoutNote</a>
    </div>
  </div>

  <form class="form-inline">
    
    <button class="btn  btn-outline-success" type="button"><a href='index.php?logout=1'>Logout</a></button>
  </form>

</nav>



<div class="container-fluid">
	<textarea id="diary" class="form-control"><?php echo $diaryContent; ?></textarea>
</div>

    <!-- jQuery first, then Bootstrap JS. -->


<?php include("footer.php"); ?>