<?php
$serverName="localhost";
$dBName = 'softwaredesign';
$dBName1 = 'mysql:host=localhost;softwaredesign';
$dBUsername = 'root';
$dBPassword = '';

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){die("connection failed:" . mysqli_connect_error());}

// $conn1 = new PDO($dBName1, $dBUsername, $dBPassword);
$conn1 = new PDO("mysql:host=$serverName;dbname=$dBName", $dBUsername, $dBPassword);
$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>
