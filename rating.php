<?php
// Connexion DB
$conn = new mysqli("localhost", "root", "", "hotel_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get images
$sql = "SELECT image_path FROM room_images";
$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!-- HTML -->
<div style="display: flex; flex-wrap: wrap; gap: 10px;">
  <?php while($row = $result->fetch_assoc()): ?>
    <div style="width: 150px; height: 150px; overflow: hidden;">
      <img src="<?= $row['image_path'] ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
  <?php endwhile; ?>
</div>