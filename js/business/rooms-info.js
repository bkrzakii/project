let roomCount = 1;

// Fonction pour ajouter une nouvelle room
function addRoom() {
  const template = document.getElementById('room-template');
  const clone = template.content.cloneNode(true);
  const newRoom = clone.querySelector('.room-section');

  roomCount++;

  // Mise à jour du titre de la nouvelle chambre
  newRoom.querySelector('.room-header h3').textContent = `Room Template ${roomCount}`;

  // Mise à jour des noms des inputs avec le nouveau numéro de la chambre
  const inputs = newRoom.querySelectorAll('[name]');
  inputs.forEach(input => {
    input.name = input.name.replace(/\[\d+\]/, `[${roomCount}]`);
  });

  // Ajouter la nouvelle chambre au conteneur
  document.getElementById('roomsContainer').appendChild(newRoom);
}

// Fonction pour supprimer une chambre
function removeRoom(button) {
  const roomsContainer = document.getElementById('roomsContainer');
  const allRooms = roomsContainer.querySelectorAll('.room-section');

  // Empêcher la suppression de la dernière chambre
  if (allRooms.length <= 1) {
    alert("At least one room must remain.");
    return;
  }

  // Supprimer le bloc de chambre
  const section = button.closest('.room-section');
  section.remove();

  // Réindexer les chambres restantes
  const updatedRooms = roomsContainer.querySelectorAll('.room-section');
  roomCount = 0;
  updatedRooms.forEach((room, index) => {
    roomCount = index + 1;
    room.querySelector('.room-header h3').textContent = `Room Template ${roomCount}`;

    // Mise à jour des noms des champs avec le bon index
    const inputs = room.querySelectorAll('[name]');
    inputs.forEach(input => {
      input.name = input.name.replace(/\[\d+\]/, `[${roomCount}]`);
    });
  });
}


document.addEventListener('DOMContentLoaded', function () {
  const MAX_IMAGES = 10;

  // ✅ Click on image-upload triggers input (first time)
  document.addEventListener('click', function (e) {
    if (e.target.closest('.image-upload')) {
      const imageUpload = e.target.closest('.image-upload');
      const roomSection = imageUpload.closest('.room-section');
      const input = roomSection.querySelector('.file-upload');
      input.click();
    }

    // ✅ Click on upload-box triggers input (to add more)
    if (e.target.closest('.upload-box')) {
      const uploadBox = e.target.closest('.upload-box');
      const roomSection = uploadBox.closest('.room-section');
      const input = roomSection.querySelector('.file-upload');
      input.click();
    }
  });

  // ✅ Handle file upload and preview
  document.addEventListener('change', function (e) {
    if (e.target && e.target.classList.contains('file-upload')) {
      const input = e.target;
      const roomSection = input.closest('.room-section');
      const previewContainer = roomSection.querySelector('.preview-container');
      const uploadBox = roomSection.querySelector('.upload-box');
      const imageUploadDiv = roomSection.querySelector('.image-upload');

      if (!previewContainer) return;

      const existingImages = previewContainer.querySelectorAll('.preview-image').length;
      const newFiles = Array.from(input.files);

      if (existingImages + newFiles.length > MAX_IMAGES) {
        alert(`You can upload up to ${MAX_IMAGES} images in total.`);
        return;
      }

      newFiles.forEach(file => {
        if (!file.type.startsWith("image/")) return;

        const reader = new FileReader();
        reader.onload = function (e) {
          const wrapper = document.createElement('div');
          wrapper.style.position = 'relative';
          wrapper.style.display = 'inline-block';

          const img = document.createElement("img");
          img.src = e.target.result;
          img.classList.add('preview-image');
          img.style.maxWidth = "120px";
          img.style.borderRadius = "8px";
          img.style.margin = "5px";

          // ✅ Create delete button
          const deleteBtn = document.createElement('span');
          deleteBtn.textContent = '×';
          deleteBtn.style.position = 'absolute';
          deleteBtn.style.top = '0px';
          deleteBtn.style.right = '5px';
          deleteBtn.style.cursor = 'pointer';
          deleteBtn.style.color = 'red';
          deleteBtn.style.fontSize = '20px';

          deleteBtn.addEventListener('click', function () {
            wrapper.remove();

            // ✅ If images less than max, keep uploadBox shown
            const totalImages = previewContainer.querySelectorAll('.preview-image').length;
            if (totalImages < MAX_IMAGES) {
              uploadBox.style.display = 'flex';
            }

            // ✅ If no images, show imageUpload again and hide uploadBox
            if (totalImages === 0) {
              imageUploadDiv.style.display = 'flex';
              uploadBox.style.display = 'none';
            }
          });

          wrapper.appendChild(img);
          wrapper.appendChild(deleteBtn);
          previewContainer.appendChild(wrapper);

          // ✅ After first upload: hide imageUpload div, show uploadBox
          imageUploadDiv.style.display = 'none';
          uploadBox.style.display = 'flex';

          // ✅ Hide uploadBox if reach max images
          const totalImages = previewContainer.querySelectorAll('.preview-image').length;
          if (totalImages >= MAX_IMAGES) {
            uploadBox.style.display = 'none';
          }
        };
        reader.readAsDataURL(file);
      });
    }
  });
});

