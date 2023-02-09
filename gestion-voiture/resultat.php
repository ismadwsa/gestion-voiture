<?php 
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}
 require 'header.php'; 

 ?>

<div class="table-responsive mt-3">
    <table class="table table-striped table-hover">
        <tbody>
        <tr >  
                        <td><strong>Date</strong></td>
                        <td><strong>Nom </strong></td>
                        <td><strong>Voiture</strong></td>
                        <td><strong>Heur de Départ</strong></td>
                        <td><strong>Heur de retour</strong></td>
                        <td><strong>Motif</strong></td>
        </tr>
<?php
            require 'config.php';
            $rech=$_POST['recherche'];
            echo'<h3>Recherche du : ' .$rech.'<h3>';
            $sql = 'SELECT * FROM sortie WHERE date LIKE "%'.$rech.'%" ';
            $req = $conn->query($sql);

            while ($donnees = $req->fetch()) {
                $id_news = $donnees['id_news'];
                $nom = $donnees['nom'];
                $voiture = $donnees['voiture'];
                $date = $donnees['date'];
                $depart = $donnees['depart'];
                $retour = $donnees['retour'];
$motif = $donnees['motif'];
          ?>
                <tr>
                    <td> <?php echo $date; ?></td>
                    <td> <?php echo $nom; ?></td>
                    <td> <?php echo $voiture; ?></td>
                    <td> <?php echo $depart; ?></td>
                    <td> <?php echo $retour; ?></td>
                    <td> <?php echo $motif; ?></td>
                </tr>
            <?php
            }
            $conn = null;
            ?>
        </tbody>
    </table>
</div>
<?php require 'footer.php'; ?>