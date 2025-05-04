<?php
$conn = new mysqli("localhost", "zakii", "bkrbkrbkr", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = $_GET['id'];
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
        <h2>Personal information</h2>
        <p>You have to feel the form below :</p>
        <!-- hotel-info.php -->
<form class="mb" method="POST" enctype="multipart/form-data">
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
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['Name']);
    $email = $conn->real_escape_string($_POST['Email']);
    $phone = $conn->real_escape_string($_POST['Phone']);

    // Handle file upload
    if (isset($_FILES['Image'])) {
        $fileName = basename($_FILES['Image']['name']);
        $targetDir = "../../pics/uploads/verification";
        $targetFile = $targetDir . uniqid() . "_" . $fileName;

        // Create uploads directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        if (move_uploaded_file($_FILES['Image']['tmp_name'], $targetFile)) {
            // Insert into business_users table
            $stmt = $conn->prepare("UPDATE bissness_users SET username = ?, email = ?, phoneNbr = ?, verification_image = ? WHERE id = ?");
            $stmt->bind_param("sssss", $name, $email, $phone, $targetFile, $userId);

            if ($stmt->execute()) {
                echo "<script>window.location.href = 'hotel-info.php?id=$userId'</script>"; // Redirect to hotel-info.php with the new user ID
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        echo "<script>alert('No file uploaded.');</script>";
    }
}

$conn->close();
?>

    </main>
    
    <script src="../../js/business/owner-info.js"></script>
</body>
</html>