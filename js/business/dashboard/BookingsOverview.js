window.addEventListener("scroll", function() {
    let header = document.querySelector("header");
    let main = document.querySelector("main");

    if (window.scrollY > 50) { 
        header.style.position = "fixed"; /* Stick to the top */
        header.style.top = "0"; 
        header.style.boxShadow = "0px 2px 10px rgba(0, 0, 0, 0.1)";
        header.style.width = "none";
        header.style.animation = "movedown 1.9s ease-in-out forwards"; /* Smooth transition */
        main.style.margin = "0 0 0 0";
    } else {
        header.style.position = "fixed"; /* Stay inside .background */
        header.style.top = "0px"; 
        header.style.boxShadow = "0px 2px 10px rgba(0, 0, 0, 0.1)";
        header.style.width = "none"; /* Ensure full width */
        header.style.animation = "movedown 1.9s ease-in-out forwards"; /* Smooth transition */
        main.style.margin = "79.2px 0 0 0";
    }
});
function toggleDescription() {
    var desc = document.getElementById("user-info");
    var currentDisplay = window.getComputedStyle(desc).display;

    if (currentDisplay === "none") {
        desc.style.display = "flex";
    } else {
        desc.style.display = "none";
    }
}

// Click outside to close
document.addEventListener("click", function(event) {
    var profile = document.querySelector(".profile");
    var userInfo = document.getElementById("user-info");
    var currentDisplay = window.getComputedStyle(userInfo).display;
    var isClickInside = profile.contains(event.target);

    if (!isClickInside && currentDisplay === "flex") {
        userInfo.style.display = "none";
    }
});



document.addEventListener("DOMContentLoaded", function () {
    const isBusiness = localStorage.getItem("isBusiness");
    if (isBusiness === "true") {
        const Business = document.getElementById("Business");
        const dashboardLink = document.getElementById("Dashboard-link");
        if (dashboardLink && Business) {
        dashboardLink.style.display = "inline";
        Business.style.color = "transparent";
        Business.style.cursor = "default";
        Business.style.pointerEvents = "none";
        }
    }
});