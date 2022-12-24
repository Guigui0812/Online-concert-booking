<?php

// Comme l'auto-response du script de paiement ne fonctionne pas, j'ai utilisé une méthode Get pour récupérer l'id de la commande?

$query = $pdo->prepare("UPDATE commande SET statut_id= ?, date_reglement = ? WHERE id= ?");
$query->execute(array(1, date("Y-m-d h:i:s"), $_GET['commande_id']));   

echo '<a href="http://grit.unilasalle.fr:9980/~favre/grit/concert/billet/'.$_GET['commande_id']."> Lien de votre billet</a>";

?>