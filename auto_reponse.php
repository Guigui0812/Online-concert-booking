<?php

// Inclusion du fichier de paramétrage
require ( 'parametres.php' );

// Permet de voir les valeurs que l'on reçoit du kit de paiement
echo '<pre>';
var_dump( $_REQUEST );
echo '</pre>';

?>