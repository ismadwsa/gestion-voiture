<?php 
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}
require 'header.php'; ?>

<h1>Cration d'une sortie de véhicule </h1>
<form action="inserer_traitement.php" method="post">

    <div class="mb-4">
        <label for="nom">Nom</label>
    <select id="nom" type="text" name="nom" value="" class="form-control" aria-label="Default select example">
									
									
									<option value="Alban">Alban</option>
                                    <option value="Angélique">Angélique</option>
                                    <option value="Mathieu">Mathieu</option>
                                    <option value="Cynthia">Cynthia</option>
                                    <option value="Nico">Nico</option>
    </select>
    </div>

    <div class="mb-4">
        <label for="voiture">Voiture</label>
        <select id="voiture" type="text" name="voiture" value="" class="form-control" aria-label="Default select example">
									

                                    <option value="Citroen c3">Citroen c3</option>
			                   <option value="Peugeot 206 aj-932-vl">Peugeot 206</option>
                                    <option value="Citroen c4">Citroen c4</option>
                                  
   </select> 
   </div>
    <div class="mb-4">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" placeholder="Date" name="date" required="required">
    </div>
    <div class="mb-4">
        <label for="heur-depart">Heur de départ</label>
        <input type="time" class="form-control" id="heur-depart" placeholder="Heur de départ" name="depart" required="required">
    </div>
    <div class="mb-4">
        <label for="heur-retour">Heur de retour</label>
        <input type="time" class="form-control" id="heur-retour" placeholder="Heur de retour" name="retour">
    </div>
    <div class="mb-4">
        <label for="motif">Motif</label>
        <input type="texte" class="form-control" id="motif" placeholder="Pourquoi prendre le véhicule ?" name="motif" required="required">
    </div>
    </div>
    <input type="submit" value="Envoyer" class="btn btn-danger">
</form>
<?php require 'footer.php'; ?>