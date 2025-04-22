const projectForm = document.getElementById("projectForm");
const responseDiv = document.getElementById("response");

projectForm.addEventListener("submit", async (event) => {
  event.preventDefault();

  const formData = new FormData(projectForm);

  try {
    const response = await fetch("recent_projects/projects_query.php", {
      // Replace "projects_query" with your actual URL
      method: "POST",
      body: formData,
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.text(); // Or response.json() if your server returns JSON

    responseDiv.innerHTML = `<div class="alert alert-success">${data}</div>`;
    projectForm.reset();
  } catch (error) {
    responseDiv.innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
    console.error("Form submission error:", error); // Log the error for debugging
  }
});
