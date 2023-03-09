<?php

$hn = "localhost";
// this will be changed to  your username
$un = "adminblog";
// this will be your user password
$pw = "40_*@xIvaK4veQnB";
$db = "theatre2";


// Create database connection
$conn = new mysqli($hn, $un, $pw, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


?>