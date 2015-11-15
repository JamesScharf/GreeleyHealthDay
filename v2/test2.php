<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Greeley Health Day</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    </head>

    <body>      
  <form action="test2.php" method='get'>
<div class="mdl-textfield mdl-js-textfield">
<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="userSearchField" name='userSearchField'>
<label class="mdl-textfield__label" for="userSearchField">Enter the user ID</label>
<span class="mdl-textfield__error">Input is not a number!</span>
</div>
<!-- Colored icon button -->
<button type='submit' class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
  <i class="material-icons">search</i>
</button>
</form>
<?php
include("uifunctions.php");
if(isset($_GET['userSearchField']))
{
    $user_id = $_GET['userSearchField'];
    echoStudentScheduleUI($user_id);
}
?>
    </body>
</html>