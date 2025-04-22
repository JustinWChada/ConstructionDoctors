// JavaScript (script.js - Example)

$(document).ready(function () {
  $("#contactForm").submit(function (event) {
    event.preventDefault();

    var name = $("#name").val();
    var email = $("#email").val();
    var countryCode = $("#countryCode").val();
    var phoneNumber = $("#phoneNumber").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    $.ajax({
      type: "POST",
      url: "../queries/contact_query.php",
      data: {
        name: name,
        email: email,
        countryCode: countryCode,
        phoneNumber: phoneNumber,
        subject: subject,
        message: message,
      },
      dataType: "json", // Expect JSON response
      success: function (response) {
        if (response.success) {
          $("#contactForm button[type=submit]").html(
            "<i class='bi bi-process'></i> Request Sent !"
          );
          alert(response.message);
          $("#contactForm")[0].reset();
        } else {
          alert("Error: " + response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + status + " - " + error);
        alert(
          "An error occurred while processing your request. Please try again."
        );
      },
    });
  });
});
