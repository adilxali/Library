<?php
// Connect to the database
require('../config/config.php');

// Get the transaction ID from the POST data
$transactionId = $_POST['transaction_id'];

// Check if the transaction exists
$query = "SELECT * FROM transactions WHERE transaction_id = '$transactionId'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to check transaction.']);
    exit;
}

if (mysqli_num_rows($result) === 0) {
    echo json_encode(['status' => 'error', 'message' => 'Transaction not found.']);
    exit;
}

$transaction = mysqli_fetch_assoc($result);

// Check if the book has already been returned
if ($transaction['return_date'] !== null) {
    echo json_encode(['status' => 'error', 'message' => 'Book has already been returned.']);
    exit;
}

// Update the return date of the transaction
$updateQuery = "UPDATE transactions SET return_date = NOW() WHERE transaction_id = '$transactionId'";
$updateResult = mysqli_query($conn, $updateQuery);

if (!$updateResult) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update transaction.']);
    exit;
}
//increase the quantity of the book
$bookId = $transaction['book_id'];
$updateQuery = "UPDATE books SET quantity = quantity + 1 WHERE book_id = '$bookId'";
$updateResult = mysqli_query($conn, $updateQuery);


echo json_encode(['status' => 'success', 'message' => 'Book returned successfully.']);
exit;
?>
