
<?php

    session_start();

    if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
        
        /*echo "<p>Logged In! <a href='index.php?logout=1'>Log out</a></p>";*/

        $_SESSION['id'] = 0;

        include("connection.php");

        $query = "SELECT diary FROM `users` WHERE id = '".mysqli_real_escape_string($link,$_SESSION['id'])."'LIMIT 1";

        if(!($row1 = mysqli_query($link,$query)))
        	{echo mysqli_errno($link) . ": " . mysqli_error($link) . "\n";}

        $row2 = mysqli_fetch_array($row1);

        $diaryContent = $row2['diary'];
        
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
    <button class="btn btn-outline-success nav-item" type="button">Save </button>
      <!-- <a class="nav-item nav-link active" href="#">Save <span class="sr-only">(current)</span></a> -->
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a>
    </div>
  </div>

  <form class="form-inline">
    
    <button class="btn  btn-outline-success" type="button">Logout</button>
  </form>

</nav>



<div class="container-fluid">
	<textarea id="diary" class="form-control"><?php echo $diaryContent; ?></textarea>
</div>

    <!-- jQuery first, then Bootstrap JS. -->


<?php include("footer.php"); ?>