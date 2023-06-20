<?php
require_once "auth/auth.php";

?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Book</title>
    <script defer src="js/issue_book.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
<?php require "./partial/Navbar.php"; ?>
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Issue Book</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-xl flex justify-center items-center py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
      
      <div class="w-xl flex justify-center items-center">
                
                    
                    <form method="POST" id="issueBookForm">
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-10 grid grid-colos-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="bookId" class="block text-sm font-medium text-gray-700">Book Id</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="bookId" id="bookId" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Book Id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="student_id" class="block text-sm font-medium text-gray-700">Student Id</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="student_id" id="student_id" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Student Id">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                

                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="reset " class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Issue Book</button>
                        </div>
                    </form>
                
            </div>
    </div>
  </main>


</body>

</html>