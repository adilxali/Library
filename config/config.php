<?php
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$host = "localhost";
$user = "root";
$pass = "";
$db = "library_db";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>