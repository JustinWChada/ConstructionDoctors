// jQuery code
$(document).ready(function () {
  $("form").submit(function (event) {
    event.preventDefault(); // Prevent default form submission

    // var name = $("#name").val();
    // var email = $("#email").val();
    // var password = $("#password").val();

    $.ajax({
      type: "POST",
      url: "../queries/signup_query.php",
      data: {
        name: $("#name").val(), // Ensure these are lowercase
        email: $("#email").val(),
        password: $("#password").val(),
      },
      contenttype: "application/x-www-form-urlencoded; charset=UTF-8",
      dataType: "json", // Expect JSON response
      success: function (response) {
        if (response.success) {
          $(".signup-btn").html(
            "<i class='bi bi-check'></i> Signup Successful"
          );
          // Optionally redirect or clear the form
          $("form")[0].reset(); // Clear the form
        } else {
          alert("Sign up failed: " + response.message);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error: " + textStatus, errorThrown);
        alert("An error occurred during sign up.");
      },
    });
  });
});
