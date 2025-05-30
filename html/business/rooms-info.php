<?php
$conn = new mysqli("localhost", "root", "", "hotel_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$userId = $_GET['id'] ?? null;
$hotelId = $_GET['hotelId'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rooms - BookingDZ</title>
    <link rel="stylesheet" href="../../css/business/rooms-info.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <main>
    <div class="container">
        <h2>🛏️ Add Hotel Rooms & Features</h2>
      
        <form class="hotelForm" id="hotelForm" method="POST" enctype="multipart/form-data" >
          <div class="roomsContainer" id="roomsContainer">
            <h1>🛏️ Add Multiple Rooms ➕</h1>
            <div class="input-box-rooms">
              <input type="number" class="input-rooms" name="Rooms" min="1" placeholder="How many rooms does the hotel have ?">
            </div>

            <!-- Template Room (hidden, ne sera pas soumis) -->
            <template id="room-template">
                  <div class="room-section">
                    <div class="room-header">
                      <h3>Room Template</h3>
                      <i type="button" onclick="removeRoom(this)" class="bx bxs-message-square-x"></i>
                    </div>

                    <!-- Room Type Dropdown -->
              <div class="input-box">
                <select class="input" name="rooms[1][type]" >
                  <option value="">-- Select Room Type --</option>
                  <option value="Single">Single</option>
                  <option value="Double">Double</option>
                  <option value="Suite">Suite</option>
                </select>
              </div>

              <!-- Max Occupancy -->
              <div class="input-box">
                <input type="number" class="input" name="rooms[1][occupancy]" min="1" placeholder="Max Occupancy">
              </div>

              <!-- Amenities Checkboxes -->
              <div class="input-box">
                <label class="input-label">Amenities</label>
                <div class="checkbox-group">
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="0">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Free WiFi</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="1">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Air Conditioning</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="2">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">TV</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="3">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Breakfast Include</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="4">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Elevator</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="5">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Pets Allows</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="6">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Private Bathroom</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="7">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Room Service</span>
                  </label>
                  
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="8">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">24h Reception</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="9">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Parking</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="10">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Daily Housekeeping</span>
                  </label>
                </div>
              </div>

              <!-- Image Upload -->
              <div class="image-box">
                  <div class="image-upload">
                    <i class="bx bx-image-add"></i>
                    <p class="image">Upload room images</p>
                  </div>
                  <input type="file" name="rooms[1][image][]" class="input-file file-upload" accept="image/*" multiple style="display: none;">
                  <div style="display: flex; flex-wrap: wrap ;">
                    <div class="preview-container" style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;"></div>
                    <div class="upload-box" >
                        <i class="bx bx-plus"></i>
                    </div>
                  </div>
              </div>

              <!-- Price and Quantity -->
              <div class="input-box">
                <input type="number" class="input" name="rooms[1][price]" min="0" placeholder="Price per Night (DZD)" >
              </div>

              <!-- Number of Rooms -->
              <div class="input-box">
                <input type="number" class="input" name="rooms[1][Max]" min="1" placeholder="How many rooms like that?">
              </div>

                  </div>
                </template>


            <!-- Default Room 1 -->
            <div class="room-section">

              <div class="room-header">
                <h3>Room Template 1</h3>
                <i type="button" onclick="removeRoom(this)"class="bx bxs-message-square-x"></i>
              </div>

              <!-- Room Type Dropdown -->
              <div class="input-box">
                <select class="input" name="rooms[1][type]" >
                  <option value="">-- Select Room Type --</option>
                  <option value="Single">Single</option>
                  <option value="Double">Double</option>
                  <option value="Suite">Suite</option>
                </select>
              </div>

              <!-- Max Occupancy -->
              <div class="input-box">
                <input type="number" class="input" name="rooms[1][occupancy]" min="1" placeholder="Max Occupancy">
              </div>

              <!-- Amenities Checkboxes -->
              <div class="input-box">
                <label class="input-label">Amenities</label>
                <div class="checkbox-group">
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="0">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Free WiFi</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="1">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Air Conditioning</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="2">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">TV</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="3">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Breakfast Include</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="4">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Elevator</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="5">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Pets Allows</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="6">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Private Bathroom</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="7">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Room Service</span>
                  </label>
                  
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="8">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">24h Reception</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="9">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Parking</span>
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" name="rooms[1][amenities][]" value="10">
                    <i class='bx bx-check-square'></i>
                    <span class="label-text ">Daily Housekeeping</span>
                  </label>
                </div>
              </div>

              <!-- Image Upload -->
              <div class="image-box">
                  <div class="image-upload">
                    <i class="bx bx-image-add"></i>
                    <p class="image">Upload room images</p>
                  </div>
                  <input type="file" name="rooms[1][image][]" class="input-file file-upload" accept="image/*" multiple style="display: none;">
                  <div style="display: flex; flex-wrap: wrap ;">
                    <div class="preview-container" style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;"></div>
                    <div class="upload-box" >
                        <i class="bx bx-plus"></i>
                    </div>
                  </div>
              </div>

              <!-- Price and Quantity -->
              <div class="input-box">
                <input type="number" class="input" name="rooms[1][price]" min="0" placeholder="Price per Night (DZD)" >
              </div>

              <!-- Number of Rooms -->
              <div class="input-box">
                <input type="number" class="input" name="rooms[1][Max]" min="1" placeholder="How many rooms like that?">
              </div>

            </div>
            <button type="button" class="btn btn-primary" onclick="addRoom()"><i  class="bx bx-message-square-add" onclick="addRoom()"></i>Add Room</button>
          </div>
          
          <button type="submit" class="btn btn-primary"><i class='bx bx-check-square'></i> continue</button>
          
        </form>
      </div>
      <?php
      ob_start();
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $rooms = $_POST['rooms'] ?? [];
          $totalRooms = $_POST['Rooms'] ?? 0;

          // Process each room
          foreach ($rooms as $index => $room) {
            $type = $conn->real_escape_string($room['type']);
            $occupancy = $conn->real_escape_string($room['occupancy']);
            $amenities = isset($room['amenities']) ? implode(",", $room['amenities']) : '';
            $price = $conn->real_escape_string($room['price']);
            $maxRooms = $conn->real_escape_string($room['Max']);
        
            // Insert room data
            $stmt = $conn->prepare("INSERT INTO room_info (hotel_id, room_type, room_capacity, amenities, room_price, matching_rooms) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $hotelId, $type, $occupancy, $amenities, $price, $maxRooms);
        
            if ($stmt->execute()) {
                $roomId = $conn->insert_id;
        
                // === Handle Image Upload ===
                if (
                    isset($_FILES['rooms']['name'][$index]['image']) &&
                    is_array($_FILES['rooms']['name'][$index]['image'])
                ) {
                    $imageNames = $_FILES['rooms']['name'][$index]['image'];
                    $imageTmpNames = $_FILES['rooms']['tmp_name'][$index]['image'];
                    $imageErrors = $_FILES['rooms']['error'][$index]['image'];
        
                    for ($i = 0; $i < count($imageNames); $i++) {
                        $fileName = basename($imageNames[$i]);
                        $tmpName = $imageTmpNames[$i];
                        $error = $imageErrors[$i];
        
                        if ($error !== UPLOAD_ERR_OK) {
                            echo "<script>alert('Upload error for image $i in room $index. Code: $error');</script>";
                            continue;
                        }
        
                        $targetDir = "../../pics/uploads/rooms/";
                        if (!file_exists($targetDir)) {
                            mkdir($targetDir, 0755, true);
                        }
        
                        $uniqueName = uniqid() . "_" . $fileName;
                        $targetFile = $targetDir . $uniqueName;
        
                        if (move_uploaded_file($tmpName, $targetFile)) {
                            $stmtImg = $conn->prepare("INSERT INTO room_images (room_id, image_path) VALUES (?, ?)");
                            $stmtImg->bind_param("is", $roomId, $targetFile);
                            $stmtImg->execute();
                            $stmtImg->close();
                        } else {
                            echo "<script>alert('Failed to move file $fileName');</script>";
                        }
                    }
                }
        
                $stmt->close();
            } else {
                echo "<script>alert('Error adding room $index');</script>";
            }
        }
        
            $sql ="SELECT id FROM room_info WHERE hotel_id = $hotelId";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $roomIds = array();
                while ($row = $result->fetch_assoc()) {
                    $roomIds[] = $row['id'];
                }
                $roomId = implode(",", $roomIds);
            } else {
                echo "<script>alert('No rooms found for this hotel.');</script>";
                $roomId = ""; // prevent passing undefined variable
            }
            $stmtRooms = $conn->prepare("UPDATE hotel_info SET rooms_total = ?, rooms = ?  WHERE id = ?");
            if ($stmtRooms === false) {
                die("Prepare failed: " . htmlspecialchars($conn->error));
            }
            $stmtRooms->bind_param("ssi", $totalRooms, $roomId, $hotelId); // lowercase 'r'
            $stmtRooms->execute();
            if($stmtRooms->close()){
              // Redirect to Features.php with the hotel ID
              echo "<script>window.location.href = 'Features.php??userId=$userId&id=$hotelId';</script>";
            }
            exit();
        }
          ob_end_flush();
      ?>
  </main>

<script src="../../js/business/rooms-info.js" defer></script>
</body>
</html>
