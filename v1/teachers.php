<!DOCTYPE html>
<html>

<!--Created by James A. Scharf on 8/28/15-->
<!--Last Edited: 8/30/15-->
<!--Uses Material Design Lite-->

	<head>
	  <title>Greeley Health Day-Student ID</title>
	  <!--This is the main page, basically acting as the home screen-->
		 <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.blue_grey-indigo.min.css" /> 
		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
	<body>
	
		<!-- Always shows a header, even in smaller screens. -->
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		  <header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
			  <!-- Title -->
			  <span class="mdl-layout-title">Greeley Health Day</span>
			  <!-- Add spacer, to align navigation to the right -->
			  <div class="mdl-layout-spacer"></div>
			  <!-- Navigation. We hide it in small screens. -->
			</div>
		  </header>
		  <div class="mdl-layout__drawer">
			<span class="mdl-layout-title">Greeley Health Day</span>
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="main.php">Main Page</a>
			  <a class="mdl-navigation__link" href="help.php">Help</a>
			  <a class="mdl-navigation__link" href="about.php">About</a>
			  <a class="mdl-navigation__link" href="teachers.php">Teachers</a>
			</nav>
		  </div>
		  <main class="mdl-layout__content">
			<div class="page-content">
			<!-- Main Page Content Here-->
				<div name="TeacherLoginDiv">
					<!-- Numeric Textfield -->
					<h3>Please enter your Teacher Password</h3>
					<p>DO NOT DISABLE COOKIES. If you have disabled them, please re-enable them at least when you use this site. This site will not work otherwise.</p>
					<form action="teachers.php" method="post">
					  <div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="passwordBox" name="passwordBox" />
						<label class="mdl-textfield__label" for="passwordBox">Teacher Password</label>
						<span class="mdl-textfield__error">Your Input is not a number, please re-enter it.</span>
					  </div>
					  <div id="createClassDiv">
						<p>Images cannot be uploaded, they must be direct links of images on the web. In order to get the web link of an image, go to google, click on the image that you want, and the press "view image", right click on the image, and click "copy image URL".</p>
							<!-- Wide card with share menu button -->
							<style>
							.demo-card-wide.mdl-card {
							  width: 512px;
							}
							.demo-card-wide > .mdl-card__title {
							  color: #fff;
							  height: 176px;
							  background: url('../assets/demos/welcome_card.jpg') center / cover;
							}
							.demo-card-wide > .mdl-card__menu {
							  color: #fff;
							}
							</style>
							<div class="demo-card-wide mdl-card mdl-shadow--2dp">
							  <div class="mdl-card__title">
								<h2 class="mdl-card__title-text">Please fill out this class creation form</h2>
								<div class="mdl-card__supporting-text">
								<!-- Simple Textfield -->
								  <div class="mdl-textfield mdl-js-textfield">
									<input class="mdl-textfield__input" type="text" id="image_url" name="image_url" />
									<label class="mdl-textfield__label" for="image_url" style="color:white">Enter a link to your class's image</label>
								  </div>
								</div>
							  </div>
							  <div class="mdl-card__supporting-text">
								<!-- Simple Textfield -->
								  <div class="mdl-textfield mdl-js-textfield">
									<input class="mdl-textfield__input" type="text" id="Title" name="Title" />
									<label class="mdl-textfield__label" for="Title">Enter Class Title Here</label>
								  </div>
								  
								  <!-- Floating Multiline Textfield -->
								  <div class="mdl-textfield mdl-js-textfield">
									<textarea class="mdl-textfield__input" type="text" rows= "3" id="classDescription" name="classDescription" ></textarea>
									<label class="mdl-textfield__label" for="classDescription">Enter your class description</label>
								  </div>

								  <!-- Simple Textfield -->
								  <div class="mdl-textfield mdl-js-textfield">
									<input class="mdl-textfield__input" type="text" id="yourNameBox" name="yourNameBox" />
									<label class="mdl-textfield__label" for="yourNameBox">Please enter your last name</label>
								  </div>
								  
								  <!-- Numeric Textfield -->
								  <div class="mdl-textfield mdl-js-textfield">
									<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="student_cap" name="student_cap" />
									<label class="mdl-textfield__label" for="student_cap">Maximum Students</label>
									<span class="mdl-textfield__error">Input is not a number!</span>
								  </div>
								  
								  <!-- Simple Textfield -->
								  <div class="mdl-textfield mdl-js-textfield">
									<input class="mdl-textfield__input" type="text" id="time" name="time" />
									<label class="mdl-textfield__label" for="time">Please enter your assigned class time.</label>
								  </div>
								  
							  </div>
							  <div class="mdl-card__actions mdl-card--border">
								  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="Submit"> 
									Submit
								  </button>
							  </div>
							  <div class="mdl-card__menu"></div> <!--Don't need this, but keeping it in case it is needed later-->
							</div>
						  </div>
					</form>
					
					<?php
						include("dbForGreeley.php");
						if(isset($_POST['passwordBox']) /*AND isset($_POST['Title']) AND isset($_POST['classDescription']) AND isset($_POST['image_url']) AND isset($_POST['yourNameBox']) AND isset($_POST['student_cap']) AND isset($_POST['time'])*/) //Make sure that the box has been submitted first 
						{
							echo $_POST['passwordBox'];
							$results = $mysqli->query("SELECT * FROM adminPassword"); //Get the current admin password
							if($results) {
								$results->data_seek(1);
								$row = $results->fetch_assoc();
								$adminPassword = $row['current_password'];
								if($_POST['passwordBox'] == $adminPassword)
								{
									echo "same";
									$name = $_POST["Title"];
									$description = $_POST["classDescription"];
									$image_url = $_POST["image_url"];
									$parent_creator = $_POST["yourNameBox"];
									$student_cap = $_POST["student_cap"];
									$time = $_POST["time"];
									$title = $name;
									/*
										First, it adds the class info blah blah into the main storage table for all classes.
										Then, it creates a roster for the class
										Then, when a student wants to look at classes the table to generate the class list is 'classes'
										And when they want to add a new class to their schedule they have their student id added to the individual classes' roster
									*/
									$results = $mysqli->query("INSERT INTO classes(name, description, image_url, parent_creator, student_cap, time) VALUES('$name', '$description', '$image_url', '$parent_creator', '$student_cap', '$time')");
									$results = $mysqli->query("CREATE TABLE $title LIKE roster"); //Create a table that's a clone of roster, which will be the roster for this class
								}
							}
							
						}
					?>
				</div>
				<div name="AdminDiv">
				
				
				
				</div>
			</div>
		  </main>
		</div>
	
	</body>
</html>
