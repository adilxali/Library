<?php
require 'config.php';
if($conn){
    echo "Connection successful";
}
else{
    echo "Connection failed: ".mysqli_connect_error();
}
?>