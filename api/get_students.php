<?php
require('../config/config.php');

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    $students = [];
    while($row = mysqli_fetch_assoc($result)){
        $students[]= $row;
    }
    echo json_encode($students);
}else{
    echo json_encode(['message' => 'No students found']);
}
mysqli_close($conn);

?>