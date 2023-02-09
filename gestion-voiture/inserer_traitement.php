<?php // Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}
require 'header.php'; ?>

<?php
/*
Contrôle des saisies de l'utilisateurs
Si les champs de saisie sont différent de vide DONC rempli

*/
if (!empty($_POST)) {

    // On déclare un tableau d'erreur (vide)
    $errors = [];

    // On stocke les informations saisie par l'utilisateur dans des variables
    $nom = $_POST['nom'];
    $voiture = $_POST['voiture'];
    $date = $_POST['date'];
    $depart = $_POST['depart'];
    $retour = $_POST['retour'];
$motif = $_POST['motif'];
    // Vérification des valeurs de saisie par l'utilisateur
  
    // Si le tableau d'erreur est vide
    if (empty($errors)) {
        // Appelez le script de connexion à la base de donnée
        require_once 'config.php';

        // Stockage de la requête SQL dans une variable
        $sql = 'INSERT INTO sortie (nom, voiture, date, depart, retour ,motif ) VALUES (:nom, :voiture, :date, :depart, :retour , :motif)';
        $req = $conn->prepare($sql);
        $req->execute([
            'nom' => $nom,
            'voiture' => $voiture,
            'date' => $date,
            'depart' => $depart,
            'retour' => $retour,
            'motif' => $motif,
        ]);
        // Fermeture de la connexion à la base de donnée
        $conn = null;

        echo '<h2>Récapitulatif</h2>
        <ul>
            <li>Nom : <strong>' . $nom . '</strong></li>
            <li>Voiture : <strong>' . $voiture . '</strong></li>
            <li>Date : <strong>' . $date . '</strong></li>
            <li>Heur de départ : <strong>' . $depart . '</strong></li>
            <li>Heur de retour : <strong>' . $retour . '</strong></li>
<li>Motif : <strong>' . $motif . '</strong></li>
        </ul>
        <div class="alert alert-success" role="alert">
            Vos informations ont été enregistré avec succès ! <a href="accueil.php" class="btn btn-danger btn-sm">Accéder à la page d\'accueil</a>
        </div>
        ';
    } elseif (!empty($errors)) {
        echo '<div class="alert alert-danger">
        <p><strong> Vous n\'avez pas rempli la news correctement</strong></p>
        <ul>';
        // Boucle foreach pour parcourir les différentes erreurs récoltés lors de la vérification
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul></div>';
    }
}
?>

<?php require 'footer.php'; ?>