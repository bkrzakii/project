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
                <li id="1"><a href="../../user/home.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>" >Home</a></li>
                <li id="2"><a href="../../user/service.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Hotels</a></li>
                <li id="3"><a href="../../user/about.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">About</a></li>
                <li id="4"><a href="../../user/contact.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Contact</a></li>
                <li id="Dashboard-link"><a href="#?id=<?php echo $userId; ?>" class="active">Dashboard</a></li>
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
                <li><a href="#"class="active"><i class="fas fa-chart-pie">

                </i>&nbsp;&nbsp;Statistics</a>
            </li>
                <li><a href="../../business/dashboard/BookingsOverview.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId;?>">
                    <i class="fas fa-calendar-check"></i>&nbsp;&nbsp;Bookings Overview</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="content-header">
                <div class="order">
                    <?php
                    $sql = "SELECT COUNT(*) as total FROM booking WHERE hotel_id = $hotelId";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();?>
                        <h3><i class="fas fa-calendar-alt"></i> Booking:</h3>
                        <p><?php echo htmlspecialchars($row['total']);?></p>
                    <?php } ?>
                </div>
                <div class="Active-Rooms">
                    <?php
                    $sql = "SELECT rooms_total as totalRooms FROM hotel_info WHERE id = $hotelId";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $totalRooms = $result->fetch_assoc();
                        $total = $totalRooms['totalRooms'] - $row['total'];?>
                        <h3><i class="fas fa-door-open"></i> Active Rooms:</h3>
                        <p><?php echo htmlspecialchars($total);?>/<?php echo htmlspecialchars($totalRooms['totalRooms']);?></p>
                    <?php }?>
                </div>
                <div class="Revenue">
                    <h3><i class="fa-solid fa-money-bill-trend-up"></i> Revenue:</h3>
                    <?php 
                    $sql = "SELECT SUM(total_price) as total FROM booking WHERE hotel_id = $hotelId";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        if($row['total']== 0){ echo'<p>0 DA</p>';}
                        else{?>
                        <p><?php echo htmlspecialchars($row['total']);?> DA</p>
                    <?php }}?>
                        
                </div>
                <div class="rating">
                    <h3><i class="fa-regular fa-star"></i> Rating:</h3>
                    <?php 
                    $sql = "SELECT hotel_rate FROM hotel_info WHERE id = $hotelId";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $value = $result->fetch_assoc();
                        echo '<p>';
                        for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $value['hotel_rate']) {
                            echo '<i class="fa-solid fa-star" style="color: gold; font-size: 20px;"></i>';
                        } else {
                            echo '<i class="fa-regular fa-star" style="color: gold; font-size: 20px;"></i>';
                        }
                    }echo '&nbsp;&nbsp;&nbsp;'. htmlspecialchars($value['hotel_rate']) .'/5</p>';
                    }?>
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