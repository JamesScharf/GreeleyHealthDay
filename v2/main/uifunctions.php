<?php
/*Created by J. Scharf on 11/3
*Version 2.0
*Last Edited: 11/16
*
*All of the user interface-related functions which hook up to their database-related functions
*/

//Echo one student schedule UI version
function echoStudentScheduleUI($user_id)
{
    include("dbForGreeley.php");
    include("functions.php");
    echo "
    <table class='table table-striped table-hover '>
      <thead>
        <tr>
          <th>Time Slot</th>
          <th>Class</th>
          <th>Teacher</th>
        </tr>
      </thead>
      <tbody>";
    $results = $mysqli->query("SELECT * FROM masterSchedule");
    if($results)
    {
        for ($i = 0; $i < $results->num_rows; $i++)
        {
            $results->data_seek($i);
            $row = $results->fetch_assoc();
            if($row['user_id'] == $user_id) //user is the same user that I'm looking for
            {
                $class = $row['className'];
                $info = "classTime";
                $timeSlot = getClassInfo($class, $info);
                $teacher = getTeacher($class); //Get teachername from other table
                echo "
                <tr>
                  <td>$timeSlot</td>
                  <td>$class</td>
                  <td>$teacher</td>
                </tr>";
            }
        }
    }
    echo "</tbody></table>"; //End the table
}

function masterSchedule()
{
    include("dbForGreeley.php");
    include("functions.php");
    echo "
    <table class='table table-striped table-hover '>
      <thead>
        <tr>
          <th>Time Slot</th>
          <th>User ID</th>
          <th>Class Name</th>
          <th>Teacher</th>
          <th>Room</th>
        </tr>
      </thead>
      <tbody>"; 
    $results = $mysqli->query("SELECT * FROM masterSchedule");
    if($results)
    {
        for ($i = 0; $i < $results->num_rows; $i++)
        {
            $results->data_seek($i);
            $row = $results->fetch_assoc();
            $user_id = $row["user_id"];
            $className = $row["className"];
            $info = "classTime";
            $timeSlot = getClassInfo($className, $info);
            $info = "classTeacher";
            $teacher = getClassInfo($className, $info);
            $info = "classTeacher";
            $teacher = getClassInfo($className, $info);
            echo "
            <tr>
              <td>$timeSlot</td>
              <td>$user_id</td>
              <td>$className</td>
              <td>$teacher</td>
              <td>$room</td>
            </tr>"; 
        }
        echo "</tbody></table>";
    }
    
}

function echoClassInfo($class)
{
    //Get all of the info at first
    include("dbForGreeley.php");
    include("functions.php");
    $info1 = "class_id";
    $class_id = getClassInfo($class, $info1);
    $info2 = "className"; 
    $className = getClassInfo($class, $info2);
    $info3 = "classTeacher"; //Teacher
    $classTeacher = getClassInfo($class, $info3);
    $info4 = "classTime";
    $classSlot = getClassInfo($class, $info4);
    $info5 = "classDescription";
    $classDescription = getClassInfo($class, $info5);
    $info6 = "classCap";
    $classCap = getClassInfo($class, $info6);
    
    //Now dump
    echo "
    <table class='table table-striped table-hover '>
      <thead>
        <tr>
          <th>Class ID</th>
          <th>Class Name</th>
          <th>Class Teacher</th>
          <th>Class Slot</th>
          <th>Class Description</th>
          <th>Class Cap</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td>$class_id</td>
            <td>$className</td>
            <td>$classTeacher</td>
            <td>$classSlot</td>
            <td>$classDescription</td>
            <td>$classCap</td>
          </tr>
      </tbody></table>
      ";
}


//Echo a course card
function echoCard($class)
{
    include("dbForGreeley.php");
    include("functions.php");
    $info1 = "class_id";
    $class_id = getClassInfo($class, $info1);
    $info2 = "classTeacher";
    $classTeacher = getClassInfo($class, $info2);
    $info3 = "classTime";
    $classTime = getClassInfo($class, $info3);
    $info4 = "classDescription";
    $classDescription = getClassInfo($class, $info4);
    $info5 = "classCap";
    $classCap = getClassInfo($class, $info5);
    $info6 = "classRoom";
    $classRoom = getClassInfo($class, $info6);

    echo "
        <div class='panel panel-primary'>
          <div class='panel-heading'>
            <h3 class='panel-title'>$class</h3>
          </div>
          <div class='panel-body'>
            <h6>Teacher:</h6>
            <p>$classTeacher</p>
            <h6>Description:</h6>
            <p>$classDescription</p>
            <h6>Cap:</h6>
            <p>$classCap</p>
            <h6>Room:</h6>
            <p>$classRoom</p>
          </div>
        </div>
    ";
}
?>