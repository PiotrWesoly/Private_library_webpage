<?php
$hostname = 'localhost';
$username = 'dbc17_stud_022';
$password = '@acnsKLC47';
$db = 'dbc17_stud_022';

$link = mysqli_connect($hostname, $username, $password, $db);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>