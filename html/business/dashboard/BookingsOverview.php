<?php
// Connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = $_GET['id'];
$hotelId = $_GET['hotelId'] ?? null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status']) && isset($_POST['booking_id'])) {
  $newStatus = $_POST['status'];
  $bookingId = (int) $_POST['booking_id'];
  $stmt = $conn->prepare("UPDATE booking SET booking_status = ? WHERE id = ?");
  $stmt->bind_param("si", $newStatus, $bookingId);
  $stmt->execute();
  $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bookings Overview - BookingDZ</title>
  <link rel="stylesheet" href="../../../css/business/dashboard/BookingsOverview.css"/>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
  <header>
    <div class="logo">BookingDZ</div>
    <nav>
      <ul>
        <li><a href="../../user/home.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Home</a></li>
        <li><a href="../../user/service.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Hotels</a></li>
        <li><a href="../../user/about.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">About</a></li>
        <li><a href="../../user/contact.php?id=<?php echo $userId; ?>&hotelId=<?php echo $hotelId?>">Contact</a></li>
        <li><a href="#" class="active">Dashboard</a></li>
      </ul>
    </nav>
    <div class="profile">
      <button class="profile-icon" onclick="toggleDescription()">
        <i class='bx bxs-user-circle'></i>
      </button>
      <div class="user-info" id="user-info">
        <img class="user-img" src="../../../pics/admin.jpg" alt="User">
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
          <i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Statistics</a></li>
        <li><a href="#" class="active"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;Bookings Overview</a></li>
      </ul>
    </div>

    <div class="content">
      <h3><i class="fas fa-calendar-check"></i> Bookings Overview</h3>
      <div class="table">
        <table border="1" cellpadding="10">
          <thead>
            <tr>
              <th>RoomNum</th>
              <th>F.Name</th>
              <th>L.Name</th>
              <th>Room_Type</th>
              <th>Date_IN</th>
              <th>Date_OUT</th>
              <th>Price</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              // Query updated based on actual column names
              $sql = "SELECT 
              booking.id,
              booking.NumRoom,
              booking.Fname,
              booking.Lname,
              room_info.room_type AS room_type,
              booking.dateFrom,
              booking.dateTo,
              booking.total_price,
              booking.booking_status
              FROM booking
              LEFT JOIN room_info ON booking.NumRoom = room_info.id
              WHERE booking.hotel_id = $hotelId";

              $result = $conn->query($sql);
              if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                    <td>{$row['NumRoom']}</td>
                    <td>{$row['Fname']}</td>
                    <td>{$row['Lname']}</td>
                    <td>{$row['room_type']}</td>
                    <td>{$row['dateFrom']}</td>
                    <td>{$row['dateTo']}</td>
                    <td>{$row['total_price']}</td> 
                    <td>";
                    if ($row['booking_status'] == 'pending') {
                      echo "<i class=\"fa-solid fa-arrows-rotate\"></i>&nbsp;&nbsp;{$row['booking_status']}";
                    } elseif ($row['booking_status'] == 'accepted') {
                      echo "<i class=\"fa-solid fa-circle-check\"></i>&nbsp;&nbsp;{$row['booking_status']}";
                    } elseif ($row['booking_status'] == 'refused') {
                      echo "<i class=\"fa-solid fa-circle-xmark\"></i>&nbsp;&nbsp;{$row['booking_status']}";
                    }?>
                    </td>
                    <td>
                      <i class="fa-solid fa-pen-to-square" onclick="this.nextElementSibling.style.display='block'; this.style.display='none';"></i>
                      <form method='POST' style="display: none;">
                      <input type='hidden' name='booking_id' value="<?php echo $row['id']; ?>">
                        <select name='status'>
                          <option value='pending' >Pending</option>
                          <option value='accepted' >Accepted</option>
                          <option value='refused'>Refused</option>
                        </select>
                        <button type='submit'><i class="fa-solid fa-check"></i></button>
                      </form>
                    </td>
                  </tr>
                <?php }
              } else {
                echo "<tr><td colspan='8'>No bookings found</td></tr>";
              }
              $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <script src="../../../js/business/dashboard/BookingsOverview.js" defer></script>
</body>
</html>
