<?php
$conn = new mysqli("localhost", "zakii", "bkrbkrbkr", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = $_GET['id'];
$hotelId = $_GET['hotelId'] ?? null;
$sql = "SELECT verification_image FROM bissness_users WHERE id = $userId";
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
    <title>Hotles - BookingDZ</title>
    <link rel="stylesheet" href="../../css/user/service.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>
<body>
    <div class="background">
        <header>
            <div class="logo">BookingDZ</div>
            <nav>
                <ul>
                    <li id="1"><a href="home.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Home</a></li>
                    <li id="2"><a href="#" class="active">Hotels</a></li>
                    <li id="3"><a href="about.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">About</a></li>
                    <li id="4"><a href="contact.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Contact</a></li>
                    <?php if ($verificationImage != null): ?>
                        <li id="Dashboard-link"><a href="../business/dashboard/Statistics.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Dashboard</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <form action="#" class="search-bar" method="get">
                <input type="text" placeholder="Search...">
                <button type="submit" class="bi bi-search search"></button>
            </form>
            <div class="profile">
                <button class="profile-icon" onclick="toggleDescription()">
                    <i class='bx bxs-user-circle'></i>
                </button>
                <div class="user-info" id="user-info">
                    <img class="user-img" src="../../pics/admin.jpg" alt="">
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
                    <?php if ($verificationImage == null): ?>
                        <a class="business" id="Business" href="../business/owner-info.php?id=<?php echo $userId; ?>">switch to business account</a>
                    <?php endif; ?>
                    <a href="../SignUp_LogIn_Form.php" class="logout">Logout</a>
                </div>
            </div>
        </header>
    </div>
    <!-- Extra content to make the page scrollable -->
    <div class="hotels_list">
    <?php
        $sql = "SELECT 
                hotel_info.id,
                hotel_info.hotel_name,
                hotel_info.hotel_address,
                hotel_info.hotel_description,
                hotel_info.ratings,
                hotel_info.hotel_rate,
                hotel_image.image_path,
                hotel_info.hotel_rate
            FROM hotel_info
            JOIN hotel_image ON hotel_image.hotel_id = hotel_info.id";
            $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            foreach ($result as $value) :?>
            <div class="hotel_card" onclick="window.location.href='../user/hotel_details.php?hotelId=<?php echo $value['id']; ?>&userId=<?php echo $userId; ?>';" style="cursor:pointer;">
                <img class="hotel_img" src="<?php echo htmlspecialchars($value['image_path']); ?>" alt="<?php echo htmlspecialchars($value['hotel_name']); ?>">
                <div class="hotel_info">
                    <h3><?php echo htmlspecialchars($value['hotel_name']); ?></h3>
                    <p><?php echo htmlspecialchars($value['hotel_description']); ?></p>
                    <p>Location: <?php echo htmlspecialchars($value['hotel_address']); ?></p>
                    <?php $average = ($value['ratings'] > 0) ? ($value['hotel_rate'] / $value['ratings']) : 0; ?>
                    <p>Rating: <?php echo htmlspecialchars(number_format($average, 1))?>/5</p>
                </div>
            </div>
            <?php endforeach;
        }
    ?>
    </div>
    <script src="../../js/user/service.js"></script>
</body>
</html>