window.addEventListener("scroll", function() {
    let header = document.querySelector("header");

    if (window.scrollY > 100) { 
        header.style.position = "fixed"; /* Stick to the top */
        header.style.top = "0"; 
        header.style.boxShadow = "0px 2px 10px rgba(0, 0, 0, 0.1)";
        header.style.width = "none";
        header.style.animation = "movedown 1.9s ease-in-out forwards"; /* Smooth transition */
    } else {
        header.style.position = "relative"; /* Stay inside .background */
        header.style.top = "0px"; 
        header.style.boxShadow = "none";
        header.style.width = "none"; /* Ensure full width */
        header.style.animation = "movedown 1.9s ease-in-out forwards"; /* Smooth transition */
    }
});
function toggleDescription() {
    var desc = document.getElementById("user-info");
    if (desc.style.display === "") {
        desc.style.display = "flex";
    } else {
        desc.style.display = "";
}}


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