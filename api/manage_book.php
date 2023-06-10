<?php
// Include the database configuration file
require ('../config/config.php');

// Check the action parameter to determine the requested operation
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Add a new book record
    if ($action === 'add') {
        // Retrieve the form data
        $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $edition = $_POST['edition'];
    $publication = $_POST['publisher'];
    $publication_year = $_POST['year'];
    $pages = $_POST['pages'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $bill_number = $_POST['bill_number'];
    $bill_date = $_POST['bill_date'];
    $class_number = $_POST['class_number'];
    $book_number = $_POST['book_number'];
    $remarks = $_POST['remarks'];

        //checking that book already exist or not in database
        $sql = "SELECT * FROM books WHERE isbn = '$isbn' AND title = '$title' AND author = '$author'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $response = array('status' => 'error', 'message' => 'Book already exist.');
            echo json_encode($response);
            exit();
        } else{
            //add book to database
            $sql = "INSERT INTO books 
            (title, author, isbn, availability, edition, publication, publication_year, pages, price , description, bill_number, bill_date, class_number, book_number, remarks, quantity)
             VALUES 
             ('$title', '$author', '$isbn', 1, '$edition','$publication','$publication_year','$pages',' $price','$description','$bill_number','$bill_date','$class_number','$book_number','$remarks', 1)";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $response = array('status' => 'success', 'message' => 'Book added successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Error adding the book.');
            }
            // Send the JSON response
            echo json_encode($response);
        }
    }

    // Update an existing book record
    elseif ($action === 'update') {
        // Retrieve the form data
        $bookId = $_POST['book_id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];

        //checking that book already exist or not in database
        $sql = "SELECT * FROM books WHERE isbn = '$isbn' AND title = '$title' AND author = '$author'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $response = array('status' => 'error', 'message' => 'Book already exist.');
            echo json_encode($response);
            exit();
        } else{
        // Update the book record in the database
        $sql = "UPDATE books SET title = '$title', author = '$author', isbn = '$isbn' WHERE book_id = '$bookId'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $response = array('status' => 'success', 'message' => 'Book updated successfully.');
        } else {
            $response = array('status' => 'error', 'message' => 'Error updating the book.');
        }

        // Send the JSON response
        echo json_encode($result);
        }
    }

    // Delete a book record
    elseif ($action === 'delete') {
        // Retrieve the book ID
        $bookId = $_GET['book_id'];
        
        $bookId = $_GET['book_id'] ?? '';

        // Delete associated records in the transactions table
        $deleteTransactionsSql = "DELETE FROM transactions WHERE book_id = '$bookId'";
        $deleteTransactionsResult = mysqli_query($conn, $deleteTransactionsSql);
    
        if ($deleteTransactionsResult) {
            // Delete the book record from the database
            $deleteBookSql = "DELETE FROM books WHERE book_id = '$bookId'";
            $deleteBookResult = mysqli_query($conn, $deleteBookSql);
    
            if ($deleteBookResult) {
                $response = array('status' => 'success', 'message' => 'Book deleted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Error deleting the book.');
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Error deleting associated transactions.');
        }
    
        // Send the JSON response
        echo json_encode($response);
    }

    // Invalid action parameter
    else {
        $response = array('status' => 'error', 'message' => 'Invalid action parameter.');
        echo json_encode($response);
    }
}


// Close the database connection
mysqli_close($conn);
?>
