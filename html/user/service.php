<?php

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
                        <?php /*
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
                        }*/
                        ?>
                    </div>
                    <a class="business" id="Business" href="#">switch to business account</a>
                    <a href="../SignUp_LogIn_Form.php" class="logout">Logout</a>
                </div>
            </div>
        </header>
    </div>
    <!-- Extra content to make the page scrollable -->
    <div class="hotels_list">
<<<<<<< HEAD
    <div class="hotel_card">
        <img src="../../pics/img5.jpeg" alt="Hotel 1">
        <div class="hotel_info">
            <h3>Hotel Name 1</h3>
            <p>hotel_description</p>
            <p>Location: City, Country</p>
            <p>Rating: 4.5/5</p>
        </div>
    </div>
</div>





<script src="../../js/user/service.js"></script>
=======
    <?php
        $sql = "SELECT 
                hotel_info.id,
                hotel_info.hotel_name,
                hotel_info.hotel_address,
                hotel_info.hotel_description,
                hotel_image.image_path,
                hotel_info.hotel_rate
            FROM hotel_info
            JOIN hotel_image ON hotel_image.hotel_id = hotel_info.id";
            $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            foreach ($result as $value) :?>
            <div class="hotel_card" onclick="window.location.href='../user/hotel_details.php?id=<?php echo $value['id']; ?>';" style="cursor:pointer;">
                <img class="hotel_img" src="../../pics/<?php echo htmlspecialchars($value['image_path']); ?>" alt="<?php echo htmlspecialchars($value['hotel_name']); ?>">
                <div class="hotel_info">
                    <h3><?php echo htmlspecialchars($value['hotel_name']); ?></h3>
                    <p><?php echo htmlspecialchars($value['hotel_description']); ?></p>
                    <p>Location: <?php echo htmlspecialchars($value['hotel_address']); ?></p>
                    <p>Rating: <?php echo htmlspecialchars($value['hotel_rate']); ?>/5</p>
                </div>
            </div>
            <?php endforeach;
        }
    ?>
    </div>
    <script src="../../js/user/service.js"></script>
>>>>>>> 311b1a1898c0ee65c7ac1f64cab5078dacb9565a
</body>
</html>