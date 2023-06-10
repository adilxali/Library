<?php
require_once "auth/auth.php";
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
    </div>
  </main>
  <?php require "./partial/footer.php"; ?>
</body>

</html>