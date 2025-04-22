// jQuery for sign-in form submission
$(document).ready(function () {
  $("#signin-form").submit(function (event) {
    // Assuming the form has id="signin-form"
    event.preventDefault();

    var email = $("#email").val();
    var password = $("#password").val();

    $.ajax({
      type: "POST",
      url: "../queries/signin_query.php", // PHP file to handle sign-in
      data: {
        email: email,
        password: password,
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          // Sign-in successful
          $(".signin-btn ").html(
            "<i class='bi bi-check'></i> Signin Successful"
          );
          window.location.href = "../queries/session_begin.php"; // Redirect to dashboard
        } else {
          // Sign-in failed
          alert("Sign-in failed: " + response.message);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error: " + textStatus, errorThrown);
        alert("An error occurred during sign-in.");
      },
    });
  });
});
