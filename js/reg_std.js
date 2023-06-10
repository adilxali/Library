const form = document.getElementById("registrationForm");
form.addEventListener("submit", (event) => {
  event.preventDefault();

  // Get the form fields
  const studentCourse = document.getElementById("student_course").value;
  const year = document.getElementById("year").value;
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const mobile = document.getElementById("mobile").value;

  // Validate the form fields

  if (studentCourse === "") {
    alert("Please select a course.");
    return;
  }

  if (year === "") {
    alert("Please enter the year.");
    return;
  }

  if (name === "") {
    alert("Please enter your name.");
    return;
  }

  if (email === "") {
    alert("Please enter your email.");
    return;
  }

  if (mobile === "") {
    alert("Please enter your mobile number.");
    return;
  }

  // Create the form data

  // Send a fetch request to register_student.php
  fetch("api/register_student.php", {
    method: "POST",
    body: new FormData(form),
  })
    .then(function (response) {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error("An error occurred while registering the student.");
      }
    })
    .then(function (data) {
      console.log(data.message);
      form.reset(); // Reset the form
      alert("Student registered successfully.");
    })
    .catch(function (error) {
      alert(error.message);
      console.log(error.message);
    });
});
