function returnBook(transactionId) {
    if (confirm('Are you sure you want to return this book?')) {
       
        fetch('api/return_book.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'transaction_id=' + transactionId
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.status === 'success') {
                // Reload the page to update the transaction list
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(function(error) {
            console.log(error);
        });
    }
}