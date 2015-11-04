<?php
/*Created by J. Scharf on 11/3
*Version 2.0
*Last Edited: 11/3
*
*All of the database-related functions to fetch data or create table info
*Seperate from UI functions so that the UI can be changed without affecting core functions
*/


//Check whether or not the class has been capped. Relies on countClassStudents($className)
function isCapped($className, $numberInClass)
{
    include("dbForGreeley.php");
    $results = $mysqli->query("SELECT * FROM classInfo");  //Individual class info
    if($results)
    {
        for ($i = 0; $i < $results->num_rows; $i++)
        {
            $results->data_seek($i);
            $row = $results->fetch_assoc();
            if($className == $row['className'])
            {
                $classCap = $row['classCap'];
                //echo $classCap;
            }

        }
    }
    else
    {
        echo "false";
    }
    

    if($classCap == $numberInClass)
    {
        return true; //Class is capped
    }
    else
    {
        return false; //Class is not capped
    }
}

//Count total students in class currently, and return it
function countClassStudents($className)
{
    include("dbForGreeley.php");
    $results = $mysqli->query("SELECT * FROM masterSchedule");
    if($results)
    {
        $classCounter = 0;
        for ($i = 0; $i < $results->num_rows; $i++)
        {
            $results->data_seek($i);
            $row = $results->fetch_assoc();
            //echo $row['class'];
            if($className == $row['className'])
            {
                $classCounter = $classCounter + 1;
                //echo $classCounter;
            }
        }
        return $classCounter-1; //Return total people in class minus the teacher
    }
    else
    {
        echo "false";
    }
}

//Return the privilege of a user
function getUserPrivilege($user_id)
{
    include("dbForGreeley.php");
    $results = $mysqli->query("SELECT * FROM loginInfo");
    if($results)
    {
        $classCounter = 0;
        for ($i = 0; $i < $results->num_rows; $i++)
        {
            $results->data_seek($i);
            $row = $results->fetch_assoc();
            if($user_id == $row['user_id'])
            {
                $userPrivilege = $row['privilegeTier'];
                /*Lower the privilege, higher the authority
                *-1= Webmaster-2= Principal, 3=Schedulers, 4=Teachers, 5=Students
                */
                return $userPrivilege;
            }
        }
    }
}

//Check whether user has enough privilege level to do an action
function hasEnoughPrivilege($user_id, $privilegeRequired)
{
    if($privilegeRequired > getUserPrivilege($user_id)) //Not enough privilege
    {
        echo "<script>alert('Insufficient Privilege')</script>";
        return false;
    }
    else
    {
        return true;
    }
}

//When a user logs in, they should be sent to the homepage corresponding to their level
function redirectByPrivilege($user_id)
{
    $userPrivilege = getUserPrivilege($user_id);
    if($userPrivilege == 1) //Is webmaster
    {
        header('Location:  masterPanel.php');
        exit();
    }
    if($userPrivilege == 2) //Is principal
    {
        header('Location:  masterPanel.php');
        exit();
    }
    if($userPrivilege == 3) //Is scheduler
    {
        header('Location:  schedulePanel.php');
        exit();
    }
    if($userPrivilege == 4) //Is teacher
    {
        header('Location:  teacher.php');
        exit();
    }
    if($userPrivilege == 5) //Is student
    {
        header('Location:  studentMain.php');
        exit();
    }
}


//Check if the user is allowed to be on a webpage
function canBeOnPage($user_id)
{
    //Get current page
    $page = basename($_SERVER['PHP_SELF']);
    include("dbForGreeley.php");
    $results = $mysqli->query("SELECT * FROM privilegeMap");
    if($results)
    {
        $classCounter = 0;
        for ($i = 0; $i < $results->num_rows; $i++)
        {
            $results->data_seek($i);
            $row = $results->fetch_assoc();
            if($page == $row['page']) //Page corresponds to page in database
            {
                $pagePrivilege = $row['privilegeRequired'];
                if($pagePrivilege > getUserPrivilege($user_id)) //User
                {
                    redirectByPrivilege($user_id); //Send to homescreen by rank
                    return false; //Cannot be there
                }
                else
                {
                    return true; //Can be there
                }
            }
        }
    } 
}

//Add a student to a class
function addStudentToClass($user_id, $className, $timeSlot, $roomNumber)
{
    include("dbForGreeley.php");
    //Add student to master schedule
    $results = $mysqli->query("INSERT INTO masterSchedule(user_id, className, timeSlot, roomNumber) VALUES($user_id', '$className', '$timeSlot', '$roomNumber')"); 
}

function createClass($user_id, $className, $classTeacher, $classTime, $classDescription, $classCap)
{
    include("dbForGreeley.php");
    $results = $mysqli->query("INSERT INTO classInfo(className, classTeacher, classTime, classDescription, classCap) VALUES('$className', '$classTeacher', '$classTime', '$classDescription', '$classCap')"); 
}

?>