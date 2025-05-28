<?php
$conn = new mysqli("localhost", "zakii", "bkrbkrbkr", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = $_GET['userId'];
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
                    <li id="1"><a href="home.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Home</a></li>
                    <li id="2"><a href="#" class="active">Hotels</a></li>
                    <li id="3"><a href="about.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">About</a></li>
                    <li id="4"><a href="contact.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Contact</a></li>
                    <?php if ($verificationImage != null): ?>
                        <li id="Dashboard-link"><a href="../business/dashboard/Statistics.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Dashboard</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <form class="search-bar" method="post">
                <input type="text" placeholder="Search...">
                <button type="submit" class="bi bi-search search"></button>
            </form>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<script>alert('This feature will be included in upcoming updates.');</script>";
            }
            ?>
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
                        <a class="business" id="Business" href="../business/owner-info.php?userId=<?php echo $userId; ?>">switch to business account</a>
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
                hotels.hotel_id,
                hotels.hotel_name,
                hotels.hotel_address,
                hotels.hotel_description,
                hotels.ratings,
                hotels.hotel_rate,
                hotel_image.image_path,
                hotels.hotel_rate
            FROM hotels 
            JOIN hotel_image ON hotel_image.hotel_id = hotels.hotel_id
            GROUP BY hotel_id";
            $result = $conn->query($sql);
        //SELECT *, COUNT(id) as num FROM `hotel_image` GROUP BY hotel_id;
        if ($result && $result->num_rows > 0) {
            foreach ($result as $value) :?>
            <div class="hotel_card" onclick="window.location.href='../user/hotel_details.php?hotelId=<?php echo $hotelId ?>&userId=<?php echo $userId; ?>&hotel=<?php echo $value['hotel_id']; ?>';" style="cursor:pointer;">
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