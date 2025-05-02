<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=hotel_db", "root", ""); // Replace creds

$userId = '8';
$hotelId = '38';

// Handle rating
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = intval($_POST['rating']);

    // Insert or update user rating
    $stmt = $pdo->prepare("SELECT * FROM hotel_info WHERE hotel_owner = ? AND id = ?");
    $stmt->execute([$userId, $hotelId]);

    if ($stmt->rowCount()) {
        $stmt = $pdo->prepare("UPDATE hotel_info SET hotel_rate = ? WHERE hotel_owner = ? AND id = ?");
        $stmt->execute([$rating, $userId, $hotelId]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO hotel_info (hotel_owner, id, hotel_rate) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $hotelId, $rating]);
    }

    // Update average in hotel_info
    $avgStmt = $pdo->prepare("SELECT AVG(hotel_rate) as avg FROM hotel_info WHERE id = ?");
    $avgStmt->execute([$hotelId]);
    $avg = round($avgStmt->fetch()['avg'], 1);

    $updateHotel = $pdo->prepare("UPDATE hotel_info SET hotel_rate = ? WHERE id = ?");
    $updateHotel->execute([$avg, $hotelId]);
    exit;
}

// Fetch current rate
$stmt = $pdo->prepare("SELECT hotel_rate FROM hotel_info WHERE id = ?");
$stmt->execute([$hotelId]);
$currentRate = round($stmt->fetch()['hotel_rate'] ?? 0, 1);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Rate Hotel</title>
  <style>
    .star { font-size: 30px; color: gray; cursor: pointer; }
    .star.selected { color: gold; }
  </style>
</head>
<body>

<h2>Rate This Hotel</h2>
<form method="POST">
  <?php for ($i = 1; $i <= 5; $i++): ?>
    <button type="submit" name="rating" value="<?= $i ?>" style="background: none; border: none;">
      <span class="star <?= ($i <= $currentRate) ? 'selected' : '' ?>">★</span>
    </button>
  <?php endfor; ?>
</form>

<p>Average Rating: <?= $currentRate ?> / 5</p>

</body>
</html>
