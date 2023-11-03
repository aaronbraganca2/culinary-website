<?php
//contains database connection code
$host = "localhost";
$dbname = "expt4_db";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host, 
                    username: $username, 
                    password: $password, 
                    database: $dbname);

if($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);

}
//returns the $mysqli variable to the script that calls it (if conn is successful)
return $mysqli;

?>