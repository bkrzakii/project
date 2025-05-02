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
    <title>Messages & Feedback - BookingDZ</title>
    <link rel="stylesheet" href="../../../css/business/dashboard/Statistics.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
        <header>
        <div class="logo">BookingDZ</div>
        <nav>
            <ul>
                <li id="1"><a href="../../user/home.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>" >Home</a></li>
                <li id="2"><a href="../../user/service.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Hotels</a></li>
                <li id="3"><a href="../../user/about.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">About</a></li>
                <li id="4"><a href="../../user/contact.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Contact</a></li>
                <li id="Dashboard-link"><a href="#" class="active">Dashboard</a></li>
            </ul>
        </nav>
        <div class="profile">
            <button class="profile-icon" onclick="toggleDescription()">
                <i class='bx bxs-user-circle'></i>
            </button>
            <div class="user-info" id="user-info">
                <img class="user-img" src="../../../pics/admin.jpg" alt="">
                <div class="user-details">
                <?php
                    $sql = "SELECT
                        bissness_users.username,
                        bissness_users.phoneNbr,
                        bissness_users.email 
                    FROM bissness_users WHERE id = $userId";
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
                <a href="../SignUp_LogIn_Form.php" class="logout">Logout</a>
            </div>
        </div>
        </header>
        <main class="main">
            <div class="sidebar">
                <ul>
                    <li><a href="../../business/dashboard/Statistics.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">
                        <i class="fas fa-chart-pie"></i> Statistics</a></li>
                    <li><a href="../../business/dashboard/BookingsOverview.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">
                        <i class="fas fa-calendar-check"></i> Bookings Overview</a></li>
                    <li><a href="#"class="active"><i class="fas fa-envelope"></i> Messages & Feedback</a></li>
                </ul>
            </div>
        <div class="container">
            
            <div class="content">
                <h1>Dashboard</h1>
                <!-- Add your dashboard content here -->
                <p>Welcome to your dashboard!</p>
            </div>
            
        </main>
    <!-- Extra content to make the page scrollable -->


</div>
<script src="../../../js/business/dashboard/Messages&Feedback.js" defer></script>
</body>
</html>