// JavaScript to handle modal opening and closing
function openModal(testimonialId) {
  var modal = document.getElementById("replyModal-" + testimonialId);
  modal.style.display = "block";
}

function closeModal(testimonialId) {
  var modal = document.getElementById("replyModal-" + testimonialId);
  modal.style.display = "none";
}

// Add event listeners to all reply buttons
var replyButtons = document.querySelectorAll(".reply-button");
replyButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    var testimonialId = this.getAttribute("data-testimonial-id");
    openModal(testimonialId);
  });
});

// Close the modal if the user clicks outside of it
window.onclick = function (event) {
  if (event.target.classList.contains("modal")) {
    var modals = document.querySelectorAll(".modal");
    modals.forEach(function (modal) {
      modal.style.display = "none";
    });
  }
};
