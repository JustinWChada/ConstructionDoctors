$(document).ready(function () {
  $("#spinner").removeClass("show");
  $("#spinner").addClass(" hide");

  //$("#spinner").hide(); // or $("#spinner").addClass("hide");
});

function updateTime() {
  const timeElement = document.getElementById("dashboardTime");
  const now = new Date();
  const hours = String(now.getHours()).padStart(2, "0");
  const minutes = String(now.getMinutes()).padStart(2, "0");
  const seconds = String(now.getSeconds()).padStart(2, "0");
  timeElement.textContent = `${hours}:${minutes}:${seconds}`;
}

updateTime();
setInterval(updateTime, 1000);

dashboardPlane = document.getElementById("dashboardPlane");

function displayStatistic() {
  $.ajax({
    url: "statistics.php",
    method: "POST",
    data: { action: "get_statistics" },
    success: function (data) {
      $("#dashboardPlane").html(data);
    },
    error: function (xhr, status, error) {
      // Add error handling
      console.error("Error fetching statistics:", status, error);
      $("#dashboardPlane").html("Error loading statistics.");
    },
  });
}

function displayMessages() {
  $.ajax({
    url: "contact_messages/show_messages.php",
    method: "POST",
    data: { action: "get_messages" },
    success: function (data) {
      $("#dashboardPlane").html(data);
    },
    error: function (xhr, status, error) {
      // Add error handling
      console.error("Error fetching messages:", status, error);
      $("#dashboardPlane").html("Error loading messages.");
    },
  });
}

function displayQuotes() {
  $.ajax({
    url: "quotes/show_quotes.php",
    method: "POST",
    data: { action: "get_quotes" },
    success: function (data) {
      $("#dashboardPlane").html(data);
    },
    error: function (xhr, status, error) {
      // Add error handling
      console.error("Error fetching quotes:", status, error);
      $("#dashboardPlane").html("Error loading quotes.");
    },
  });
}

function displayTestimonials() {
  $.ajax({
    url: "testimonials/show_testimonials.php",
    method: "POST",
    data: { action: "get_testimonials" },
    success: function (data) {
      $("#dashboardPlane").html(data);
    },
    error: function (xhr, status, error) {
      // Add error handling
      console.error("Error fetching testimonials:", status, error);
      $("#dashboardPlane").html("Error loading testimonials.");
    },
  });
}

function displayFAQs() {
  $.ajax({
    url: "faqs/add_faqs.php",
    method: "POST",
    data: { action: "get_faqs" },
    success: function (data) {
      $("#dashboardPlane").html(data);
    },
    error: function (xhr, status, error) {
      // Add error handling
      console.error("Error fetching faqs:", status, error);
      $("#dashboardPlane").html("Error loading faqs.");
    },
  });
}

function displayProjects() {
  $.ajax({
    url: "recent_projects/show_projects.php",
    method: "POST",
    data: { action: "get_projects" },
    success: function (data) {
      $("#dashboardPlane").html(data);
    },
    error: function (xhr, status, error) {
      // Add error handling
      console.error("Error fetching projects:", status, error);
      $("#dashboardPlane").html("Error loading projects.");
    },
  });
}

function addProjects() {
  $.ajax({
    url: "recent_projects/add_projects.php",
    method: "POST",
    data: { action: "get_projects" },
    success: function (data) {
      $("#dashboardPlane").html(data);
    },
    error: function (xhr, status, error) {
      // Add error handling
      console.error("Error fetching projects:", status, error);
      $("#dashboardPlane").html("Error loading projects.");
    },
  });
}

function displayProfile(user) {
  $.ajax({
    url: "profile/show_profile.php",
    method: "GET",
    data: { action: "get_profile", id: user },
    success: function (data) {
      $("#dashboardPlane").html(data);
    },
    error: function (xhr, status, error) {
      // Add error handling
      console.error("Error fetching profile:", status, error);
      $("#dashboardPlane").html("Error loading profile.");
    },
  });
}

function signOut() {
  let confirmation = confirm("Are you sure you want to log out ?");
  if (!confirmation) {
    window.location.href = "?statistics";
    return;
  }

  $("#dashboardPlane").html(
    "<h4 class='text-center text-danger fw-bold mt-4'>Signing Out ... !</h4>"
  );

  setTimeout(() => {
    window.location.href = "../queries/session_end.php";
  }, 3000);
}

/**
 * Function to get the value of a specific URL parameter.
 *
 * @param {string} parameterName The name of the parameter to retrieve.
 * @param {string} url (Optional) The URL to parse. If not provided, the current page URL is used.
 * @returns {string|null} The value of the parameter, or null if the parameter is not found.
 */
function getUrlParameter(parameterName, url) {
  // If no URL is provided, use the current page's URL
  url = url || window.location.href;

  // Sanitize parameterName to avoid unexpected behavior
  parameterName = parameterName.replace(/[\[\]]/g, "\\$&"); // Escape special characters

  // Create a regular expression to find the parameter
  const regex = new RegExp("[?&]" + parameterName + "(=([^&#]*)|&|#|$)");
  const results = regex.exec(url);

  if (!results) {
    return null; // Parameter not found
  }

  if (!results[2]) {
    return ""; // Parameter present but without a value (e.g., ?myparam)
  }

  // Decode the URI component (e.g., convert %20 to spaces)
  return decodeURIComponent(results[2].replace(/\+/g, " ")); // + is replaced with space
}

// Get the value of the 'id' parameter from the current URL:
const messages = getUrlParameter("messages");
const statistics = getUrlParameter("statistics");
const quotes = getUrlParameter("quotes");
const testimonials = getUrlParameter("testimonials");
const faqs = getUrlParameter("faqs");
const projects = getUrlParameter("projects");
const add_projects = getUrlParameter("add_projects");
const profile = getUrlParameter("profile");
const signout = getUrlParameter("signout");

if (messages !== null) {
  displayMessages();
} else if (messages !== null) {
  displayStatistic();
} else if (quotes !== null) {
  displayQuotes();
} else if (testimonials !== null) {
  displayTestimonials();
} else if (faqs !== null) {
  displayFAQs();
} else if (projects !== null) {
  displayProjects();
} else if (add_projects !== null) {
  addProjects();
} else if (profile !== null) {
  displayProfile();
} else if (signout !== null) {
  signOut();
} else {
  displayStatistic();
}

// const windowWidth = window.innerWidth;
// const windowHeight = window.innerHeight;
// console.log(`Window size: ${windowWidth}x${windowHeight}`); we need width = 820
$(".navbar-toggler").hide();
$(window).resize(function () {
  const windowWidth = $(window).width();

  if (windowWidth < 820) {
    //console.log(`Window width changed: ${windowWidth}`);
    $("#sidebar").removeClass("sidebar");
    $("#sidebar").addClass(
      "navbar navbar-expand-lg navbar-light bg-light fixed-top"
    );
    $("#sidebarNav").addClass("collapse navbar-collapse");
    $(".navbar-toggler").show();
  } else {
  }
});
