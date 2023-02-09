<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}
 require 'header.php'; ?>

<?php if ($_POST) {

    $errors = [];

    $id_news = htmlspecialchars($_POST['id_news']);
    $nom = htmlspecialchars($_POST['nom']);
    $voiture = htmlspecialchars($_POST['voiture']); 
    $date = htmlspecialchars($_POST['date']);
    $depart = htmlspecialchars($_POST['depart']);
    $retour = htmlspecialchars($_POST['retour']);
 $motif = htmlspecialchars($_POST['motif']);

  

    if (empty($errors)) {
        require 'config.php';
        $sql = "UPDATE sortie SET nom = :nom, voiture = :voiture, date = :date, depart = :depart, retour = :retour WHERE id_news = :id_news";
        $req = $conn->prepare($sql);
        $req->execute([
            'id_news' => $id_news,
            'nom' => $nom,
            'voiture' => $voiture,
            'date'=>$date,
            'depart' => $depart,
            'retour' => $retour,

            'motif' => $motif,
        ]);
        $conn = null;
        
        echo '
    <div class="alert alert-success" role="alert">
        Vos changement ont été enregistré avec succès ! <a href="accueil.php" class="alert-link">Accéder à la page d\'daccueil</a>
    </div>';
    } elseif (!empty($errors)) { // SINON SI le tableau d'erreur est rempli (donc si il y a des erreurs)
        echo '<div class="alert alert-danger"> <p><strong>Vous n\'avez pas rempli la news correctement</strong></p> <ul>';
        // Boucle foreach pour parcourir les différentes erreurs récolté lors de la vérification
        foreach ($errors as $error) {
            echo '<li> ' . $error . '</li>';
        }
        echo '</ul> </div>';
    }
}
?>
<?php require 'footer.php'; ?>