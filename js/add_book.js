const form = document.querySelector('form');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  const title = document.querySelector('#title').value;
  const author = document.querySelector('#author').value;
  const isbn = document.querySelector('#isbn').value;


  if (title && author && isbn ) {
    

    fetch(`api/manage_book.php?action=add`, {
      method: 'POST',
      body: new FormData(form),
      
    }).then((response) => response.json())
      .then((data) => {
        if (data.status === 'success') {
          alert("Book added successfully.");
          form.reset();
        } else {
          alert(data.message);
          form.reset();
        }
        
      })
      .catch((error) => {
        console.error('Error:', error);
        alert("An error occurred while adding the book.");
      });
  }
});
