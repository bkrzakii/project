let roomCount = 1; // Compteur de chambres, commence à 1

// Fonction pour ajouter une nouvelle chambre
function addRoom() {
  roomCount++;

  const roomsContainer = document.getElementById('roomsContainer');
  const firstRoom = document.querySelector('.room-section');

  // Cloner le premier bloc de chambre
  const newRoom = firstRoom.cloneNode(true);

  // Mettre à jour le titre de la nouvelle chambre
  newRoom.querySelector('.room-header h3').textContent = `Room ${roomCount}`;

  // Mettre à jour tous les noms d'inputs avec le nouveau numéro de room
  const inputs = newRoom.querySelectorAll('[name]');
  inputs.forEach(input => {
    input.name = input.name.replace(/\[\d+\]/, `[${roomCount}]`);

    // Vider les valeurs des inputs
    if (input.type === 'checkbox' || input.type === 'file') {
      input.checked = false;
    } else {
      input.value = '';
    }
  });

  // Réinitialiser les erreurs de fichier si présentes
  const fileError = newRoom.querySelector('#file-error');
  if (fileError) fileError.textContent = '';

  // Ajouter la nouvelle chambre au conteneur
  roomsContainer.appendChild(newRoom);
}

// Fonction pour supprimer une chambre
function removeRoom(button) {
  const roomsContainer = document.getElementById('roomsContainer');
  const allRooms = roomsContainer.querySelectorAll('.room-section');

  // Empêcher de supprimer la dernière chambre
  if (allRooms.length <= 1) {
    alert("At least one room must remain.");
    return;
  }

  // Supprimer le bloc de chambre associé au bouton
  const section = button.closest('.room-section');
  section.remove();

  // Réindexer toutes les chambres restantes (Room 1, Room 2, ...)
  const updatedRooms = roomsContainer.querySelectorAll('.room-section');
  roomCount = 0;
  updatedRooms.forEach((room, index) => {
    roomCount = index + 1;
    room.querySelector('.room-header h3').textContent = `Room ${roomCount}`;

    // Mettre à jour tous les noms de champs avec le bon index
    const inputs = room.querySelectorAll('[name]');
    inputs.forEach(input => {
      input.name = input.name.replace(/\[\d+\]/, `[${roomCount}]`);
    });
  });
}


const input = document.getElementById('file-upload');
const previewContainer = document.getElementById('preview-container');
const uploadBox = document.getElementById('upload-box');
const imageUploadDiv = document.querySelector('.image-upload');
const MAX_IMAGES = 10;
let uploadedImages = [];

input.addEventListener('change', function () {
    const newFiles = Array.from(this.files);

    // snippet li bghiti ndkhl
    if (this.files.length > 0) {
    imageUploadDiv.style.display = 'none';
    }

    if (uploadedImages.length + newFiles.length > MAX_IMAGES) {
    alert(`You can upload up to ${MAX_IMAGES} images in total.`);
    input.value = "";
    return;
    }

    newFiles.forEach(file => {
    if (!file.type.startsWith("image/")) return;

    uploadedImages.push(file);

    const reader = new FileReader();
    reader.onload = function (e) {
        const img = document.createElement("img");
        img.src = e.target.result;
        img.style.maxWidth = "120px";
        img.style.borderRadius = "8px";
        previewContainer.appendChild(img);
    };
    reader.readAsDataURL(file);
    });

    input.value = ""; // reset input

    if (uploadedImages.length >= MAX_IMAGES) {
    uploadBox.style.display = 'none';
    }
});

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