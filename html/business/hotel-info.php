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
    <title>Hotel Info - BookingDZ</title>
    <link rel="stylesheet" href="../../css/business/hotel-info.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <main>
    <div class="container">
        <h2>Hotel Information</h2>
        <p class="underTitle">You have to feel the form below :</p>
        <form class="mb" action="rooms-info.php" method="get">
            <div class="input-box">
                <label  for="file-upload" id="image-input">
                    <div class="image-upload">
                        <i class="bx bx-image-add"></i>
                        <p class="image">Upload hotel images</p>
                    </div>
                    <div id="preview-container" style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;"></div>
                </label>
                <input name="Image" type="file" id="file-upload" class="input-file" accept="image/*" multiple >
            </div>
            <div class="input-box">
                <input name="HotelName" type="text" class="input" placeholder="Hotel Name" required>
            </div>
            <div class="input-box">
                <textarea name="Description " class="input" rows="4" placeholder="Hotel Description . . ."></textarea>
            </div>
            <div class="input-box">
                <input name="fix" type="number" class="input" placeholder=" phone number (fix)" required pattern="[0-9]{10}"> 
            </div>
            <div class="input-box">
                <input name="HotelEmail" type="email" class="input" placeholder="Contact Email" >
            </div>
            
            <div class="input-box">
                <input name="Address" type="text" class="input" placeholder="Address (Street, City, ZIP)" required > 
            </div>
            <div class="input-box">
                <input name="Website" type="text" class="input" placeholder="Website (optional)" >
            </div>
            
            <button type="submit" class="btn btn-primary">Continue</button>
        </form>
    </main>
    
    <script src="../../js/business/hotel-info.js" defer></script>
</body>
</html>