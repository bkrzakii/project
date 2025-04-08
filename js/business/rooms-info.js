let roomCount = 1;

function addRoom() {
  roomCount++;

  const roomsContainer = document.getElementById('roomsContainer');

  const roomDiv = document.createElement('div');
  roomDiv.className = 'room-section';

  roomDiv.innerHTML = `
    <button type="button" class="remove-btn" onclick="removeRoom(this)">✖</button>
    <h3>Room ${roomCount}</h3>

    <label>Room Type</label>
    <select name="rooms[${roomCount}][type]" required>
      <option value="">-- Select Room Type --</option>
      <option value="Single">Single</option>
      <option value="Double">Double</option>
      <option value="Suite">Suite</option>
    </select>

    <label>Number of Rooms</label>
    <input type="number" name="rooms[${roomCount}][count]" min="1" required>

    <label>Price per Night (DZD)</label>
    <input type="number" name="rooms[${roomCount}][price]" min="0" required>

    <label>Max Occupancy</label>
    <input type="number" name="rooms[${roomCount}][occupancy]" min="1">

    <label>Amenities</label>
    <div class="checkbox-group">
      <label><input type="checkbox" name="rooms[${roomCount}][amenities][]" value="WiFi"> WiFi</label>
      <label><input type="checkbox" name="rooms[${roomCount}][amenities][]" value="AC"> AC</label>
      <label><input type="checkbox" name="rooms[${roomCount}][amenities][]" value="TV"> TV</label>
    </div>

    <label>Room Images</label>
    <input type="file" name="rooms[${roomCount}][images][]" multiple accept="image/*">
  `;

  roomsContainer.appendChild(roomDiv);
}

function removeRoom(button) {
  const section = button.closest('.room-section');
  section.remove();
}
