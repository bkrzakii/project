document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("hotelForm");
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      // set business mode
      localStorage.setItem("isBusiness", "true");

      // redirect to home
      window.location.href = "../../html/user/home.html";
    });
  }
});