<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=tst", "root", "");
$item_id = 1;
$user_name = '';
$selected_rating = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_rating = (int)$_POST['rating'];

    if ($selected_rating > 0 && $selected_rating <= 5) {
        // Enregistrer le vote
        $pdo->prepare("INSERT INTO ratings (item_id, rating) VALUES (?, ?)")
            ->execute([$item_id, $selected_rating]);

        // Mise à jour des stats
        $stmt = $pdo->prepare("SELECT casa, ratings FROM items WHERE id = ?");
        $stmt->execute([$item_id]);
        $item = $stmt->fetch();

        $new_casa = $item['casa'] + $selected_rating;
        $new_ratings = $item['ratings'] + 1;

        $pdo->prepare("UPDATE items SET casa = ?, ratings = ? WHERE id = ?")
            ->execute([$new_casa, $new_ratings, $item_id]);
    }
}

// Récupérer la moyenne
$stmt = $pdo->prepare("SELECT name, casa, ratings FROM items WHERE id = ?");
$stmt->execute([$item_id]);
$item = $stmt->fetch();

$average = ($item['ratings'] > 0) ? ($item['casa'] / $item['ratings']) : 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Notation avec nom</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    .stars {
      display: flex;
      flex-direction: row-reverse;
      justify-content: flex-end;
      gap: 5px;
    }

    .stars input[type="radio"] {
      display: none;
    }

    .stars label {
      font-size: 28px;
      color: #ccc;
      cursor: pointer;
    }

    .stars input[type="radio"]:checked ~ label,
    .stars label:hover,
    .stars label:hover ~ label {
      color: gold;
    }

    .display-stars i {
      color: gold;
      font-size: 24px;
    }

    form {
      margin-top: 20px;
    }
  </style>
</head>
<body>

<h2><?= htmlspecialchars($item['name']) ?></h2>
<p>Note moyenne : <?= round($average, 2) ?> étoiles (<?= $item['ratings'] ?> votes)</p>

<div class="display-stars">
  <?php
  for ($i = 1; $i <= 5; $i++) {
      if ($i <= floor($average)) {
          echo '<i class="fa-solid fa-star"></i>';
      } elseif ($i - $average < 1) {
          echo '<i class="fa-solid fa-star-half-stroke"></i>';
      } else {
          echo '<i class="fa-regular fa-star"></i>';
      }
  }
  ?>
</div>

<form method="POST">

  <div class="stars">
    <?php for ($i = 5; $i >= 1; $i--): ?>
      <input type="radio" id="star<?= $i ?>" name="rating" value="<?= $i ?>" <?= ($selected_rating == $i) ? 'checked' : '' ?>>
      <label for="star<?= $i ?>"><i class="fa-solid fa-star"></i></label>
    <?php endfor; ?>
  </div>

  <button type="submit">Envoyer</button>
</form>

</body>
</html>
