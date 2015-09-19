<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<!--Created by James A. Scharf on 8/28/15-->
<!--Last Edited: 8/30/15-->
<!--Uses Material Design Lite-->

	<head>
	  <title>Greeley Health Day-Student ID</title>
	  <!--This is actually the page where students enter their student ID-->
		<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.indigo-pink.min.css">
		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
	<body>

		<!-- Numeric Textfield -->
		<h3>Please enter your student ID</h3>
		<p>DO NOT DISABLE COOKIES. If you have disabled them, please re-enable them at least when you use this site. This site will not work otherwise.</p>
		<form action="index.php" method="post">
		  <div class="mdl-textfield mdl-js-textfield">
			<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="passwordBox" name="passwordBox" />
			<label class="mdl-textfield__label" for="passwordBox">Student ID</label>
			<span class="mdl-textfield__error">Your Input is not a number, please re-enter it.</span>
		  </div>
		  <!-- Accent-colored raised button with ripple -->
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="Submit"> 
		    Login
		  </button>
		</form>
		
		<?php
		include("dbForGreeley.php");
			if(isset($_POST['passwordBox'])) //Make sure that the box has been submitted first 
			{
				// Set session variables
				$_SESSION["student_id"] = $_POST["passwordBox"]; //Make sure that someone can't access someone elses account as it runs if they're on the site at the same time
				if(isset($_SESSION["student_id"]))
				{
					echo "Correct, re-routing you to the site.";
					$student_id = $_SESSION["student_id"];
					$strStudentID = "a" . "$student_id"; //Just a filler letter because MySQL tables can't be made entirely of numbers
					echo $strStudentID;
					$results = $mysqli->query("CREATE TABLE $strStudentID LIKE student_id_base"); //Create a table that's a clone of the base student ID which will store each student's classes
					$results = $mysqli->query("INSERT INTO student_id_list(student_id) VALUES('$student_id')"); //Insert the student id for later when they'll cycle through them so that it'll know what to cycle through
					//header('Location: main.php');
				}
			}
		?>

	</body>
</html>
