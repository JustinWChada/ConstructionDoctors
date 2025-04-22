let stars = document.querySelectorAll(".bi-star-fill");
let starsCountInput = document.getElementById("starsCount");

stars.forEach((star, index) => {
  star.addEventListener("click", () => {
    // Remove 'text-danger' class from all stars
    stars.forEach((s, i) => {
      if (i > index) {
        s.classList.remove("text-warning");
      }
    });

    // Set color for clicked star and preceding stars
    for (let i = 0; i <= index; i++) {
      stars[i].classList.add("text-warning");
    }

    // Set the input value to the number of colored stars
    starsCountInput.value = index + 1;
  });
});

document
  .getElementById("testimonialForm")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    const name = document.getElementById("name").value;
    const rating = document.getElementById("starsCount").value;
    const comment = document.getElementById("comment").value;
    const image = document.getElementById("image").files[0]; // Get the file

    const messageDiv = document.getElementById("response");

    // Create a FormData object to send the data (including the file)
    const formData = new FormData();
    formData.append("name", name);
    formData.append("rating", rating);
    formData.append("comment", comment);
    if (image) {
      // Only append the image if one was selected
      formData.append("image", image);
    }

    fetch("../queries/testimonials_query.php", {
      method: "POST",
      body: formData, // Send the FormData object
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then((data) => {
        if (data.success) {
          messageDiv.textContent = "Thank you for your review!";
          messageDiv.className = "success-message";
          document.getElementById("testimonialForm").reset();
        } else {
          messageDiv.textContent = "Error submitting review: " + data.message;
          messageDiv.className = "error-message";
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        messageDiv.textContent =
          "Network error submitting review. Please try again.";
        messageDiv.className = "error-message";
      });
  });
