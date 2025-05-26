<?php
$conn = new mysqli("localhost", "root", "", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = $_GET['userId'] ?? null;
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
                <li id="1"><a href="../../user/home.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>" >Home</a></li>
                <li id="2"><a href="../../user/service.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Hotels</a></li>
                <li id="3"><a href="../../user/about.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">About</a></li>
                <li id="4"><a href="../../user/contact.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Contact</a></li>
                <li id="Dashboard-link"><a href="#?userId=<?php echo $userId; ?>" class="active">Dashboard</a></li>
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
                <a href="../../SignUp_LogIn_Form.php" class="logout">Logout</a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="#"class="active"><i class="fas fa-chart-pie">
                    </i>&nbsp;&nbsp;Statistics</a>
                </li>
                <li>
                    <a href="../../business/dashboard/BookingsOverview.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotelId;?>">
                    <i class="fas fa-calendar-check"></i>&nbsp;&nbsp;Bookings Overview</a>
                </li>
            </ul>
            <form action="" method="post" class="delete-hotel" onsubmit="return confirm('Are you sure you want to delete this hotel?');">
                <input type="hidden" name="hotelId" value="<?php echo htmlspecialchars($hotelId);?>">
                <button type="submit" class="btn btn-primary"><i class='bx bx-check-square'></i> delete</button>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $hotelId = $_POST['hotelId'] ?? null;
                if ($hotelId && $userId) {
                    $conn->begin_transaction(); // Start transaction

                    try {

                        // 1. Delete from room_amenities
                        $stmt1 = $conn->prepare("DELETE FROM room_amenities WHERE room_id IN (SELECT room_id FROM rooms WHERE hotel_id = ?)");
                        $stmt1->bind_param("i", $hotelId);
                        $stmt1->execute();
                        $stmt1->close();

                        // 2. Delete from room_images
                        $stmt2 = $conn->prepare("DELETE FROM room_images WHERE room_id IN (SELECT room_id FROM rooms WHERE hotel_id = ?)");
                        $stmt2->bind_param("i", $hotelId);
                        $stmt2->execute();
                        $stmt2->close();

                        // 3. Delete from booking
                        $stmt3 = $conn->prepare("DELETE FROM booking WHERE room_id IN (SELECT room_id FROM rooms WHERE hotel_id = ?)");
                        $stmt3->bind_param("i", $hotelId);
                        $stmt3->execute();
                        $stmt3->close();

                        // 4. Delete from rooms
                        $stmt4 = $conn->prepare("DELETE FROM rooms WHERE hotel_id = ?");
                        $stmt4->bind_param("i", $hotelId);
                        $stmt4->execute();
                        $stmt4->close();

                        // 5. Delete from hotel_features
                        $stmt5 = $conn->prepare("DELETE FROM hotel_features WHERE hotel_id = ?");
                        $stmt5->bind_param("i", $hotelId);
                        $stmt5->execute();
                        $stmt5->close();

                        // 6. Delete from hotel_images
                        $stmt6 = $conn->prepare("DELETE FROM hotel_image WHERE hotel_id = ?");
                        $stmt6->bind_param("i", $hotelId);
                        $stmt6->execute();
                        $stmt6->close();

                        // 7. Finally, delete from hotels
                        $stmt7 = $conn->prepare("DELETE FROM hotels WHERE hotel_id = ?");
                        $stmt7->bind_param("i", $hotelId);
                        $stmt7->execute();
                        $stmt7->close();

                        // 8. modify the user_id in the users table to null
                        $stmt8 = $conn->prepare("UPDATE users SET phoneNbr = NULL, verification_image = NULL WHERE user_id = ?");
                        $stmt8->bind_param("i", $userId);
                        $stmt8->execute();
                        $stmt8->close();

                        // Commit all if successful
                        $conn->commit();

                        // Redirect after success
                        header("Location: ../../user/home.php?userId= $userId&hotelId=");
                        exit;

                    } catch (Exception $e) {
                        $conn->rollback(); // Rollback on error
                        echo "<p>Error deleting hotel</p>";
                    }
                }
            }
            ?>
        </div>
        <div class="content">
            <div class="content-header">
                <div class="order">
                    <?php
                    $sql = "SELECT COUNT(*) as total FROM booking 
                    JOIN rooms ON booking.room_id = rooms.room_id
                    WHERE hotel_id = $hotelId";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();?>
                        <h3><i class="fas fa-calendar-alt"></i> Booking:</h3>
                        <p><?php echo htmlspecialchars($row['total']);?></p>
                    <?php } ?>
                </div>
                <div class="Active-Rooms">
                    <?php
                    $sql = "SELECT rooms_total as totalRooms FROM hotels WHERE hotel_id = $hotelId";
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
                    $sql = "SELECT SUM(total_price) as total FROM booking 
                    JOIN rooms ON booking.room_id = rooms.room_id
                    WHERE hotel_id = $hotelId";
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
                    <div class="display-stars">
                        <?php 
                        $sql = "SELECT hotel_rate, ratings FROM hotels WHERE hotel_id = $hotelId";
                        $result = $conn->query($sql);
                        $value = $result->fetch_assoc();
                        $average = ($value['ratings'] > 0) ? ($value['hotel_rate'] / $value['ratings']) : 0; ?>
                        <?php for ($i = 1; $i <= 5; $i++) {
                            if ($i <= floor($average)) {
                                echo '<i class="fa-solid fa-star"></i>';
                            } elseif ($i - $average < 1) {
                                echo '<i class="fa-solid fa-star-half-stroke"></i>';
                            } else {
                                echo '<i class="fa-regular fa-star"></i>';
                            }
                        }
                        ?>
                        <span class="hotel_info">&nbsp;<?php echo htmlspecialchars(number_format($average, 1))?>/5</span>
                    </div>
                    
                    <span>&nbsp;(<?php echo htmlspecialchars($value['ratings'])?> ratings)</span>
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