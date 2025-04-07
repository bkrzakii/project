window.addEventListener("scroll", function() {
    let header = document.querySelector("header");

    if (window.scrollY > 100) { 
        header.style.position = "fixed"; /* Stick to the top */
        header.style.top = "0"; 
        header.style.background = "#392761ff"; /* Change background */
        header.style.boxShadow = "0px 2px 10px rgba(0, 0, 0, 0.1)";
        header.style.width = "100%";
        header.style.animation = "movedown 1.9s ease-in-out forwards"; /* Smooth transition */
    } else {
        header.style.position = "relative"; /* Stay inside .background */
        header.style.top = "0px"; 
        header.style.background = "#392761ff"; /* Keep background transparent */
        header.style.boxShadow = "none";
        header.style.padding = "10px 30px"; /* Reset padding */
        header.style.width = "none"; /* Ensure full width */
    }
});
function toggleDescription() {
    var desc = document.getElementById("user-info");
    if (desc.style.display === "none") {
        desc.style.display = "flex";
    } else {
        desc.style.display = "none";
}}