<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>service Page</title>
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
                    <li id="1"><a href="home.html">Home</a></li>
                    <li id="2"><a href="#" class="active">Service</a></li>
                    <li id="3"><a href="about.html">About</a></li>
                    <li id="4"><a href="contact.html">Contact</a></li>
                    <li id="Dashboard-link" style=" display: none;"><a href="../business/dashboard/Statistics.html">Dashboard</a></li>
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
                        <h3>my profile</h3>
                        <p>boukrouna zakaria</p>
                        <p>0540418730</p>
                        <p>zackstorm0404@gmail.com</p>
                    </div>
                    <a class="business" id="Business" href="#">switch to business account</a>
                    <a href="../SignUp_LogIn_Form.html" class="logout">Logout</a>
                </div>
            </div>
        </header>
    </div>
    <!-- Extra content to make the page scrollable -->
    <div class="hotels_list">
        <div class="hotel_card">
            <img src="../../pics/hotel1.jpg" alt="Hotel 1">
            <h3>Hotel Name 1</h3>
            <p>hotel_description</p>
            <p>Location: City, Country</p>
            <p>Rating: 4.5/5</p>
        </div>
        <div class="hotel_card">
            <img src="../../pics/hotel2.jpg" alt="Hotel 2">
            <h3>Hotel Name 2</h3>
            <p>hotel_description</p>
            <p>Location: City, Country</p>
            <p>Rating: 4.0/5</p>
        </div>
        <div class="hotel_card">
            <img src="../../pics/hotel3.jpg" alt="Hotel 3">
            <h3>Hotel Name 3</h3>
            <p>hotel_description</p>
            <p>Location: City, Country</p>
            <p>Rating: 4.8/5</p>
        </div>
        <div class="hotel_card">
            <img src="../../pics/hotel4.jpg" alt="Hotel 4">
            <h3>Hotel Name 4</h3>
            <p>hotel_description</p>
            <p>Location: City, Country</p>
            <p>Rating: 4.2/5</p>
        </div>
</div>
<script src="../../js/user/service.js"></script>
</body>
</html>