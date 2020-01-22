<?php

//Database credentials in variable form.
$db_route = 'localhost';            //Use IP or Address in production
$db_user = 'username';              //Localhost is for local debug testing only.
$db_pass = 'password';              //Enter your real credentials, delete the temporary fields.
$db_name = 'dbName';
$db_port = 8889;

//Attempt connection to db.
$mysqli = new mysqli($db_route, $db_user, $db_pass, $db_name, $db_port);

//If connection works, proceed and show success. If not, show error.
if($mysqli->connect_error) {
    die("connection failed: " . $mysqli->connect_error);
} else {
//echo "Connection Successful!";
//echo "Host Information: ". mysqli_get_host_info($mysqli) . PHP_EOL;
}

//Start User Session
session_start();
