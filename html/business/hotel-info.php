<?php
$conn = new mysqli("localhost", "root", "", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = $_GET['userId'] ?? null;
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
        <form class="mb" method="POST" enctype="multipart/form-data">
            <div class="input-box">
                <div class="image-upload">
                <i class="bx bx-image-add"></i>
                <p class="image">Upload hotel images</p>
            </div>
            <input name="Image[]" type="file" id="file-upload" class="input-file" accept="image/*" multiple>
            <div style="display: flex; flex-wrap: wrap ;">
                <div class="preview-container" style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;"></div>
                <div class="upload-box" >
                    <i class="bx bx-plus"></i>
                </div>
            </div>
            </div>
            

            <div class="input-box">
                <input name="HotelName" type="text" class="input" placeholder="Hotel Name" required>
            </div>
            <div class="input-box">
                <textarea name="Description" class="input" rows="4" placeholder="Hotel Description . . ."></textarea>
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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ownerId = $_GET['id'] ?? null;
        $hotelName = $conn->real_escape_string($_POST['HotelName']);
        $description = $conn->real_escape_string($_POST['Description']);
        $phone = $conn->real_escape_string($_POST['fix']);
        $email = $conn->real_escape_string($_POST['HotelEmail']);
        $address = $conn->real_escape_string($_POST['Address']);
        $website = $conn->real_escape_string($_POST['Website']);
        $rate = '0'; // Default rate

        // 1. Insert hotel_info (once)
        $stmt = $conn->prepare("INSERT INTO hotel_info (hotel_name, hotel_email, hotel_phoneNbr, hotel_address, hotel_description, hotel_owner, hotel_rate) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $hotelName, $email, $phone, $address, $description, $ownerId, $rate);
        if ($stmt->execute()) {
            $hotelId = $conn->insert_id;

            // 2. Handle multiple images
            if (isset($_FILES['Image'])) {
                foreach ($_FILES['Image']['tmp_name'] as $key => $tmp_name) {
                    $fileName = basename($_FILES['Image']['name'][$key]);
                    $targetDir = "../../pics/uploads/hotel/";
                    $targetFile = $targetDir . uniqid() . "_" . $fileName;

                    if (!file_exists($targetDir)) {
                        mkdir($targetDir, 0755, true);
                    }

                    if (move_uploaded_file($tmp_name, $targetFile)) {
                        $stmtImg = $conn->prepare("INSERT INTO hotel_image (hotel_id, image_path) VALUES (?, ?)");
                        $stmtImg->bind_param("ss", $hotelId, $targetFile);
                        $stmtImg->execute();
                        if ($stmtImg->error) {
                            echo "<script>alert('Error inserting image into database');</script>";
                        }
                    }
                }
            }
            echo "<script>window.location.href = 'rooms-info.php?userId=$userId&hotelId=$hotelId';</script>";
        }exit;

    }
    ?>
    <script src="../../js/business/hotel-info.js" defer></script>
</body>
</html>