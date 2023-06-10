
<?php
//database connection with railway
$url = "mysql://root:k7vLwyiAdNE8ohOzxHVg@containers-us-west-206.railway.app:5520/railway";
$db = "railway";
$host = "containers-us-west-206.railway.app";
$password = "k7vLwyiAdNE8ohOzxHVg";
$port = "5520";
$user = "root";
$conn = mysqli_connect($host, $user, $password, $db, $port);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>