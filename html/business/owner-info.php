<?php
$conn = new mysqli("localhost", "root", "", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Info - BookingDZ</title>
    <link rel="stylesheet" href="../../css/business/owner-info.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <main>
    <div class="container">
        <h2>Personal iIformation</h2>
        <p>You have to feel the form below :</p>
        <!-- hotel-info.php -->
<form class="mb" action="hotel-info.php" method="POST" enctype="multipart/form-data">
    <div class="input-box">
        <input type="text" class="input" placeholder="Your Name" name="Name" required>
    </div>
    <div class="input-box">
        <input type="email" class="input" placeholder="Your Email" name="Email" required>
    </div>
    <div class="input-box">
        <input type="text" class="input" placeholder="Phone number" name="Phone" required pattern="[0-9]{10}">
    </div>
    <div class="input-box">
        <label for="file-upload" id="file-name">Upload business verification document</label>
        <input type="file" id="file-upload" class="input-file" name="Image" required>
        <div id="file-error" class="error-msg"></div>
    </div>
    <button type="submit" class="btn btn-primary">Continue</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Name'];
    $email = $_POST['Email'];
    $phoneNbr = $_POST['Phone'];
    $image = $_POST['Image'];
        $stmt = $conn->prepare("INSERT INTO bissness_users (username, email, phoneNbr, verification_image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $username, $email, $phoneNbr, $image);

        if ($stmt->execute()) {
            echo "<script>alert('Data and image uploaded successfully!');</script>";
        } else {
            echo "<script>alert('Database insertion failed.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('File upload failed.');</script>";
    }

    $conn->close();
?>

    </main>
    
    <script src="../../js/business/owner-info.js"></script>
</body>
</html>