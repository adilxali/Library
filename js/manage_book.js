// function deleteBook(bookId) {
//   fetch(`php/manage_book.php?action=delete&book_id=${bookId}`, {
//     method: "DELETE",
//   })
//     .then(function (response) {
//       return response.json();
//     })
//     .then(function (data) {
//       if (data.status === "success") {
//         // Book deleted successfully
//         // Perform any necessary UI updates
//       } else {
//         // Error occurred while deleting the book
//         console.log("Error: " + data.message);
//       }
//     })
//     .catch(function (error) {
//       console.log(error);
//     });
//   // window.location.reload();
// }
// Function to delete a book
function deleteBook(bookId) {
  // Confirm the deletion
  if (!confirm('Are you sure you want to delete this book?')) {
    return;
  }
  
  // Send a fetch request to delete_book.php
  fetch('api/manage_book.php?action=delete&book_id='+bookId, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    // body: JSON.stringify({ book_id: bookId })
  })
  .then(response => {
    if (response.ok) {
      console.log('Book deleted successfully');
      // Refresh the book list or update the UI accordingly
    } else {
      throw new Error('An error occurred while deleting the book');
    }
  })
  .catch(error => {
    console.log(error);
  });
  window.location.reload();
}

// Function to open the edit modal
function openEditModal(button, bookId) {
  const row = button.parentNode.parentNode;
  const cells = row.querySelectorAll('td');

  // Fill the modal inputs with the current book data
  document.getElementById('editTitle').value = cells[1].textContent;
  document.getElementById('editAuthor').value = cells[2].textContent;
  document.getElementById('editISBN').value = cells[3].textContent;


  // Show the edit modal
  var modal = document.getElementById('editModal');
  modal.classList.toggle('hidden')

  // Set the save action for the edit form
  var editForm = document.getElementById('editForm');
  editForm.onsubmit = function(event) {
    event.preventDefault();
    saveEditedBook(bookId);
    closeModal();
  };
}

// Function to close the modal
function closeModal() {
  var modal = document.getElementById('editModal');
  modal.classList.toggle('hidden');
}

// Function to save the edited book
function saveEditedBook(bookId) {
  var title = document.getElementById('editTitle').value;
  var author = document.getElementById('editAuthor').value;
  var isbn = document.getElementById('editISBN').value;

  // Perform the update request using fetch or XMLHttpRequest
  // Send the updated values to the server and handle the response

  // Example fetch request:
  fetch('api/manage_book.php?action=update', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: `book_id=${bookId}&title=${title}&author=${author}&isbn=${isbn}`
  })
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {
      if (data.status === 'success') {
        // Update the table cell values with the updated data
        alert('Book updated successfully');
      } else {
        console.log('Error: ' + data.message);
      }
    })
    .catch(function(error) {
      console.log(error);
    });
    window.location.reload();
}
