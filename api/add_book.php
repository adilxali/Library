<?php
require '../config/config.php';

$response = array(); // Create an empty array for the response

// Check if the required fields are present in the $_POST array
if (isset($_POST['title'], $_POST['author'], $_POST['isbn'], $_POST['quantity'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $edition = $_POST['edition'];
    $publication = $_POST['publication'];
    $publication_year = $_POST['publication_year'];
    $pages = $_POST['pages'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $bill_number = $_POST['bill_number'];
    $bill_date = $_POST['bill_date'];
    $class_number = $_POST['class_number'];
    $book_number = $_POST['book_number'];
    $remarks = $_POST['remarks'];

    // Basic validation to check if the required fields are not empty
    if (!empty($title) && !empty($author) && !empty($isbn) ) {
        $sql = "INSERT INTO books (title, author, isbn, availability, edition, publication, publication_year, pages, price , description, bill_number, bill_date, class_number, book_number, remarks, quantity) VALUES ('$title', '$author', '$isbn', 1, '$edition','$publication','$publication_year','$pages',' $price','$description','$bill_number','$bill_date','$class_number','$book_number','$remarks', 1)";

        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = "Book added successfully";
        } else {
            $response['success'] = false;
            $response['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Error: Required fields are missing.";
    }
} else {
    $response['success'] = false;
    $response['message'] = "Error: Required fields are missing.";
}

mysqli_close($conn);

header('Content-Type: application/json'); // Set the response header to JSON
echo json_encode($response); // Encode the response array as JSON and echo it
