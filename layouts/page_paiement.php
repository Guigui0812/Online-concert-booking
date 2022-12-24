<?php

// Permet de voir les valeurs que l'on reçoit de la page de réservation
$mac = sha1("Caddieesiee". $_GET['commande_id'] . "esiee".$_GET['montant']."00esieehttp://grit.unilasalle.fr:9980/~rohee_g/index.php?page=page_accueilesieehttp://grit.unilasalle.fr:9980/~rohee_g/auto_reponse.php&statut=Ok&commande=".$_GET['commande_id']."esieehttp://grit.unilasalle.fr:9980/~rohee_g/index.php?page=page_finalisation&commande_id=".$_GET['commande_id']);

echo '<form action="http://grit.unilasalle.fr:9980/~favre/grit/concert/kit_paiement/paiement.php" method="post">
    <input type="hidden" name="caddie" value="Caddie" >
    <input type="hidden" name="commande" value="'.$_GET['commande_id'].'" >
    <input type="hidden" name="montant" value="'.$_GET['montant'].'00" >
    <input type="hidden" name="url_annuler" value="http://grit.unilasalle.fr:9980/~rohee_g/index.php?page=page_accueil">
    <input type="hidden" name="url_auto_reponse" value="http://grit.unilasalle.fr:9980/~rohee_g/auto_reponse.php&statut=Ok&commande='.$_GET['commande_id'].'">
    <input type="hidden" name="url_confirmer" value="http://grit.unilasalle.fr:9980/~rohee_g/index.php?page=page_finalisation&commande_id='.$_GET['commande_id'].'">
    <input type="hidden" name="mac" value="'. $mac .'" >
    <input type="submit" name=”btnSubmit” value="Payer">
    </form>';
?>