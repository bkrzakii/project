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
    <meta charset="UTF-8">`
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page - BookingDZ</title>
    <link rel="stylesheet" href="../../css/user/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
        <header>
        <div class="logo">BookingDZ</div>
        <nav>
            <ul>
                <li id="1"><a href="#" class="active">Home</a></li>
                <li id="2"><a href="service.php?id=<?php echo $userId; ?>">Hotels</a></li>
                <li id="3"><a href="about.php?id=<?php echo $userId; ?>">About</a></li>
                <li id="4"><a href="contact.php?id=<?php echo $userId; ?>">Contact</a></li>
                <li id="Dashboard-link" style=" display: none;"><a href="../business/dashboard/Statistics.php">Dashboard</a></li>
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
                        user.username,
                        user.email 
                    FROM user WHERE id = $userId";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        echo "<h3>my profile</h3>";
                        echo "<p>" . htmlspecialchars($user['username']) . "</p>";
                        echo "<p>" . htmlspecialchars($user['email']) . "</p>";
                    }
                    ?>
                </div>
                <a class="business" id="Business" href="../business/owner-info.php">switch to business account</a>
                <a href="../SignUp_LogIn_Form.php" class="logout">Logout</a>
            </div>
        </div>
        </header>
        <main>
            <div class="background">
                <section class="hero">
                    <h1>BookingDZ</h1>
                    <h3 class="h3-main">LANDING PAGE</h3>
                    <p class="main-p">Hey there! Welcome to BookingDZ — your go-to platform for booking amazing stays with ease and peace of mind.</p>
                    <button class="read-more"><a href="about.php?id=<?php echo $userId; ?>">Read More</a></button>
                </section>
            </div>
        </main>
        <footer>
            <hr/>
            <div class="mt-5">
                <h3 class="h3-footer">Support Contact</h3>
                <p class="footer-p">Email: <a href="mailto:boukrounazakaria01@gmail.com">boukrounazakaria01@gmail.com</a></p>
                <p class="footer-p">Phone: +1 234 567 890</p>
                <p class="footer-p">Address: 123 Treservi Street, City, Country</p>
            </div>

            <hr/>
            <div class="mt-5">
                <h3 class="h3-footer">Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                </div>
            </div>
        </footer>

    <!-- Extra content to make the page scrollable -->


</div>
<script src="../../js/user/home.js" defer></script>
</body>
</html>