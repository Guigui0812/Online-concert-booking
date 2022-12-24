<?php 
     
    require ( '../parametres.php' );

    $reservationQuery = '
            SELECT commande.id AS commandeId, contact.nom AS nom,contact.prenom AS prenom, commande.statut_id AS statutId,contact.email AS email,commande.date_commande AS date                
            FROM commande 
            LEFT JOIN contact 
            ON contact.id = commande.contact_id';

    $prep = $pdo->prepare($reservationQuery);
        $prep->execute();
        $liste = $prep->fetchAll();
        $delimiter=";";

        $filename = '../csv/commandes.csv';

        // open csv file for writing
        $f = fopen($filename, 'w+');

        if ($f === false) {
            echo "T'as échoué";
        }

        foreach ($liste as $line) { 
            fputcsv($f, $line, $delimiter); 
        }
        

        echo 'Fichier généré, il se trouve dans le répertoire csv du serveur.';
        fclose($f);
?>