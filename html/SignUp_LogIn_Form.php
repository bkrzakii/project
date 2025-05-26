<?php
$conn = new mysqli("localhost", "zakii", "bkrbkrbkr", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // LOGIN
$loginMessage = ""; // Pour afficher les erreurs dans le formulaire

if (isset($_POST['submit1'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT pswd, user_id, verification_image FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($hashedPasswordFromDB, $user_id, $verificationImage);
        $stmt->fetch();

        if (password_verify($password, $hashedPasswordFromDB)) {
            if (is_null($verificationImage)) {
                header("Location: ../html/user/home.php?id=" . $user_id);
                exit();
            } else {
                $sql = "SELECT hotel_id FROM hotels WHERE hotel_owner = $user_id";
                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                    $hotel = $result->fetch_assoc();
                    header("Location: ../html/business/dashboard/statistics.php?id=" . $user_id . "&hotelId=" . $hotel['hotel_id']);
                    exit();
                }
            }
        } else {
            $loginMessage = "Mot de passe incorrect.";
        }
    } else {
        $loginMessage = "Nom d’utilisateur non trouvé.";
    }

    $stmt->close();
}


    // REGISTRATION
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $checkEmail = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $checkEmail->store_result();

        if ($checkEmail->num_rows > 0) {
            echo "<script>alert('Cet email est déjà utilisé.');</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (username, email, pswd) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                echo "<script>alert('Inscription réussie ! Veuillez vous connecter.');</script>";
            } else {
                echo "<script>alert('Erreur lors de l'inscription.');</script>";
            }

            $stmt->close();
        }

        $checkEmail->close();
    }

    $conn->close();
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
        <!-- Login Form -->
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
                    <!-- Message d'erreur -->
                    <?php if (!empty($loginMessage)): ?>
                        <div class="login-error" style="color: purple; margin-top: 10px; fontweight: bold;">
                            <?php echo htmlspecialchars($loginMessage); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn" name="submit1">Login</button>
                
</
                <p>see our social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
        </div>

        <!-- Registration Form -->
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
                <button type="submit" name="submit" class="btn">Continue</button>
                <p>see our social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
        </div>

        <!-- Toggle box -->
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


