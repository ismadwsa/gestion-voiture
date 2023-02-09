<?php 
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}
require 'header.php';

$id_news = htmlspecialchars($_GET['id']);

require 'config.php';
$sql = "SELECT * FROM sortie WHERE id_news='$id_news'";

$req = $conn->query($sql);

while ($donnees = $req->fetch()) {
    $id_news = $donnees['id_news'];
    $nom = $donnees['nom'];
    $voiture = $donnees['voiture'];
    $date = $donnees['date'];
    $depart = $donnees['depart'];
    $retour = $donnees['retour'];
 $motif = $donnees['motif'];


}
$conn = null; ?>

<h1>Création d'une entrée</h1>

<form action="maj_sortie_traitement.php" method="post">

    <div class="mb-4">
        <label for="inputTitle">Identifiant de la sortie</label>
        <input type="text" class="form-control" id="inputTitle" name="id_news" readonly value="<?php echo $id_news; ?>">
    </div>
    <div class="mb-4">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" readonly value="<?php echo $nom; ?>">
    </div>
    <div class="mb-4">
        <label for="voiture">Voiture</label>
        <input type="text" class="form-control" id="voiture" name="voiture" readonly value="<?php echo $voiture; ?>">
    </div>
    <div class="mb-4">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" readonly value="<?php echo $date; ?>">
    </div>
    <div class="mb-4">
        <label for="depart">Heur du départ</label>
        <input type="time" class="form-control" id="depart" name="depart" readonly value="<?php echo $depart; ?>">
    </div>
    <div class="mb-4">
        <label for="retour">Heur de retour</label>
        <input type="time" class="form-control" id="retour" name="retour" value="<?php echo $retour; ?>">
    </div>
       <div class="mb-4">
        <label for="motif">Motif</label>
        <input type="texte" class="form-control" id="motif" name="motif" readonly value="<?php echo $motif; ?>">
    </div>

    <input type="submit" value="Rajouter" class="btn btn-danger">

</form>

<?php
require 'footer.php';
?>


