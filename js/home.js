window.addEventListener("scroll", function() {
    let header = document.querySelector("header");

    if (window.scrollY > 100) { 
        header.style.position = "fixed"; /* Stick to the top */
        header.style.top = "0"; 
        header.style.background = "#Fbfbfa"; /* Change background */
        header.style.boxShadow = "0px 2px 10px rgba(0, 0, 0, 0.1)";
        header.style.padding = "10px 70px"; /* Reduce padding */
    } else {
        header.style.position = "absolute"; /* Stay inside .background */
        header.style.top = "0px"; 
        header.style.background = "transparent"; /* Keep background transparent */
        header.style.boxShadow = "none";
        header.style.padding = "10px 30px"; /* Reset padding */
    }
});