<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Treservi</title>
    <link rel="stylesheet" href="../../css/business/owner-info.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <main>
    <div class="container">
        <h2>Personal iIformation</h2>
        <p>You have to feel the form below :</p>
        <form class="mb" action="hotel-info.php" method="get">
            <div class="input-box">
                <input type="text" class="input" placeholder="Your Name" name="Name" required>
            </div>
            <div class="input-box">
                <input type="email" class="input" placeholder="Your Email" name="Email" required>
            </div>
            <div class="input-box">
                <input type="text" class="input" placeholder="Phone number"  name="Phone" required pattern="[0-9]{10}"> 
            </div>
            <div class="input-box">
                <label for="file-upload" id="file-name">Upload business verification document</label>
                <input  type="file" id="file-upload" class="input-file" name="Image" multiple required>
                <div id="file-error" class="error-msg"></div>
            </div>
            <button type="submit" class="btn btn-primary">Continue</button>
        </form>
    </main>
    
    <script src="../../js/business/owner-info.js"></script>
</body>
</html>