<?php
/*Created by J. Scharf on 11/3
*Version 2.0
*Last Edited: 11/3
*
*All of the user interface-related functions which hook up to their database-related functions
*/

//Echo one student schedule UI version
function echoStudentScheduleUI($user_id)
{
    include("dbForGreeley.php");
    include("functions.php");
    echo "
    <table class=''>
      <thead>
        <tr>
          <th>Time Slot</th>
          <th class='mdl-data-table__cell--non-numeric'>Class</th>
          <th class='mdl-data-table__cell--non-numeric'>Teacher</th>
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
                  <td class='mdl-data-table__cell--non-numeric'>$class</td>
                  <td class='mdl-data-table__cell--non-numeric'>$teacher</td>
                </tr>";
            }
        }
    }
    echo "</tbody></table>"; //End the table
}

function masterSchedule()
{
    include("functions.php");
    include("dbForGreeley.php");
    echo "
    <table class='mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'>
      <thead>
        <tr>
          <th>Time Slot</th>
          <th>User ID</th>
          <th class='mdl-data-table__cell--non-numeric'>Class Name</th>
          <th class='mdl-data-table__cell--non-numeric'>Teacher</th>
          <th class='mdl-data-table__cell--non-numeric'>Room</th>
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
              <td class='mdl-data-table__cell--non-numeric'>$className</td>
              <td class='mdl-data-table__cell--non-numeric'>$teacher</td>
              <td class='mdl-data-table__cell--non-numeric'>$room</td>
            </tr>"; 
        }
        echo "</tbody></table>";
    }
    
}

function echoClassInfo($class)
{
    //Get all of the info at first
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
    <table class='mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp'>
      <thead>
        <tr>
          <th>Class ID</th>
          <th class='mdl-data-table__cell--non-numeric'>Class Name</th>
          <th class='mdl-data-table__cell--non-numeric'>Class Teacher</th>
          <th>Class Slot</th>
          <th class='mdl-data-table__cell--non-numeric'>Class Description</th>
          <th>Class Cap</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td>$class_id</td>
            <td class='mdl-data-table__cell--non-numeric'>$className</td>
            <td class='mdl-data-table__cell--non-numeric'>$classTeacher</td>
            <td>$classSlot</td>
            <td class='mdl-data-table__cell--non-numeric'>$classDescription</td>
            <td>$classCap</td>
          </tr>
      </tbody></table>
      ";
}
?>