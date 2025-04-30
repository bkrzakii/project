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
    <title>Messages & Feedback - BookingDZ</title>
    <link rel="stylesheet" href="../../../css/business/dashboard/Statistics.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
        <header>
        <div class="logo">LOGO</div>
        <nav>
            <ul>
                <li id="1"><a href="../../user/home.php" >Home</a></li>
                <li id="2"><a href="../../user/service.php">Service</a></li>
                <li id="3"><a href="../../user/about.php">About</a></li>
                <li id="4"><a href="../../user/contact.php">Contact</a></li>
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
                
                </div>
                <a class="business" href="../business/owner-info.php">switch to business account</a>
                <a href="../SignUp_LogIn_Form.php" class="logout">Logout</a>
            </div>
        </div>
        </header>
        <main class="main">
            <div class="sidebar">
                <ul>
                    <li><a href="../../business/dashboard/Statistics.php">Statistics</a></li>
                    <li><a href="../../business/dashboard/BookingsOverview.php">Bookings Overview</a></li>
                    <li><a href="#"class="active">Messages & Feedback</a></li>
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