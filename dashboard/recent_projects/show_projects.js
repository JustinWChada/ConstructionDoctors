$(document).ready(function () {
  $(".project-card").on("click", function () {
    const projectId = $(this).data("id");
    const projectTitle = $(this).find(".project-title").text();
    const projectDescription = $(this).find(".project-description").text();
    const projectImage = $(this).find("img").attr("src");

    $("#update_id").val(projectId);
    $("#update_project_title").val(projectTitle);
    $("#update_description").val(projectDescription);
    $("#update_image").val(projectImage);

    $("#updateModal").show();
  });

  $("#closeModal").on("click", function () {
    $("#updateModal").hide();
  });

  $("#updateForm").on("submit", function (e) {
    e.preventDefault(); // Prevent normal form submission

    $.ajax({
      url: "recent_projects/projects_query.php",
      method: "POST",
      data: $(this).serialize(),
      success: function (response) {
        alert(response);
        location.reload(); // Reload the page to see updated data
      },
      error: function () {
        alert("An error occurred while updating the project.");
      },
    });
  });
});
