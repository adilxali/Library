<?php
// Connect to the database
require('../config/config.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
// Get the student details from the form
$studentCourse = $_POST['student_course'];
$year = $_POST['year'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$age = $_POST['age'];
$gender = $_POST['gender'];

// Validate the form fields
if (empty($studentCourse) || empty($year) || empty($name) || empty($email) || empty($mobile)) {
    $response = array('status' => 'error', 'message' => 'All fields are required.');
    echo json_encode($response);
    exit;
}

// Perform the student registration
$query = "INSERT INTO students (name, age, gender, course, year, email, mobile) VALUES ('$name', '$age', '$gender', '$studentCourse', '$year', '$email', '$mobile')";
$result = mysqli_query($conn, $query);

if ($result) {
    $response = array('status' => 'success', 'message' => 'Student registered successfully.');
    echo json_encode($response);
} else {
    $response = array('status' => 'error', 'message' => 'Failed to register student.');
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);

exit;
header("Location: ../index.php");
}
?>
