<?php
session_start();

// Fermeture de la session
session_destroy();

// Redirection vers la page de connexion
header('Location: index.php');
exit;
?>