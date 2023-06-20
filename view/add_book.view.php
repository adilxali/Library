<?php
require_once "auth/auth.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Book</title>
  <script defer src="js/add_book.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
  <?php require "./partial/Navbar.php"; ?>
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-4 sm:py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Add New Book</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-4xl py-6 px-4 sm:px-6 lg:px-8">
      <form method="post">
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-colos-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="title" id="title" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="title">
                  </div>
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="author" id="author" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Author">
                  </div>
                </div>
              </div>

            </div>
            <div class="mt-10 grid grid-colos-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="isbn" id="isbn" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="ISBN">
                  </div>
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="edition" class="block text-sm font-medium text-gray-700">Edition</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="edition" id="edition" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Edition">
                  </div>
                </div>
              </div>

            </div>
            <div class="mt-10 grid grid-colos-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="publisher" class="block text-sm font-medium text-gray-700">Publication</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="publisher" id="publisher" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Publication">
                  </div>
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="year" id="year" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Year">
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-10 grid grid-colos-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="pages" class="block text-sm font-medium text-gray-700">Pages</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="pages" id="pages" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Pages">
                  </div>
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="price" id="price" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Year">
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-10 grid grid-colos-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="bill_number" class="block text-sm font-medium text-gray-700">Bill Number</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="bill_number" id="bill_number" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Bill Number">
                  </div>
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="bill_date" class="block text-sm font-medium text-gray-700">Bill Date</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="bill_date" id="bill_date" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Bill Date">
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-10 grid grid-colos-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="class_number" class="block text-sm font-medium text-gray-700">Class Number</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="class_number" id="class_number" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Class Number">
                  </div>
                </div>
              </div>
              <div class="sm:col-span-3">
                <label for="book_number" class="block text-sm font-medium text-gray-700">Book Number</label>
                <div class="mt-2">
                  <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                    <input type="text" name="book_number" id="book_number" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Bill Date">
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-10 grid grid-colos-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="col-span-6">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                  <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Description"></textarea>
                </div>
              </div>
              <div class="col-span-6">
                <label for="remarks" class="block text-sm font-medium leading-6 text-gray-900">Remarks</label>
                <div class="mt-2">
                  <textarea id="remarks" name="remarks" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Remarks"></textarea>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
      </form>
    </div>
  </main>

</body>

</html>