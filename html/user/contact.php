<?php
$conn = new mysqli("localhost", "zakii", "bkrbkrbkr", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = $_GET['id'];
$hotelId = $_GET['hotelId'] ?? null;
$sql = "SELECT verification_image FROM users WHERE user_id = $userId";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $verificationImage = $row['verification_image'];
} else {
    $verificationImage = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - BookingDZ</title>
    <link rel="stylesheet" href="../../css/user/contact.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <div class="logo">BookingDZ</div>
        <nav>
            <ul>
                <li id="1"><a href="home.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>" >Home</a></li>
                <li id="2"><a href="service.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Hotels</a></li>
                <li id="3"><a href="about.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">About</a></li>
                <li id="4"><a href="#" class="active">Contact</a></li>
                <?php if ($verificationImage != null): ?>
                    <li id="Dashboard-link"><a href="../business/dashboard/Statistics.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Dashboard</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="profile">
            <button class="profile-icon" onclick="toggleDescription()">
                <i class='bx bxs-user-circle'></i>
            </button>
            <div class="user-info" id="user-info">
                <img class="user-img" src="../../pics/admin.jpg" alt="">
                <div class="user-details">
                <?php
                    $sql = "SELECT
                        users.username,
                        users.phoneNbr,
                        users.email 
                    FROM users WHERE user_id = $userId";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        echo "<h3>my profile</h3>";
                        echo "<p>" . htmlspecialchars($user['username']) . "</p>";
                        echo "<p>" . htmlspecialchars($user['email']) . "</p>";
                        echo "<p>" . htmlspecialchars($user['phoneNbr']) . "</p>";
                    }
                ?>
                </div>
                <?php if ($verificationImage == null): ?>
                    <a class="business" id="Business" href="../business/owner-info.php?id=<?php echo $userId; ?>">switch to business account</a>
                <?php endif; ?>
                <a href="../SignUp_LogIn_Form.php" class="logout">Logout</a>
            </div>
        </div>
    </header>
    <main>
    <div class="container">
        <h2>Contact Us</h2>
        <p>If you have any questions or need assistance, feel free to contact us using the form below :</p>
        <form class="mb" method="post">
            <div class="input-box">
                <input type="text" class="input" placeholder="Your Name">
            </div>
            <div class="input-box">
                <input type="email" class="input" placeholder="Your Email" required>
            </div>
            <div class="input-box">
                <input type="text" class="input" placeholder="Subject">
            </div>
            <div class="input-box">
                <textarea class="input" rows="4" placeholder="Your Message . . ."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
        <hr/>
        <div class="mt-5">
            <h3>Support Contact</h3>
            <p class="footer-p">Email: <a href="mailto:boukrounazakaria01@gmail.com">boukrounazakaria01@gmail.com</a></p>
                <p class="footer-p">Phone: +1 234 567 890</p>
                <p class="footer-p">Address: 123 BookingDZ Street, City, Country</p>
        </div>
        <hr/>
        <div class="mt-5">
            <h3>Follow Us</h3>
            <div class="social-icons">
                    <a href="https://www.instagram.com/wchzakii/"><i class='bx bxl-instagram'></i></a>
                    <a href="https://www.facebook.com/boukrouna.zakaria2005/"><i class='bx bxl-facebook'></i></a>
                    <a href="https://wa.me/213774336385?text=Salut%20!%20Je%20viens%20de%20voir%20ton%20site."><i class='bx bxl-whatsapp'></i></a>
                </div>
        </div>
        <hr/>
        <div class="mt-5">
            <h3>Frequently Asked Questions (FAQ)</h3>
            <p><strong>How can I book a hotel?</strong><br> You can search for hotels on our platform and follow the booking process.</p>
            <p><strong>Can I cancel my reservation?</strong><br> Yes, cancellations depend on the hotel's policy. Check your booking details for more information.</p>
        </div>
    </div>
    </main>
    
    <script src="../../js/user/contact.js"></script>
</body>
</html>