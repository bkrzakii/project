<?php
$conn = new mysqli("localhost", "root", "", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = $_GET['userId'] ?? null;
$hotelId = $_GET['hotel'] ?? null;
$hotel = $_GET['hotelId'] ?? null;
$sql = "SELECT verification_image FROM users WHERE user_id = $userId";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $verificationImage = $row['verification_image'];
} else {
    $verificationImage = null;
}
$rating = 0; // Default rating value
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - BookingDZ</title>
    <link rel="stylesheet" href="../../css/user/hotel_details.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>

<body>

<div class="background">
        <header>
            <div class="logo">BookingDZ</div>
            <nav>
                <ul>
                    <li id="1"><a href="home.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotel?>">Home</a></li>
                    <li id="2"><a href="service.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotel?>" class="active">Hotels</a></li>
                    <li id="3"><a href="about.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotel?>">About</a></li>
                    <li id="4"><a href="contact.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotel?>">Contact</a></li>
                    <?php if ($verificationImage != null): ?>
                        <li id="Dashboard-link"><a href="../business/dashboard/Statistics.php?userId=<?php echo $userId; ?>&hotelId=<?php echo $hotel?>">Dashboard</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <form class="search-bar" method="get">
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

<div class="container">
    <?php
        if (!isset($_GET['hotelId'])) {
            die("No rooms IDs provided.");
        }
        $sql = "SELECT 
                hotels.hotel_name,
                hotels.hotel_email,
                hotels.hotel_phoneNbr,
                hotels.hotel_address,
                hotels.hotel_description,
                hotels.hotel_rate,
                hotels.ratings
                
            FROM hotels 
            JOIN rooms ON rooms.hotel_id = hotels.hotel_id
            JOIN room_images ON room_images.room_id = rooms.room_id
            WHERE hotels.hotel_id = $hotelId";
            $result = $conn->query($sql);

            $sql = "SELECT 
                rooms.hotel_id,
                room_images.image_path
                FROM rooms
            JOIN room_images ON room_images.room_id = rooms.room_id
            WHERE rooms.hotel_id = $hotelId";
            $image = $conn->query($sql);
        if($result && $result->num_rows >0):
            $value = $result->fetch_assoc();?>
            <h1><?php echo htmlspecialchars($value['hotel_name']); ?></h1>
            <div class="hotel_img_container">
                <?php while($row = $image->fetch_assoc()): ?>
                    <img class="hotel_img" src="<?php echo htmlspecialchars($row['image_path'])?>" alt="<?php echo htmlspecialchars($value['hotel_name']); ?>">
                <?php endwhile; ?>
            </div>
            <h2>More Information</h2>
            <h4 style="display: inline;">description : &nbsp;</h4>
            <span class="hotel_info"><?php echo htmlspecialchars($value['hotel_description'])?> </span><br>
            <h4 style="display: inline;">Address : &nbsp;</h4>
            <span class="hotel_info"><?php echo htmlspecialchars($value['hotel_address']);?></span><br>
            <h4 style="display: inline;">Email : &nbsp;</h4>
            <span class="hotel_info"><a href="<?php echo htmlspecialchars($value['hotel_email']);?>"><?php echo htmlspecialchars($value['hotel_email']);?></a></span><br>
            <h4 style="display: inline;">Phone Number: &nbsp;</h4>
            <span class="hotel_info"><?php echo htmlspecialchars($value['hotel_phoneNbr']); ?></span><br>
            <div class="display-stars">
                <?php
            $average = ($value['ratings'] > 0) ? ($value['hotel_rate'] / $value['ratings']) : 0; ?>
            <h4 style="display: inline;">Guest Reviews :&nbsp;&nbsp;</h4>
            <?php for ($i = 1; $i <= 5; $i++) {
                if ($i <= floor($average)) {
                    echo '<i class="fa-solid fa-star"></i>';
                } elseif ($i - $average < 1) {
                    echo '<i class="fa-solid fa-star-half-stroke"></i>';
                } else {
                    echo '<i class="fa-regular fa-star"></i>';
                }
            }
            endif?>
            <span class="hotel_info">&nbsp;<?php echo htmlspecialchars(number_format($average, 1))?>/5&nbsp;(<?php echo htmlspecialchars($value['ratings'])?> ratings)</span>
            </div>

        <h2>Hotel Featues</h2>

        <div class="featuresContainer">
            <div class="features-group">
                <?php
                    $featureSql = "SELECT features.feature 
                                FROM features
                                JOIN hotel_features ON hotel_features.feature_id = features.id
                                WHERE hotel_features.hotel_id = ?";

                    $Stmt = $conn->prepare($featureSql);
                    $Stmt->bind_param("i", $hotelId);
                    $Stmt->execute();
                    $Result = $Stmt->get_result();
                    if (!$Result) {echo "<p>No features listed</p>";}
                    else{
                    $featuresNames = [];
                    while ($Row = $Result->fetch_assoc()): ?>
                        <label class='feature'>
                        <span class='label-text'> <?php echo htmlspecialchars($Row['feature']) ?></span>
                        </label>
                    <?php endwhile;}
                ?>
            </div>
        </div>


            <h2>Room Details</h2>
            
            <table>
            <thead>
                <tr>
                <th>Room Type</th>
                <th>Room Capacity</th>
                <th>Price</th>
                <th>Amenities</th>
                <th>Select</th>
                </tr>
            </thead>
            <tbody>
        <form method="post">
                <?php
                $sql = "SELECT 
                            rooms.room_id,
                            rooms.room_type,
                            rooms.room_capacity,
                            rooms.room_price
                        FROM rooms 
                        WHERE rooms.hotel_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $hotelId);
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if any rooms were found
                if ($result && $result->num_rows > 0) {
                    while ($room = $result->fetch_assoc()) :
                        $room_id = $room['room_id']; // Define the variable correctly
                ?>
                        <tr>
                            <th><p> <?php echo htmlspecialchars($room['room_type']) ?> </p></th>
                            <th><p> <?php echo htmlspecialchars($room['room_capacity']) ?> </p></th>
                            <th><p> <?php echo htmlspecialchars($room['room_price']) ?> DZ</p></th>
                            <?php
                            // Now fetch amenities for this room
                            $amenitySql = "SELECT amenities.amenity 
                                        FROM room_amenities
                                        JOIN amenities ON room_amenities.amenity_id = amenities.id
                                        WHERE room_amenities.room_id = ?";
                            $amenityStmt = $conn->prepare($amenitySql);
                            $amenityStmt->bind_param("i", $room_id);
                            $amenityStmt->execute();
                            $amenityResult = $amenityStmt->get_result();

                            $amenityNames = [];
                            while ($amenityRow = $amenityResult->fetch_assoc()) {
                                $amenityNames[] = htmlspecialchars($amenityRow['amenity']);
                            }

                            if (!empty($amenityNames)) {
                                echo "<th><p>" . implode(',&nbsp;&nbsp;&nbsp;', $amenityNames) . "</p></th>";
                            } else {
                                echo "<th><p>None listed</p></th>";
                            }
                            ?>
                            <th><label class="checkbox">
                            <input type="radio" name="selected" value="<?php echo htmlspecialchars($room['room_id'])?>" style="display: none">
                            <i class="fa-solid fa-circle-check"></i>
                            <i class="fa-regular fa-circle-check"></i>
                            </label></th>
                        </tr>
                        <?php endwhile;
                    } else { echo "No rooms found for the selected hotel(s)."; }?>
            </tbody>
            </table>
            <h2>Fill your Information</h2>
            <div class="input-box">
                <input type="text" class="input" placeholder="First Name" name="Fname" required>
            </div>
            <div class="input-box">
                <input type="text" class="input" placeholder="Last Name" name="Lname" required>
            </div>
            <div class="input-box">
                <input type="text" class="input" placeholder="Phone number"  name="NumPhone" required pattern="{13}"> 
            </div>
            <div class="date-boxes">
                <div class="date-box">
                    <p class="date_span">Date In:</p>
                    <input type="date" class="input" placeholder="Phone number" name="dateFrom" required>
                </div>
                <div class="date-box">
                    <p class="date_span">Date Out:</p>
                    <input type="date" class="input" placeholder="Phone number" name="dateTo" required>
                </div>
            </div>
            <div class="input-box">
                <select class="input" name="payment" >
                    <option value="">-- Select method of payment --</option>
                    <option value="1">DAHABIA</option>
                    <option value="2">CB</option>
                    <option value="3">REDOTPAY</option>
                </select>
            </div>
            <div class="input-box">
                <div class="stars">
                    <?php for ($i = 5; $i >= 1; $i--): ?>
                        <div class="stars">
                            <?php for ($i = 5; $i >= 1; $i--): ?>
                                <input type="radio" id="star<?= $i ?>" name="rating" value="<?= $i ?>" <?= ($rating == $i) ? 'checked' : '' ?>>
                                <label for="star<?= $i ?>"><i class="fa-solid fa-star"></i></label>
                            <?php endfor; ?>
                        </div>
                        <p class="date_span">Rating:</p>
                    <?php endfor; ?>
                </div>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Book Now</button>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected'])) {
                $Fname = $_POST['Fname'];
                $Lname = $_POST['Lname'];
                $NumPhone = $_POST['NumPhone'];
                $dateFrom = $_POST['dateFrom'];
                $dateTo = $_POST['dateTo'];
                $room_id = $_POST['selected'];
                $rating = (int)$_POST['rating'];
                
                $date1 = new DateTime($dateFrom);
                $date2 = new DateTime($dateTo);
                $interval = $date1->diff($date2);
                $numDays = $interval->days; // Absolute number of days

                $sql = "SELECT room_price FROM rooms WHERE room_id = $room_id";
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                    $room = $result->fetch_assoc();
                    $roomPrice = $room['room_price'];
                    $totalPrice = $roomPrice * $numDays;
                } else {
                    echo "Error: Room not found.";
                    exit();
                }
                
                // Prepare and bind
                $stmt = $conn->prepare("INSERT INTO booking (user_id, room_id, Fname, Lname, NumPhone, dateFrom, dateTo, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("isssssss", $userId, $room_id, $Fname, $Lname, $NumPhone, $dateFrom, $dateTo, $totalPrice);
                $stmt->execute();
                if ($rating > 0 && $rating <= 5) {
                    $sql = "SELECT hotel_rate, ratings FROM hotels WHERE hotel_id = $hotelId";
                    $result = $conn->query($sql);
                    $hotelData = $result->fetch_assoc();
                    // Calculate new rating and ratings count
                    $new_rate = $hotelData['hotel_rate'] + $rating;
                    $new_ratings = $hotelData['ratings'] + 1;
                    
                    $sql = "UPDATE hotels SET hotel_rate = $new_rate, ratings = $new_ratings WHERE hotel_id = $hotelId";
                    if ($conn->query($sql) === false) {
                        echo "Error updating rating: " . $conn->error;
                    }
                }
                exit();
                $stmt->close();
            }
        ?>

</div>
    <script src="../../js/user/service.js"></script>
</body>
</html>
