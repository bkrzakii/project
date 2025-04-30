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
    <title>Statistics - BookingDZ</title>
    <link rel="stylesheet" href="../../../css/business/dashboard/Statistics.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <header>
        <div class="logo">BookingDZ</div>
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
                <?php
                        $id = $_GET['id'];
                        $sql = "SELECT
                            bissness_users.username,
                            bissness_users.phoneNbr,
                            bissness_users.email 
                        FROM bissness_users WHERE id = $id";
                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0) {
                            $user = $result->fetch_assoc();
                            echo "<h3>my profile</h3>";
                            echo "<p>" . htmlspecialchars($user['username']) . "</p>";
                            echo "<p>" . htmlspecialchars($user['phoneNbr']) . "</p>";
                            echo "<p>" . htmlspecialchars($user['email']) . "</p>";
                        }
                        ?>
                </div>
                <a class="business" href="../business/owner-info.php">switch to business account</a>
                <a href="../SignUp_LogIn_Form.php" class="logout">Logout</a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="sidebar">
            <ul>
                <li><a href="#"class="active"><i class="fas fa-chart-pie"></i>  Statistics</a></li>
                <li><a href="../../business/dashboard/RoomManagement.php"><i class="fas fa-bed"></i>  Room Management</a></li>
                <li><a href="../../business/dashboard/Messages&Feedback.php"><i class="fas fa-envelope"></i>  Messages & Feedback</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="content-header">
                <div class="order">
                    <h3><i class="fas fa-calendar-alt"></i> Booking:</h3>
                    <p>500</p>
                </div>
                <div class="Active-Rooms">
                    <h3><i class="fas fa-door-open"></i> Active Rooms:</h3>
                    <p>40</p>
                </div>
                <div class="Revenue">
                    <h3><i class="fa-solid fa-money-bill-trend-up"></i> Revenue:</h3>
                    <p>40000DZD</p>
                </div>
                <div class="rating">
                    <h3><i class="fa-regular fa-star"></i> Rating:</h3>
                    <p>8.5</p>
                </div>
            </div>
            <div>
                <div class="chart">
                        <canvas id="myChart" style="box-sizing: border-box; display: block; height: 314px; width: 314px;" width="392" height="392"></canvas>
                </div>
            </div>
        </div>
    </main>
<script src="../../../js/business/dashboard/Statistics.js" defer></script>
</body>
</html>