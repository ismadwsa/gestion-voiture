<?php

// Démarrage de la session
session_start();

// Traitement du formulaire de connexion
if(isset($_POST['submit'])) {
  
  // Récupération des données du formulaire
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // Vérification des informations d'identification avec les données stockées
  if ($username == "admin" && $password == "toto") {
    
    // Enregistrement de l'utilisateur en tant qu'utilisateur connecté
    $_SESSION['logged_in'] = true;
    
    // Redirection vers la page protégée
    header("Location: accueil.php");
    exit;
  }
  
  // Message d'erreur en cas d'informations d'identification incorrectes
  else {
    $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Login</title>
</head>
<body>
<main>
    <form action="" method="post">
        <h1>Connexion</h1>
        <div>
            <label for="username">Identifiant:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password">
        </div>
        <section>
            <button type="submit" name="submit" class="btn btn-primary" >Connexion</button>
           
        </section>
    </form>
</main>
</body>
</html>
  <!-- Message d'erreur -->
  <?php if (isset($error_message)) { echo $error_message; } ?>
  
</body>
</html>