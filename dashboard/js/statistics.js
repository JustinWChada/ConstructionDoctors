const dashboardElement = document.getElementById("dashboard");
let showingDashboard = true;

function updateDashboard() {
  if (showingDashboard) {
    dashboardElement.style.opacity = 0;
    setTimeout(() => {
      const now = new Date();
      const options = { year: "numeric", month: "long", day: "numeric" };
      const formattedDate = now.toLocaleDateString(undefined, options);
      dashboardElement.textContent = formattedDate;
      dashboardElement.style.opacity = 1;
      showingDashboard = false;
    }, 1000); // Wait for fade-out before changing content
  } else {
    dashboardElement.style.opacity = 0;
    setTimeout(() => {
      dashboardElement.textContent = "Dashboard";
      dashboardElement.style.opacity = 1;
      showingDashboard = true;
    }, 900); // Wait for fade-out before changing content
  }
}

updateDashboard();
setInterval(updateDashboard, 10000); // Change every 10 seconds (10000 ms)
