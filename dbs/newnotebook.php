<?php
session_start();

   /* if (array_key_exists("id", $_COOKIE)) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }
    else
    {
    	echo "hello";
    }

    if (array_key_exists("id", $_SESSION)) {*/

    	include("connection.php");

    	if (array_key_exists("btnSubmit", $_POST))
    	{
    	$query = "INSERT INTO `Notebook` (`NotebookName`, `User_ID`) VALUES ('".mysqli_real_escape_string($link, $_POST['q1'])."', '".mysqli_real_escape_string($link, $_SESSION['id'])."')";

    	$row1 = mysqli_query($link,$query);
    	header("Location: loggedinpage.php");
    }
    	else
    	{
    		echo "mid";
    	}
  /*  }
    else
    {
    	echo "world";
    }*/
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>ThoughtHouse</title>
		<meta name="description" content="Minimal Form Interface: Simplistic, single input view form" />
		<meta name="keywords" content="form, minimal, interface, single input, big form, responsive form, transition" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<!-- Top Navigation -->

			<header class="codrops-header">
				<h1>Thought House<span>Build a new house of thoughts</span></h1>	
			</header>
			<section>
				<form id="theForm" class="simform" autocomplete="off" method="post">
					<div class="simform-inner">
						<ol class="questions">
							<li>
								<span><label for="q1">What's your Notebook's name?</label></span>
								<input id="q1" name="q1" type="text"/>
							</li>
							<li>
								<span><label for="q2">Give a short description of your notebook</label></span>
								<input id="q2" name="q2" type="text"/>
							</li>

						</ol><!-- /questions -->
						<!-- <button name="btnSubmit" type="submit">Send answers</button> -->
						<div class="controls">
							<button class="next"></button>
							<div class="progress"></div>
							<span class="number">
								<span class="number-current"></span>
								<span class="number-total"></span>
							</span>
							<span class="error-message"></span>
						</div><!-- / controls -->
					</div><!-- /simform-inner -->
					<span class="final-message"></span>
				</form><!-- /simform -->			
			</section>

		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/stepsForm.js"></script>
		<script>
			var theForm = document.getElementById( 'theForm' );

			new stepsForm( theForm, {
				onSubmit : function( form ) {
					// hide form
					classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );
					console.log(form);
					

					/*
					form.submit()
					or
					AJAX request (maybe show loading indicator while we don't have an answer..)
					*/

					// let's just simulate something...
					var messageEl = theForm.querySelector( '.final-message' );
					messageEl.innerHTML = 'Your Notebook will be created!<button name="btnSubmit" type="submit">Send description</button>';
					classie.addClass( messageEl, 'show' );
				}
			} );
		</script>
	</body>
</html>