let selectedRole = ""; // Store the selected role

function chooseRole(role) {
    // Remove 'selected' class from all role-box elements
    document.querySelectorAll(".role-box").forEach(box => {
        box.classList.remove("selected");
    });

    // Add 'selected' class to the clicked option
    document.getElementById(role + "Box").classList.add("selected");

    // Update selected role
    selectedRole = role;

    // Show the Continue button
    document.getElementById("continueBtn").style.display = "block";
}

function continueAction() {
    let selectedBox = document.querySelector(".role-box.selected p");

    if (selectedBox) {
        let selectedText = selectedBox.innerText;
        alert("You selected: " + selectedText);
    } else {
        alert("Please select a role.");
    }
}

function redirectToPage() {
    if (selectedRole === "admin") {
        window.location.href = "../html/SignUp_LogIn_Form.html";
    } else if (selectedRole === "user") {
        window.location.href = "../html/home.html";
    } else {
        alert("Please select a role before continuing.");
    }
}