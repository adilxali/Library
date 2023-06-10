<!DOCTYPE html>
<html class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <?php require "./partial/Navbar.php"; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Students </h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table id="studentTable" class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-300 uppercase bg-gray-800 ">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-r">Student Id</th>
                            <th scope="col" class="px-6 py-3 border-r">Name</th>
                            <th scope="col" class="px-6 py-3 border-r">Course</th>
                            <th scope="col" class="px-6 py-3 border-r">Gender</th>
                            <th scope="col" class="px-6 py-3 border-r">Mobile No.</th>
                            <th scope="col" class="px-6 py-3 border-r">Email</th>
                            <th scope="col" class="px-6 py-3 border-r">Year</th>
                            <th scope="col" class="px-6 py-3 border-r">Age</th>
                         </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        // Fetch student data from the server
        fetch('api/get_students.php')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Error: ' + response.statusText);
                }
                return response.json();
            })
            .then(function(data) {
                // Check if the response is valid JSON
                if (Array.isArray(data)) {
                    // Generate the table rows for each student
                    var tableBody = document.querySelector('#studentTable tbody');
                    data.forEach(function(student) {
                        var row = document.createElement('tr');
                        row.classList.add('bg-white' ,'border-b', 'hover:bg-gray-200',);  
                        row.innerHTML = `
              <td class="px-6 py-1 border-r font-medium text-gray-500 ">${student.student_id}</td>
              <td class="px-6 py-1 border-r">${student.name}</td>
              <td class="px-6 py-1 border-r">${student.course}</td>
              <td class="px-6 py-1 border-r">${student.gender}</td>
              <td class="px-6 py-1 border-r">${student.mobile}</td>
              <td class="px-6 py-1 border-r">${student.email}</td>
              <td class="px-6 py-1 border-r">${student.year}</td>
              <td class="px-6 py-1 border-r">${student.age}</td>
            `;
                        tableBody.appendChild(row);
                    });
                } else {
                    console.log('Error: Invalid response format');
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    </script>
</body>

</html>