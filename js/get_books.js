(async function() {
  try {
    const response = await fetch('api/get_books.php');
    if (!response.ok) {
      throw new Error('Error: ' + response.statusText);
    }
    const data = await response.json();
    if (data && data.status === 'success' && Array.isArray(data.data)) {
      const tableBody = document.querySelector('#bookTable tbody');
      data.data.forEach(book => {
        const row = document.createElement('tr');
        row.classList.add('bg-white' ,'border-b', 'hover:bg-gray-300',);  
        row.innerHTML = `
          <td class="px-6 py-1 border-r font-medium text-gray-500 ">${book.book_id}</td>
          <td class="px-6 py-1 border-r">${book.title}</td>
          <td class="px-6 py-1 border-r">${book.author}</td>
          <td class="px-6 py-1 border-r">${book.isbn}</td>
          <td class="px-6 py-1 border-r">${book.edition}</td>
          <td class="px-6 py-1 border-r">${book.publication}</td>
          <td class="px-6 py-1 border-r">${book.publication_year}</td>
          <td class="px-6 py-1 border-r">${book.pages}</td>
          <td class="px-6 py-1 border-r">${book.price}</td>
          <td class="px-6 py-1 border-r">${book.description}</td>
          <td class="px-6 py-1 border-r">${book.bill_number}</td>
          <td class="px-6 py-1 border-r">${book.bill_date}</td>
          <td class="px-6 py-1 border-r">${book.class_number}</td>
          <td class="px-6 py-1 border-r">${book.book_number}</td>
          <td class="px-6 py-1 border-r">${book.remarks}</td>
          <td class="px-6 py-1 text-right">
            <button onclick="openEditModal(this, ${book.book_id})" class="text-gray-900 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Edit</button>
            <button onclick="deleteBook(${book.book_id})" class="text-red-700 hover:bg-red-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Delete</button>
          </td>
        `;
        tableBody.appendChild(row);
      });
    } else {
      console.log('Error: Invalid response format');
    }
  } catch (error) {
    console.log(error);
  }
})();
