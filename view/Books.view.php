<?php
require "auth/auth.php";


?>
<!DOCTYPE html>
<html class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>

    <script defer src="js/get_books.js"></script>
    <script defer src="js/manage_book.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
       

        /* Style the modal or dialog box */
        .modal {
            
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(2px);
        }

        .modal-content {
            
            
            border: 1px solid #888;
            
            border-radius: 20px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body class="h-full">
    <?php require "./partial/Navbar.php"; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Books</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-fit py-6 px-4 sm:px-6 lg:px-8">
            
            <div class="relative overflow-x-auto shadow-md rounded-md sm:rounded-lg">
            <table id="bookTable" class="w-full text-sm text-left text-gray-900">
                <thead class="text-sm text-gray-300 uppercase bg-gray-800 ">
                    <tr>
                        <th scope="col" class="px-6 py-2 border-r">Book Id</th>
                        <th scope="col" class="px-6 py-2 border-r">Title</th>
                        <th scope="col" class="px-6 py-2 border-r">Author</th>
                        <th scope="col" class="px-6 py-2 border-r">ISBN</th>
                        <th scope="col" class="px-6 py-2 border-r">Edition</th>
                        <th scope="col" class="px-6 py-2 border-r">Publication</th>
                        <th scope="col" class="px-6 py-2 border-r">Publish Year</th>
                        <th scope="col" class="px-6 py-2 border-r">Pages</th>
                        <th scope="col" class="px-6 py-2 border-r">Price</th>
                        <th scope="col" class="px-6 py-2 border-r">Description</th>
                        <th scope="col" class="px-6 py-2 border-r">Bill Number</th>
                        <th scope="col" class="px-6 py-2 border-r">Bill Date</th>
                        <th scope="col" class="px-6 py-2 border-r">Class Number</th>
                        <th scope="col" class="px-6 py-2 border-r">Book Number</th>
                        <th scope="col" class="px-6 py-2 border-r">Remarks</th>
                        <th scope="col" class="px-6 py-2 border-r">
                            <span class="sr-only">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
            <!-- Add a hidden modal or dialog box for editing -->
            <div id="editModal" class="modal hidden flex justify-center items-center">
                <div class="modal-content w-[400px] sm:w-[500px] p-[20px] bg-white ">
                    <span class="close text-black" onclick="closeModal()">&times;</span>
                    <h2>Edit Book</h2>
                    <form method="post" id="editForm">
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-10 grid grid-colos-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="editTitle" class="block text-sm font-medium text-gray-700">Title</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="editTitle" id="editTitle" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <label for="editAuthor" class="block text-sm font-medium text-gray-700">Author</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="editAuthor" id="editAuthor" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Author">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-10 grid grid-colos-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <label for="editISBN" class="block text-sm font-medium text-gray-700">ISBN</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="editISBN" id="editISBN" required class="block flex-1 border-1 border-gray-900 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="ISBN">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="button" onclick="closeModal()" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php require_once "./partial/footer.php";?>
</body>

</html>