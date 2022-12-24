<?php
    // Inclusion du fichier de paramétrage
  
    require ('parametres.php');

    // Problème avec le kit de paiement pour l'auto_response (signalé lors du dernier TP)
    // Nous avons fait autrement en faisant la modif dans le page finalisation (rep layout)

    $query = $pdo->prepare("UPDATE commande SET statut_id= ? WHERE id= 100");
    $query->execute(array(1));   
?>