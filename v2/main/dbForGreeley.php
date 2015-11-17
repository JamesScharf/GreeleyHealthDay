<?php
$mysqli = new mysqli("127.0.0.1", "root", "YBb5mb9798", "GreeleyHealthDay");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";

$mysqli = new mysqli("127.0.0.1", "root", "YBb5mb9798", "GreeleyHealthDay");
if ($mysqli->connect_errno) {
    //echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//echo $mysqli->host_info . "\n";
?>