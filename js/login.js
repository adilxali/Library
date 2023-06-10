document.getElementById('loginForm').addEventListener('submit', function(event) {
      event.preventDefault();
      
      // Get the form fields
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;
      
      // Create the form data
      var formData = new FormData();
      formData.append('username', username);
      formData.append('password', password);
      
      // Send a fetch request to login.php
      fetch('api/login.php', {
        method: 'POST',
        
    body: formData
  })
      .then(function(response) {
        if (response.ok) {
          return response.json();
        } else {
          throw new Error('An error occurred while logging in.');
        }
      })
      .then(function(data) {
        console.log(data.message);
        if (data.status === 'success') {
          // Redirect to the protected page
          window.location.href = '/dashboard';
          console.log(formData)
        } else {
          // Show an error message
          alert('Invalid username or password.');
        }
      })
      .catch(function(error) {
        alert(error.message);
        console.log(error);
      });
    });