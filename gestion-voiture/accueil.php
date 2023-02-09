<?php 

// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}
 require 'header.php'; ?>
     <div class="float-right" >
         <a href="deconnexion.php" role="button" class="btn btn-danger float-right">Déconnexion</a>
         </div>
 <form action="resultat.php" method="post">  
            <h5 for="recherche">Recherche</h5>
        <div class="d-flex mb-6 col-6">
           <div class="mr-2">
           <input type="date" class="form-control" id="recherche" placeholder="../../.." name="recherche">
         </div>
         <div class="mr-2">
      <input type="submit" value="recherche" class=" btn btn-success mb-4">
      </div> 
         <div class="mr-2">
         <a href="inserer.php" role="button" class="btn btn-warning">Créer une sortie</a>
         </div>
    </div>
  
    
  </form>
<h1>Mes entrées</h1>


<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tbody>
        <tr>  
                        <td><strong>Date</strong></td>
                        <td><strong>Nom </strong></td>
                        <td><strong>Voiture</strong></td>
                        <td><strong>Heur de Départ</strong></td>
                        <td><strong>Heur de retour</strong></td>
                        <td><strong>Motif</strong></td>
                    </tr>
            <?php

            require 'config.php';

            $sql = 'SELECT * FROM sortie ORDER BY date DESC';
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
                    <td class="text-end"><a href="maj_sortie.php?id=<?php echo $id_news; ?>" class="btn btn-warning" role="button">Heur de retour</a></td>
                </tr>
            <?php
            }
            $conn = null;
            ?>
        </tbody>
    </table>
</div>





<?php require 'footer.php'; ?>