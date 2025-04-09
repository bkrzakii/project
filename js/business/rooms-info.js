let roomCount = 1;

function addRoom() {
  roomCount++;

  const roomsContainer = document.getElementById('roomsContainer');
  const firstRoom = document.querySelector('.room-section');

  // Clone the first room node
  const newRoom = firstRoom.cloneNode(true);

  // Update heading
  newRoom.querySelector('.room-header h3').textContent = `Room ${roomCount}`;

  // Update all name attributes with the new roomCount
  const inputs = newRoom.querySelectorAll('[name]');
  inputs.forEach(input => {
    input.name = input.name.replace(/\[\d+\]/, `[${roomCount}]`);

    // Clear input values
    if (input.type === 'checkbox' || input.type === 'file') {
      input.checked = false;
    } else {
      input.value = '';
    }
  });

  // Clear file error message
  const fileError = newRoom.querySelector('#file-error');
  if (fileError) fileError.textContent = '';

  roomsContainer.appendChild(newRoom);
}


function removeRoom(button) {
  const section = button.closest('.room-section');
  section.remove();
}
