<?php
// Start the session
session_start();

// Connect to the database
require('../config/config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform the login and validate the credentials
    // ...

    // Example validation: Check if the username and password match a user in the database
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Login successful
        $_SESSION['username'] = $username;
        echo json_encode(['status' => 'success', 'message' => 'Login successful.']);
        
        
    } else {
        // Login failed
        echo json_encode(['status' => 'error', 'message' => 'Invalid username or password.']);
    }
} else {
    // Return an error if the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>