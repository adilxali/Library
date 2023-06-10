document.getElementById('issueBookForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    const form = this; // Store the form object
    const bookId = document.getElementById('bookId').value;
    const stdId = document.getElementById('student_id').value;
    const data = new FormData(); // Creates a new FormData object
    data.append('book_id', bookId);
    data.append('student_id', stdId);
    console.log(data);

    fetch('api/issue_book.php', {
            method: 'POST',
            body: data
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Handle the response data
            console.log(data);
            alert(data.message);
            // Reset the form
            form.reset();
        })
        .catch(function(error) {
            alert('Error: ' + error);
            console.log(error);
        });
});