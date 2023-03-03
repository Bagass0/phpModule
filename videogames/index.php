<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  include('./_inc/header.php');
  include('./_inc/nav.php');
  require_once './_inc/functions.php';

  $games = get_random_games(3);
?>
<?php

$error = getSessionFlashMessage('error');

// Afficher les messages d'erreur s'il y en a
if ($error) {
    echo '<div class="alert alert-danger">' . $error . '</div>';
}
?>

<!-- Contenu de la page -->
<div class="container">
<?php
  $message = getSessionFlashMessage('notice');
  if ($message !== null) {
    echo "<div class='notice'><h1 class='text-danger'>$message</h1></div>";
  }
  ?>

<h1>Bienvenue sur notre site web !</h1>
  <p>Bienvenue sur notre site de vente de jeux vidéos ! Nous sommes ravis de vous accueillir dans notre univers dédié aux jeux vidéos, où vous pourrez découvrir une large sélection de jeux pour toutes les consoles et plateformes. Que vous soyez un joueur débutant ou un joueur confirmé, nous avons ce qu'il vous faut pour vous divertir et vous amuser pendant des heures. Notre site est conçu pour vous offrir une expérience de shopping en ligne agréable et facile, avec des descriptions détaillées, des avis d'utilisateurs et des recommandations personnalisées pour vous aider à trouver le jeu parfait. Alors, n'hésitez plus et plongez dans notre sélection de jeux vidéos pour vivre des aventures incroyables !</p>

  


<div class="game-list">
    <?php foreach ($games as $game): ?>
      <div class="game">
        <h2><?= $game['title'] ?></h2>
        <img src="<?= $game['poster'] ?>" alt="<?= $game['title'] ?>" width="300" height="400">
        <p>Prix: <?= $game['price'] ?> €</p>
        <a href="game.php?id=<?= $game['id'] ?>">Consulter</a>
      </div>
    <?php endforeach ?>
</div>
</div>
<?php
  include('./_inc/footer.php');
?>
