<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire avec reCAPTCHA</title>
  <link rel="stylesheet" href="style.css">
  <!-- Script Google reCAPTCHA -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
  <div class="container">
    <h1>Formulaire sécurisé</h1>
    <p>
      <?php 
      if (isset($_SESSION["error"])) {
        echo "<p style='color:red;'>".$_SESSION['error']."</p>";
        unset( $_SESSION['error']);

      }elseif (isset($_SESSION["suces"])) {
        echo "<p style='color:green;'>".$_SESSION['suces']."</p>";
        unset( $_SESSION['suces']);
      }
      
      ?>
    </p>
    <form action="validate.php" method="POST">
      <label for="username">Nom d'utilisateur :</label>
      <input type="text" id="username" name="username" placeholder="Entrez votre nom" required>
      
      <label for="email">Email :</label>
      <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
      
      <!-- Section reCAPTCHA -->
      <div class="g-recaptcha" data-sitekey="VOTRE_SITE_KEY"></div>
      
      <button type="submit">Soumettre</button>
    </form>
  </div>
</body>
</html>
