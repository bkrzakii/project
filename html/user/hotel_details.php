<?php
$conn = new mysqli("localhost", "zakii", "bkrbkrbkr", "cc");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
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
            <div class="logo">LOGO</div>
            <nav>
                <ul>
                    <li id="1"><a href="home.php">Home</a></li>
                    <li id="2"><a href="#" class="active">Hotels</a></li>
                    <li id="3"><a href="about.php">About</a></li>
                    <li id="4"><a href="contact.php">Contact</a></li>
                    <li id="Dashboard-link" style=" display: none;"><a href="../business/dashboard/Statistics.php">Dashboard</a></li>
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
                    <a class="business" id="Business" href="#">switch to business account</a>
                    <a href="../SignUp_LogIn_Form.php" class="logout">Logout</a>
                </div>
            </div>
        </header>
    </div>

    <div class="container">
      
      <?php
      $id = $_GET['id'];
      if (!isset($_GET['id'])) {
        die("No rooms IDs provided.");
      }
      $sql = "SELECT 
              hotel_info.hotel_name,
              hotel_info.hotel_email,
              hotel_info.hotel_phoneNbr,
              hotel_info.hotel_address,
              hotel_info.hotel_description,
              hotel_info.hotel_rate,
              hotel_info.features,
              hotel_info.rooms,
              hotel_image.image_path
          FROM hotel_info 
          JOIN hotel_image ON hotel_image.hotel_id = hotel_info.id
          WHERE hotel_info.id = $id";
      $result = $conn->query($sql);

      if($result && $result->num_rows >0):
          $value = $result->fetch_assoc();?>
          <h1><?php echo htmlspecialchars($value['hotel_name']); ?></h1>
          <img class="hotel_img" src="../../pics/<?php echo htmlspecialchars($value['image_path'])?>" alt="<?php echo htmlspecialchars($value['hotel_name']); ?>">
          <h2>More Inforemation</h2>
          <h4 style="display: inline;">description : &nbsp;</h4>
          <span class="hotel_info"><?php echo htmlspecialchars($value['hotel_description'])?> </span><br>
          <h4 style="display: inline;">Address : &nbsp;</h4>
          <span class="hotel_info"><?php echo htmlspecialchars($value['hotel_address']);?></span><br>
          <h4 style="display: inline;">Email : &nbsp;</h4>
          <span class="hotel_info"><a href="<?php echo htmlspecialchars($value['hotel_email']);?>"><?php echo htmlspecialchars($value['hotel_email']);?></a></span><br>
          <h4 style="display: inline;">Phone Number: &nbsp;</h4>
          <span class="hotel_info"><?php echo htmlspecialchars($value['hotel_phoneNbr']); ?></span><br>
          <h4 style="display: inline;">Guest Reviews :&nbsp;&nbsp;</h4>
          <?php 
          for ($i = 1; $i <= 5; $i++) {
              if ($i <= $value['hotel_rate']) {
                  echo '<i class="fa-solid fa-star" style="color: gold; font-size: 20px;"></i>';
              } else {
                  echo '<i class="fa-regular fa-star" style="color: gold; font-size: 20px;"></i>';
              }
          }
          endif?>
          <span class="hotel_info">&nbsp;(<?php echo htmlspecialchars($value['hotel_rate'])?>/5)</span>



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

            <?php
        // Fetch room details based on the hotel ID passed in the URL
        $roomIDs = explode(',', $_GET['id']);
        $roomIDs = array_filter($roomIDs, 'is_numeric');
        
        if (empty($roomIDs)) {
            die("No valid rooms IDs provided.");
        }
        
        $placeholders = implode(',', array_fill(0, count($roomIDs), '?'));
        
        $sql = "SELECT 
                    room_info.room_type,
                    room_info.room_capacity,
                    room_info.room_price,
                    room_info.amenities
                FROM room_info 
                WHERE room_info.hotel_id IN ($placeholders)";
        
        $stmt = $conn->prepare($sql);
        $types = str_repeat('i', count($roomIDs));
        $stmt->bind_param($types, ...$roomIDs);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result && $result->num_rows > 0) {
            // Fetch and display room details
            while ($room = $result->fetch_assoc()) :?>
                <tr>
                <th><p> <?php echo htmlspecialchars($room['room_type']) ?> </p></th>
                <th><p> <?php echo htmlspecialchars($room['room_capacity']) ?> </p></th>
                <th><p> <?php echo htmlspecialchars($room['room_price']) ?> </p></th>
                <?php
              // Display amenities
              $amenityIDs = explode(',', $room['amenities']);
              $amenityIDs = array_filter($amenityIDs, 'is_numeric');
                $amenityIDs = array_map('intval', $amenityIDs);
                if (!empty($amenityIDs)) {
                    $amenityPlaceholders = implode(',', array_fill(0, count($amenityIDs), '?'));
                    $amenitySql = "SELECT amenity FROM amenities WHERE id IN ($amenityPlaceholders)";
                    $amenityStmt = $conn->prepare($amenitySql);
                    $amenityTypes = str_repeat('i', count($amenityIDs));
                    $amenityStmt->bind_param($amenityTypes, ...$amenityIDs);
                    $amenityStmt->execute();
                    $amenityResult = $amenityStmt->get_result();
                    $amenityNames = [];
                    while ($amenityRow = $amenityResult->fetch_assoc()) {
                      $amenityNames[] = htmlspecialchars($amenityRow['amenity']);
                    }
                    echo "<th><p> " . implode(',&nbsp;&nbsp;&nbsp;', $amenityNames) . "</p></th>";
                } else {
                  echo "<th><p>None listed</p></th>";
                }?>
                <th><label class="checkbox">
                  <input type="radio" name="selected" value="0" style="display: none">
                  <i class="fa-solid fa-circle-check"></i>
                  <i class="fa-regular fa-circle-check"></i>
                </label></th>
                </tr>
            <?php endwhile;
        } else { echo "No rooms found for the selected hotel(s)."; }
              
              ?>
              </tbody>
              </table>


        <h2>Hotel Featues</h2>

        <div class="featuresContainer">
            <div class="features-group">
                <?php
                $featureIDs = explode(',', $value['features']);
                $featureIDs = array_filter($featureIDs, 'is_numeric');
                $featureIDs = array_map('intval', $featureIDs);
                if (!empty($featureIDs)) {
                    $featurePlaceholders = implode(',', array_fill(0, count($featureIDs), '?'));
                    $featureSql = "SELECT feature FROM features WHERE id IN ($featurePlaceholders)";
                    $featureStmt = $conn->prepare($featureSql);
                    $featureTypes = str_repeat('i', count($featureIDs));
                    $featureStmt->bind_param($featureTypes, ...$featureIDs);
                    $featureStmt->execute();
                    $featureResult = $featureStmt->get_result();
                    while ($featureRow = $featureResult->fetch_assoc()): ?>
                        <label class='feature'>
                          <span class='label-text'> <?php echo htmlspecialchars($featureRow['feature']) ?></span>
                        </label>
                    <?php endwhile;
                } else {
                    echo "<p>No features listed</p>";
                }
                ?>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="#" class="btn">Book Now</a>
        </div>
    </div>
    <script src="../../js/user/service.js"></script>
</body>
</html>
