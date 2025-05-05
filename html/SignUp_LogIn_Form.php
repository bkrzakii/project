<?php
$conn = new mysqli("localhost", "zakii", "bkrbkrbkr", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Form</title>
    <link rel="stylesheet" href="../css/SignUp_LogIn_Form.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container active"> 
        <div class="form-box login">
            <form method="POST">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" name="username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn" name="submit1">Login</button>
                <p>or login with social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"]== "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $stmt = $conn->prepare("SELECT pswd, id FROM bissness_users WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($hashedPasswordFromDB, $id);
                    $stmt->fetch();
            
                    if (password_verify($password, $hashedPasswordFromDB)) {
                        header("Location: ../html/user/home.php?id=" . $id);
                    } else {
                        echo " <script>alert('Error: Password incorrect or Username not found');</script>";
                    }
                    $stmt->close();
                    $conn->close();
                }
            }
            ?>
        </div>









        <div class="form-box register">
            <form method="POST">
                <h1>Registration</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" name="username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="Email" name="email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" name="submit" class="btn" >Continue</button>
                <p>or register with social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
            <?php
                if ($_SERVER["REQUEST_METHOD"]== "POST") {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO bissness_users (username, email, pswd) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $username, $email, $hashedPassword);
                    
                    if (!$stmt->execute()) {
                        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
                    }else {
                        echo "<script>alert('Registration successful!, Now LOGIN ');</script>";
                    }
                    $conn->close();
                }
                ?>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>

    <script src="../js/SignUp_LogIn_Form.js"></script>
</body>
</html>
