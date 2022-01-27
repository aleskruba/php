<?php

$dbservername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "newloginsystem";

$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);

if (!$conn) {

    die("Connection failed : ".mysqli_connect_error());
}



