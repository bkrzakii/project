<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../../css/business/dashboard/BookingsOverview.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
        <header>
        <div class="logo">LOGO</div>
        <nav>
            <ul>
                <li id="1"><a href="../../user/home.html" >Home</a></li>
                <li id="2"><a href="../../user/service.html">Service</a></li>
                <li id="3"><a href="../../user/about.html">About</a></li>
                <li id="4"><a href="../../user/contact.html">Contact</a></li>
                <li id="Dashboard-link"><a href="#" class="active">Dashboard</a></li>
            </ul>
        </nav>
        <div class="profile">
            <button class="profile-icon" onclick="toggleDescription()">
                <i class='bx bxs-user-circle'></i>
            </button>
            <div class="user-info" id="user-info">
                <img class="user-img" src="/pics/admin.jpg" alt="">
                <div class="user-details">
                    <h3>my profile</h3>
                    <p>boukrouna zakaria</p>
                    <p>phone number</p>
                    <p>email</p>
                </div>
                <a class="business" href="../business/owner-info.html">switch to business account</a>
                <a href="../SignUp_LogIn_Form.html" class="logout">Logout</a>
            </div>
        </div>
        </header>
        <main class="main">
            <div class="sidebar">
                <ul>
                    <li><a href="../../business/dashboard/Statistics.html"><i class="fas fa-chart-pie"></i>  Statistics</a></li>
                    <li><a href="../../business/dashboard/RoomManagement.html"><i class="fas fa-bed"></i>  Room Management</a></li>
                    <li><a href="../../business/dashboard/BookingsOverview.html"class="active"><i class="fas fa-calendar-check"></i>  Bookings Overview</a></li>
                    <li><a href="../../business/dashboard/Messages&Feedback.html"><i class="fas fa-envelope"></i>  Messages & Feedback</a></li>
                </ul>
            </div>
            <div class="content">
                <h3><i class="fas fa-calendar-check"></i> Bookings Overview</h3>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th data-dt-column="0" aria-sort="ascending" aria-label="Roomnbr">
                                    <span class="dt-column-title" role="button">RoomNum</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th data-dt-column="1" aria-sort="ascending" aria-label="fName">
                                    <span class="dt-column-title" role="button">F.Name</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th data-dt-column="2" aria-sort="ascending" aria-label="lName">
                                    <span class="dt-column-title" role="button">L.Name</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th data-dt-column="3" aria-sort="ascending" aria-label="type">
                                    <span class="dt-column-title" role="button">type</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th data-dt-column="4" aria-sort="ascending" aria-label="dateFrom">
                                    <span class="dt-column-title" role="button">dateIN</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th data-dt-column="5" aria-sort="ascending" aria-label="dateTo">
                                    <span class="dt-column-title" role="button">dateOUT</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th data-dt-column="6" aria-sort="ascending" aria-label="payment">
                                    <span class="dt-column-title" role="button">Payment</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <th data-dt-column="7" aria-sort="ascending" aria-label="status">
                                    <span class="dt-column-title" role="button">Status</span>
                                    <span class="dt-column-order"></span>
                                </th>
                                <?php
$conn = new mysqli("localhost", "root", "", "hotel_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM hotel_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // Convert result to array
    $hotels = [];
    while($row = $result->fetch_assoc()) {
        $hotels[] = $row;
    }

    echo "<table border='1' cellpadding='10'>
        <tr>
            <th>ID</th>
            <th>Hotel Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Description</th>
            <th>Rooms</th>
            <th>Features (IDs)</th>
            <th>Rate</th>
        </tr>";

    // Now use foreach
    foreach($hotels as $row) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['hotel_name']}</td>
            <td>{$row['hotel_email']}</td>
            <td>{$row['hotel_phoneNbr']}</td>
            <td>{$row['hotel_address']}</td>
            <td>{$row['hotel_description']}</td>
            <td>{$row['rooms']}</td>
            <td>{$row['features']}</td>
            <td>{$row['hotel_rate']}</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

                            </tr>
                        </thead>
                        <tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </main>
    <!-- Extra content to make the page scrollable -->


</div>
<script src="../../../js/business/dashboard/BookingsOverview.js" defer></script>
</body>
</html>