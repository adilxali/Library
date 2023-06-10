<?php
// Connect to the database
require('../config/config.php');

// Prepare the SQL query to fetch all books
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

if (!$result) {
  // Error in executing the query
  $response = [
    'status' => 'error',
    'message' => 'Failed to fetch books from the database'
  ];
} else {
  // Fetch the books and store them in an array
  $books = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $books[] = [
      'book_id' => $row['book_id'],
      'title' => $row['title'],
      'author' => $row['author'],
      'isbn' => $row['isbn'],
      'edition' => $row['edition'],
      'publication' => $row['publication'],
      'publication_year' => $row['publication_year'],
      'pages' => $row['pages'],
      'price' => $row['price'],
      'description' => $row['description'],
      'bill_number' => $row['bill_number'],
      'bill_date' => $row['bill_date'],
      'class_number' => $row['class_number'],
      'book_number' => $row['book_number'],
      'remarks' => $row['remarks'],
      'quantity' => $row['quantity']
    ];
  }

  // Close the database connection
  mysqli_close($conn);

  // Return the books as JSON response
  $response = [
    'status' => 'success',
    'data' => $books
  ];
}

// Set the response header to JSON
header('Content-Type: application/json');

// Output the JSON response
echo json_encode($response);
?>
