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
	  <!--This is the main page, basically acting as the home screen-->
		 <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.blue_grey-indigo.min.css" />  
		<script src="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
	<body>
	
			<!--Header with fixed tabs. -->
		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
					mdl-layout--fixed-tabs">
		  <header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
			  <!-- Title -->
			  <span class="mdl-layout-title">Greeley Health Day</span>
			</div>
			<!-- Tabs -->
			<div class="mdl-layout__tab-bar mdl-js-ripple-effect">
			  <a href="#fixed-tab-1" class="mdl-layout__tab is-active">View & Add Classes</a>
			  <a href="#fixed-tab-2" class="mdl-layout__tab">Your requested classes</a>
			  <a href="#fixed-tab-3" class="mdl-layout__tab">Print</a>
			</div>
		  </header>
		  <div class="mdl-layout__drawer">
			<span class="mdl-layout-title">Greeley Health Day</span>
			<nav class="mdl-navigation">
			  <a class="mdl-navigation__link" href="help.php">Help</a>
			  <a class="mdl-navigation__link" href="about.php">About</a>
			  <a class="mdl-navigation__link" href="teachers.php">Teachers</a>
			</nav>
		  </div>
		  <main class="mdl-layout__content">
			<section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
			<div class="page-content">
			  <!-- Your content goes here -->
			  
				<div class="mdl-grid">
				  <?php
				  if(isset($_SESSION["student_id"]))
				  {
					include("dbForGreeley.php");
					$results = $mysqli->query("SELECT * FROM classes");
					if($results) {
						for ($i = 0; $i < $results->num_rows; $i++) {
							$results->data_seek($i);
							$row = $results->fetch_assoc(); 
							$name = $row['name'];
							$description = $row['description'];
							$image_url = $row['image_url'];
							$parent_creator = $row['parent_creator'];
							$student_cap = $row['student_cap'];
							$time = $row['time'];
							echo "
							<div class='mdl-cell mdl-cell--4-col'>
								<div class='mdl-card mdl-shadow--4dp'>
								  <div class='mdl-card__media'><img src='$image_url' width='173' height='157' border='0'
								   alt='' style='padding:10px;'>
								  </div>
								  <div class='mdl-card__supporting-text'>
									<h1>$name</h1>
								  </div>
								  <div class='mdl-card__supporting-text'>
								  $description
								  <h3>Time: $time</h3>
								  <form action='main.php' method='post'>
									  <button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent' type='Submit' name=$parent_creator+'button'> 
										Add Class
									  </button>
								  </form>
								  </div>
								</div>
							</div>
							"; //I set the name of the button as the name of the parent_creator because of possible spaces in the title of the class
							if(isset($_POST[$name]))
							{
								$results = $mysqli->query("SELECT * FROM classes");
								for ($i = 0; $i < $results->num_rows; $i++) {
									$results->data_seek($i);
									$row = $results->fetch_assoc();
									$class = $row['class'];
									if($class == $name)
									{
										$cap = $row['student_cap'];
										$result = mysql_query("SELECT * FROM $name");
										$rows = mysql_num_rows($result); //Not sure if this is depreciated
										if($rows < $student_cap)
										{
											$student_id = $_SESSION["student_id"];
											$results = $mysqli->query("INSERT INTO $name(student) VALUES('$student_id')"); //Add the student onto the master roster for each class
											$results = $mysqli->query("INSERT INTO $student_id_base(class, time) VALUES('$name', '$time')");
										}
									}
								}
							}
						}
					}
				  }
				  else
				  {
					  echo "Student ID not set. Access Denied.";
				  }
				  ?>
			  </div>
			  </div>
			</section>
			<section class="mdl-layout__tab-panel" id="fixed-tab-2">
			  <div class="page-content">
			  <!-- Your content goes here -->
				  <?php
					include("dbForGreeley.php");
					$student_id = $_SESSION["student_id"];
					$results = $mysqli->query("SELECT * FROM student_id");
					for ($i = 0; $i < $results->num_rows; $i++) {
						$results->data_seek($i);
						$row = $results->fetch_assoc();
						$class = $row['class'];
						$time = $row['time'];
						echo "Class: $class		Time: $time";
					}
				  ?>
			  </div>
			</section>
			<section class="mdl-layout__tab-panel" id="fixed-tab-3">
			  <div class="page-content">
			  <!-- Your content goes here -->
			  </div>
			</section>
		  </main>
		</div>
	
	</body>
</html>
