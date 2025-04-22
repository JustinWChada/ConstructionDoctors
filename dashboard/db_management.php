<?php
$servername = "localhost";
$username = "root";
$password = ""; // It is best practice to keep passwords out of your code.
$database = "cd_management";

// Create connection
$MgtConn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($MgtConn->connect_error) {
    die("Connection failed: " . $MgtConn->connect_error);
}