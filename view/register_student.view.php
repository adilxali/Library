<?php
require_once "auth/auth.php";


?>
<!DOCTYPE html>
<html class="h-full bg-white">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Student Registration</title>
  <script defer src="js/reg_std.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
  <?php require "./partial/Navbar.php"; ?>
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Student Registration</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
      <!-- Your content -->
      <div class="mx-auto flex justify-start  w-full sm:w-1/2 sm:justify-center sm:items-center">
        <form id="registrationForm" class="flex flex-col w-full sm:justify-center">

          <div class="flex flex-col mb-1">
            <label for="name" class="mb-1">Name:</label>

            <input type="text" id="name" name="name" class="w-full  rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>

          </div>
          <div class="flex flex-col mb-1 sm:flex-row sm:justify-between sm:items-center">
            <div class="flex flex-col">
              <label for="email" class="mb-1">Email:</label>
              <input type="email" id="email" name="email" class="w-full sm:w-60 rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
            </div>

            <div class="flex flex-col mb-1">
              <label for="mobile" class="mb-1">Mobile:</label>
              <input type="text" id="mobile" name="mobile" class="w-full sm:w-60 rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
            </div>
          </div>

          <div class="flex flex-col mb-1">
            <label for="age" class="mb-1">Age:</label>
            <input type="text" id="age" name="age" class="w-full sm:w-60 rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
          </div>
          <div class="flex flex-col mb-1">
            <label for="student_course" class="mb-1">Student Course:</label>
            <select id="student_course" name="student_course" class="w-full sm:w-60 rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
              <option value="">Select Course</option>
              <option value="BSc">BSc</option>
              <option value="BA">BA</option>
              <option value="BCom">BCom</option>
            </select>
          </div>

          <div class="flex flex-col mb-1">
            <label for="year" class="mb-1">Year:</label>
            <input type="text" id="year" name="year" class="w-full sm:w-60 rounded-md border-0 px-1.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
          </div>
          <div class="flex items-center mb-2">
            <label for="gender" class="mr-1">
              Gender:
            </label>
            <input type="radio" name="gender" id="gender" class="mx-1" value="Male"><span class="mr-2">Male</span>
            <input type="radio" name="gender" id="gender" class="mx-1" value="Female">Female

          </div>
          <div class="flex justify-end">
            <button type="reset" class="flex w-[100px] mx-2 justify-center rounded-md  px-3 py-1.5 text-sm font-semibold leading-6 text-black shadow-sm hover:bg-gray-200 hover:text-gray-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Reset</button>
            
          <button type="submit" class="flex w-[100px] justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
          </div>
        </form>
      </div>

    </div>
  </main>


</body>

</html>