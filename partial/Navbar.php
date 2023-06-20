

<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-6">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6 menu-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6 close-icon" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center  sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex items-center space-x-1 sm:space-x-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/dashboard" class="<?= active('/dashboard') ?>   rounded-md px-3 py-2 text-sm font-medium">Home</a>
            <a href="/books" class="<?= active('/books')  ?> rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Books</a>
            <a href="/addbook" class="<?= active('/addbook') ?>  rounded-md px-3 py-2 text-sm font-medium">Add Book</a>
            <a href="/issuebook" class="<?= active('/issuebook') ?>  rounded-md px-3 py-2 text-sm font-medium">Issue Book</a>
            <a href="/students" class="<?= active('/students') ?>  rounded-md px-3 py-2 text-sm font-medium">Students</a>
            <a href="/regstd" class="<?= active('/regstd') ?>  rounded-md px-3 py-2 text-sm font-medium">Register Student</a>
            <a href="/transactions" class="<?= active('/transactions') ?>  rounded-md px-3 py-2 text-sm font-medium">Transactions</a>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-items-end ml-4">

          <a href="/logout" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800  hover:bg-gray-700 hover:text-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Logout</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out h-8 w-8 rounded-full text-white">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
              <polyline points="16 17 21 12 16 7"></polyline>
              <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg> <span class="text-white rounded-md px-3 py-1.5 text-sm font-medium hidden sm:block">Logout</span>
          </a>

      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="hidden sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="/dashboard.php" class="<?= active('/dashboard.php') ?>   block rounded-md px-3 py-2 text-sm font-medium">Home</a>
            <a href="/Books.php" class="<?= active('/Books.php')  ?> block rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Books</a>
            <a href="/add_book.php" class="<?= active('/add_book.php') ?>  block rounded-md px-3 py-2 text-sm font-medium">Add Book</a>
            <a href="/issue_book.php" class="<?= active('/issue_book.php') ?> block  rounded-md px-3 py-2 text-sm font-medium">Issue Book</a>
            <a href="/students.php" class="<?= active('/students.php') ?>  block rounded-md px-3 py-2 text-sm font-medium">Students</a>
            <a href="/register_student.php" class="<?= active('/register_student.php') ?>  block rounded-md px-3 py-2 text-sm font-medium">Register Student</a>
            <a href="/trans.php" class="<?= active('/trans.php') ?> block  rounded-md px-3 py-2 text-sm font-medium">Transactions</a>
         </div>
  </div>
</nav>
<script>
  // Function to toggle the mobile menu
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  const closeIcon = document.querySelector('.close-icon');
  const menuIcon = document.querySelector('.menu-icon');

  // Add a click event listener to the mobile menu button
  mobileMenuButton.addEventListener('click', function() {
    

    // Toggle the hidden class on the mobile menu
    mobileMenu.classList.toggle('hidden');
    closeIcon.classList.toggle('hidden');
    menuIcon.classList.toggle('hidden');
  });
</script>