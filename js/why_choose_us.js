// JavaScript (Intersection Observer)
let whyChooseUsSection = document.querySelector(".why-choose-us");

let observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      whyChooseUsSection.classList.add("in-view");
      observer.unobserve(whyChooseUsSection); // Stop observing after it's in view
    }
  });
});

observer.observe(whyChooseUsSection);
