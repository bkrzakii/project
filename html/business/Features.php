<?php
$conn = new mysqli("localhost", "zakii", "bkrbkrbkr", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Features - BookingDZ</title>
    <link rel="stylesheet" href="../../css/business/rooms-info.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <main>
    <div class="container">
        <h2>🛏️ Add Hotel Features</h2>
      
        <form class="hotelForm" id="hotelForm" action="" method="post" enctype="multipart/form-data" >
          <div class="featuresContainer" id="featuresContainer">
            <h1>🎯 Special Features & Activities</h1>
        
            <div class="features-section">
              <h3>Select available features & activities</h3>
              <div class="input-box">
              <label class="input-label"></label>
              <div class="checkbox-group">
                
                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="0">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Beach Access</span>
                </label>
        
                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="1">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Private Pool</span>
                </label>
        
                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="2">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Live Events</span>
                </label>

                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="3">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Gym / Fitness</span>
                </label>

                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="4">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Kids Activities</span>
                </label>

                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="5">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Cooking Classes</span>
                </label>

                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="6">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Hiking Trails Nearby</span>
                </label>

                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="7">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Night Entertainment</span>
                </label>

                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="8">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Guided Tours (city or nature)</span>
                </label>

                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="9">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Yoga / Wellness Sessions</span>
                </label>

                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="10">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Water Sports (Jet ski, kayak…)</span>
                </label>

                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="11">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Spa / Massage Treatments</span>
                </label>
                
                <label class="checkbox">
                  <input type="checkbox" name="features[]" value="12">
                  <i class='bx bx-check-square'></i>
                  <span class="label-text">Special Events (weddings, concerts…)</span>
                </label>
              </div>
            </div>
            </div>
            
            
          </div>
          <button type="submit" class="btn btn-primary"><i class='bx bx-check-square'></i> Submit</button>
          
        </form>
      </div>
  </main>
    
    

<script src="../../js/business/Features.js" defer></script>
</body>
</html>
