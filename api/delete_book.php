<?php
require('../config/config.php');

$bookId = $_POST['book_id'] ?? null;
//delete book from database 
if($bookId){
    $query = "DELETE FROM books WHERE book_id = '$bookId'";
    $result = mysqli_query($conn, $query);
    if($result){
        $response = array('status' => 'success', 'message' => 'Book deleted successfully.');
    } else {
        $response = array('status' => 'error', 'message' => 'Error deleting the book.');
    }
} else {
    $response = array('status' => 'error', 'message' => 'Invalid action parameter.');
}
echo json_encode($response);
?>