<?php
// Connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "hotel_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query updated based on actual column names
$sql = "SELECT 
            booking.NumRoom,
            booking.Fname,
            booking.Lname,
            room_info.room_type AS room_type,
            booking.dateFrom,
            booking.dateTo,
            room_info.room_price AS payment_method,
            room_info.matching_rooms AS room_status
        FROM booking
        LEFT JOIN room_info ON booking.NumRoom = room_info.id";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bookings Overview</title>
  <link rel="stylesheet" href="../../../css/business/dashboard/BookingsOverview.css"/>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
  <header>
    <div class="logo">LOGO</div>
    <nav>
      <ul>
        <li><a href="../../user/home.html">Home</a></li>
        <li><a href="../../user/service.html">Service</a></li>
        <li><a href="../../user/about.html">About</a></li>
        <li><a href="../../user/contact.html">Contact</a></li>
        <li><a href="#" class="active">Dashboard</a></li>
      </ul>
    </nav>
    <div class="profile">
      <button class="profile-icon" onclick="toggleDescription()">
        <i class='bx bxs-user-circle'></i>
      </button>
      <div class="user-info" id="user-info">
        <img class="user-img" src="/pics/admin.jpg" alt="User">
        <div class="user-details">
          <h3>My Profile</h3>
          <p>boukrouna zakaria</p>
          <p>phone number</p>
          <p>email</p>
        </div>
        <a class="business" href="../business/owner-info.html">Switch to Business Account</a>
        <a href="../SignUp_LogIn_Form.html" class="logout">Logout</a>
      </div>
    </div>
  </header>

  <main class="main">
    <div class="sidebar">
      <ul>
        <li><a href="../../business/dashboard/Statistics.html"><i class="fas fa-chart-pie"></i> Statistics</a></li>
        <li><a href="../../business/dashboard/RoomManagement.html"><i class="fas fa-bed"></i> Room Management</a></li>
        <li><a href="#" class="active"><i class="fas fa-calendar-check"></i> Bookings Overview</a></li>
        <li><a href="../../business/dashboard/Messages&Feedback.html"><i class="fas fa-envelope"></i> Messages & Feedback</a></li>
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
            </tr>
          </thead>
          <tbody>
            <?php
              if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                    <td>{$row['NumRoom']}</td>
                    <td>{$row['Fname']}</td>
                    <td>{$row['Lname']}</td>
                    <td>{$row['room_type']}</td>
                    <td>{$row['dateFrom']}</td>
                    <td>{$row['dateTo']}</td>
                    <td>{$row['payment_method']}</td>
                    <td>{$row['room_status']}</td>
                  </tr>";
                }
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
