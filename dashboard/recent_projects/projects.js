$(document).ready(function () {
  $("#projectForm").on("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    $.ajax({
      url: "projects_query.php",
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
        $("#response").html(response); // Display response from PHP
        $("#projectForm")[0].reset(); // Reset the form
      },
      error: function () {
        $("#response").html(
          "<p>An error occurred while saving the project.</p>"
        );
      },
    });
  });
});
