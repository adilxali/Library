<?php
require_once "auth/auth.php";
// require "./function.php";
require "config/config.php";

$TotalBooks = mysqli_query($conn, "SELECT * FROM books");
$TotalBooks = mysqli_num_rows($TotalBooks);

$TotalStudents = mysqli_query($conn, "SELECT * FROM students");
$TotalStudents = mysqli_num_rows($TotalStudents);

$Transactions = mysqli_query($conn, "SELECT * FROM transactions");
$Transactions = mysqli_num_rows($Transactions);

$returnedBooks = mysqli_query($conn, "SELECT * FROM transactions WHERE return_date != ''");
$returnedBooks = mysqli_num_rows($returnedBooks);
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- // local bootstrap -->
  <script src="https://cdn.tailwindcss.com"></script>

  <title>Home : LibMan</title>

</head>

<body class="h-full">

  <?php require "./partial/Navbar.php"; ?>
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      <div class="flex  mx-auto gap-3 flex-wrap">
        <a href="#">
          <div class="flex flex-col justify-center items-center w-[270px] h-[120px] hover:scale-[1.05] transition-transform   bg-gray-600 hover:bg-gray-700 p-8 rounded-xl text-center">
            <h3 class="text-white text-xl">
              Total Books:
            </h3>
            <h1 class="text-4xl text-white font-bold"><?php echo $TotalBooks ?></h1>
          </div>
        </a>
        <a href="#">
          <div class="flex flex-col justify-center items-center w-[270px] h-[120px] hover:scale-[1.05] transition-transform   bg-gray-600 hover:bg-gray-700 p-8 rounded-xl text-center">
            <h3 class="text-white text-xl">
              Total Students:
            </h3>
            <h1 class="text-4xl text-white font-bold"><?php echo $TotalStudents ?></h1>
          </div>
        </a>

        <a href="#">
          <div class="flex flex-col justify-center items-center w-[270px] h-[120px] hover:scale-[1.05] transition-transform   bg-gray-600 hover:bg-gray-700 p-8 rounded-xl text-center">
            <h3 class="text-white text-xl">
              Total Transactions:
            </h3>
            <h1 class="text-4xl text-white font-bold"><?php echo $Transactions ?></h1>
          </div>
        </a>
        <a href="#">
          <div class="flex flex-col justify-center items-center w-[270px] h-[120px] hover:scale-[1.05] transition-transform   bg-gray-600 hover:bg-gray-700 p-8 rounded-xl text-center">
            <h3 class="text-white text-xl">
              Pending Books:
            </h3>
            <h1 class="text-4xl text-white font-bold"><?php echo $Transactions -$returnedBooks ?></h1>
          </div>
        </a>
        <a href="#">
          <div class="flex flex-col justify-center items-center w-[270px] h-[120px] hover:scale-[1.05] transition-transform   bg-gray-600 hover:bg-gray-700 p-8 rounded-xl text-center">
            <h3 class="text-white text-xl">
              Total Returned Books:
            </h3>
            <h1 class="text-4xl text-white font-bold"><?php echo $returnedBooks ?></h1>
          </div>
        </a>
      </div>

    </div>
  </main>
  <?php require "./partial/footer.php"; ?>

</body>

</html>