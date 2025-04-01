// Animation du formulaire entre Login et Register
const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});

// Active l'effet d'inscription au chargement de la page
window.addEventListener('load', () => {
    container.classList.add('active');
});

// Gestion de la redirection après l'inscription
document.querySelector('.register form').addEventListener("submit", function (event) {
    event.preventDefault(); // Empêche l'envoi du formulaire classique

    // Récupère les valeurs des champs
    let username = document.querySelector('.register input[type="text"]').value.trim();
    let email = document.querySelector('.register input[type="email"]').value.trim();
    let password = document.querySelector('.register input[type="password"]').value.trim();

    // Vérifie si les champs sont remplis
    if (username !== "" && email !== "" && password !== "") {
        // Ajoute un petit délai avant de rediriger
        setTimeout(() => {
            window.location.href = "adminOrUser.html"; // Redirection vers la page "adminOrUser.html"
        }, 100); 
    } else {
        alert("Veuillez remplir tous les champs !"); // Affiche un message d'alerte si un champ est vide
    }
});

// Gestion du formulaire de connexion
document.querySelector('.login form').addEventListener("submit", function (event) {
    event.preventDefault(); // Empêche l'envoi du formulaire classique

    // Récupère les valeurs des champs
    let username = document.querySelector('.login input[type="text"]').value.trim();
    let password = document.querySelector('.login input[type="password"]').value.trim();

    // Vérifie si les champs sont remplis
    if (username !== "" && password !== "") {
        // Ajoute un petit délai avant de rediriger
        setTimeout(() => {
            window.location.href = "home.html"; // Redirection vers la page "home.html"
        }, 100);
    } else {
        alert("Veuillez remplir tous les champs !"); // Affiche un message d'alerte si un champ est vide
    }
});

