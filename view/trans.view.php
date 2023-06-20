<?php
require_once "auth/auth.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction List</title>
    <script defer src="js/return_book.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php require "./partial/Navbar.php"; ?>
    <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Transactions</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      <div class="pb-4 bg-white">
        <form method="GET" class="flex">
        <label for="search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="search" name="search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
        </div>
        <button type="submit" class="mt-1 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2 ml-2 text-center mr-2 mb-2">Search</button>
        </form>
    </div>
   

    <?php
    // Connect to the database
    require('config/config.php');

    // Check if a search term is provided
    $searchTerm = $_GET['search'] ?? '';

    // Query to fetch transactions with optional search term
    $query = "SELECT transactions.*, books.title, students.name, students.course, students.student_id, books.book_id
              FROM transactions
              INNER JOIN books ON transactions.book_id = books.book_id
              INNER JOIN students ON transactions.student_id = students.student_id
              WHERE books.title LIKE '%$searchTerm%' OR students.name LIKE '%$searchTerm%' OR students.student_id LIKE '%$searchTerm%' OR transactions.transaction_id LIKE '%$searchTerm%'
              ORDER BY transactions.transaction_date DESC";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
    ?>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table id="studentTable" class="w-full text-md text-left text-gray-700">
                    <thead class="text-sm text-gray-300 uppercase bg-gray-800 ">
                        <tr class="border-b ">
                            <th scope="col" class="px-6 py-3 border-r">Transaction Id</th>
                            <th scope="col" class="px-6 py-3 border-r">Book Title</th>
                            <th scope="col" class="px-6 py-3 border-r">Student Name</th>
                            <th scope="col" class="px-6 py-3 border-r">Course</th>
                            <th scope="col" class="px-6 py-3 border-r">Issue Date</th>
                            <th scope="col" class="px-6 py-3 border-r">Return Date</th>
                            <th scope="col" class="px-6 py-3 border-r">Status</th>
                            <th scope="col" class="px-6 py-3 border-r">
                                <span class="sr-only">Actions</span>
                            </th>
                         </tr>
                    </thead>
                    <tbody>
                    <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $transactionId = $row['transaction_id'];
                    $bookTitle = $row['title'];
                    $bookId = $row['book_id'];
                    $studentId = $row['student_id'];
                    $Student = $row['name'];
                    $course = $row['course'];
                    $issueDate = $row['transaction_date'];
                    $returnDate = $row['return_date'];

                ?>
                    <tr class="border-b hover:bg-gray-300">
                        <td class="px-6 py-2 border-r font-medium text-gray-500 "><?php echo $transactionId; ?></td>
                        <td class="px-6 py-2 border-r"><?php echo $bookTitle; ?></td>
                        <td class="px-6 py-2 border-r"><?php echo"$Student"; ?></td>
                        <td class="px-6 py-2 border-r"><?php echo $course; ?></td>
                        <td class="px-6 py-2 border-r"><?php echo $issueDate; ?></td>
                        <td class="px-6 py-2 border-r"><?php echo $returnDate; ?></td>
                        <td class="px-6 py-2 border-r">
                            <?php if ($returnDate === null) { ?>
                                Pending
                            <?php } else { ?>
                                Returned
                            <?php } ?>
                        </td>
                        <td class="px-6 py-1 border-r">
                            <?php if ($returnDate === null) { ?>
                                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="returnBook(<?php echo $transactionId; ?>)">Return Book</button>
                            <?php } ?>
                        
                        </td>
                    </tr>
                <?php
                }
                ?>
                    </tbody>
                </table>
            </div>
        
    <?php
    } else {
        echo 'No transactions found.';
    }
    ?>
     </div>
  </main>

</body>

</html>