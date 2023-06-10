<?php
// Connect to the database
require('../config/config.php');

// Get the book ID and student ID
$bookId = $_POST['book_id'];
$student_id = $_POST['student_id'];

// Check if the book is available
$bookQuery = "SELECT * FROM books WHERE book_id = '$bookId'";
$bookResult = mysqli_query($conn, $bookQuery);
$stdQuery = "SELECT * FROM students WHERE student_id = '$student_id'";

$stdResult = mysqli_query($conn, $stdQuery);

if (!$bookResult) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to check book availability.']);
    exit;
}
if (!$stdResult) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to check student availability.']);
    exit;
}

if (mysqli_num_rows($bookResult) === 0) {
    echo json_encode(['status' => 'error', 'message' => 'Book not found.']);
    exit;
}
if (mysqli_num_rows($stdResult) === 0) {
    echo json_encode(['status' => 'error', 'message' => 'Student not found.']);
    exit;
}

// Check book availability
$book = mysqli_fetch_assoc($bookResult);
if ($book['quantity'] === '0') {
    echo json_encode(['status' => 'error', 'message' => 'Book not available OR Already issued!']);
    exit;
}

// Check if the student has already borrowed the maximum number of books
$maxBooks = 3;
$userBooksQuery = "SELECT COUNT(*) AS borrowed_books FROM transactions WHERE student_id = '$student_id' AND return_date IS NULL";
$userBooksResult = mysqli_query($conn, $userBooksQuery);
if (!$userBooksResult) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to check user\'s borrowed books.']);
    exit;
}

$userBookCount = mysqli_fetch_assoc($userBooksResult);
if ($userBookCount['borrowed_books'] >= $maxBooks) {
    echo json_encode(['status' => 'error', 'message' => 'You have already borrowed the maximum number of books.']);
    exit;
}


// Issue the book
$issueQuery = "INSERT INTO transactions (book_id, student_id, transaction_date) VALUES ('$bookId', '$student_id', NOW())";
$issueResult = mysqli_query($conn, $issueQuery);
if (!$issueResult) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to issue the book.']);
    exit;
}
// Update the book quantity
$updateQuery = "UPDATE books SET quantity = quantity - 1 WHERE book_id = '$bookId'";
$updateResult = mysqli_query($conn, $updateQuery);
if (!$updateResult) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update book quantity.']);
    exit;
}

echo json_encode(['status' => 'success', 'message' => 'Book issued successfully.']);
exit;
?>
