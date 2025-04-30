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
    <title>About Us - BookingDZ</title>
    <link rel="stylesheet" href="../../css/user/about.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <div class="logo">BookingDZ</div>
        <nav>
            <ul>
                <li id="1"><a href="home.php?id=<?php echo $userId; ?>" >Home</a></li>
                <li id="2"><a href="service.php?id=<?php echo $userId; ?>">Hotels</a></li>
                <li id="3"><a href="#"class="active">About</a></li>
                <li id="4"><a href="contact.php?id=<?php echo $userId; ?>">Contact</a></li>
                <li id="Dashboard-link" style=" display: none;"><a href="../business/dashboard/Statistics.php">Dashboard</a></li>
            </ul>
        </nav>
        <div class="empty"></div>
        <div class="profile">
            <button class="profile-icon" onclick="toggleDescription()">
                <i class='bx bxs-user-circle'></i>
            </button>
            <div class="user-info" id="user-info">
                <img class="user-img" src="/pics/admin.jpg" alt="">
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
                <a class="business" id="Business" href="#">switch to business account</a>
                <a href="../SignUp_LogIn_Form.php" class="logout">Logout</a>
            </div>
        </div>
        </header>
    <main>
        <div class="container mt-5">
        <h2>About BookingDZ</h2>
        <p>Hey there! Welcome to BookingDZ — your go-to platform for booking amazing stays with ease and peace of mind.</p>
        <p>At BookingDZ, we know how important it is to find the right place to stay when you're traveling. That’s why we’ve made it our mission to make the whole booking process smooth and stress-free. Whether you're after a fancy hotel, a comfy guesthouse, or something a bit different, we've got you covered with a wide variety of carefully picked options.</p>
        <p>No matter your style or budget, you'll find something that fits. With our fast and super easy-to-use site, you can book your stay in just a few clicks — safe, quick, and simple. We're here to make your travel planning easier, more fun, and totally hassle-free.</p>
</div>
    </main>
    
    
    <script src="../../js/user/about.js"></script>
</body>
</html>