// Back to Top button
window.addEventListener("scroll", function () {
  var backToTopButton = document.getElementById("back-to-top");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    backToTopButton.classList.remove("visually-hidden");
    backToTopButton.style.display = "block";
  } else {
    backToTopButton.classList.add("visually-hidden");
    backToTopButton.style.display = "none";
  }
});
