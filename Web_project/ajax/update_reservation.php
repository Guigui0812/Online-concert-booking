<?php

    // On inclut le fichier avec tous les paramétres
    require '../parametres.php';

    // Permet de voir les valeurs que l'on reçoit de la page de réservation
    //var_dump( $_REQUEST['reservation'] );

    //Récupéartion des valeurs saisies par l'utilisateur dans une variable
    $reservationValues = $_REQUEST['reservation'];

    $query = $pdo->prepare("SELECT COUNT(email), id FROM contact WHERE email= ?");
    $query->execute(array($reservationValues['email']));   
    $queryRes = $query->fetchAll();
    $exists = $queryRes[0]['COUNT(email)'];
    $contactId = $queryRes[0]['id'];

    $checkGratos = false;
    $maxId = 0;

    // C'est ici qu'il faut mettre toutes les vérifications de données

    /* - - - - - Insertion BDD - - - - - */

    // Insertion des infos de l'utilisateur dans contact

    if($exists == 0){

        if(isset($reservationValues['nom'], $reservationValues['prenom'], $reservationValues['email'])){
            $query = $pdo->prepare('INSERT INTO contact(nom, prenom, email) VALUES (?,?,?)');
            $query->execute(array($reservationValues['nom'], $reservationValues['prenom'], $reservationValues['email']));    
            $maxId = $pdo->lastInsertId();
        }
        
    } else {
        
        if(isset($reservationValues['nom'], $reservationValues['prenom'], $reservationValues['email'])){
            $query = $pdo->prepare("SELECT id FROM contact WHERE email = ?");
            $query->execute(array($reservationValues['email']));    
            $queryRes = $query->fetchAll();
            $maxId = $queryRes[0]['id'];
        }
    }
    
    // Vérification du statut de la commande
    $flagFreOrd = 0;
    foreach($reservationValues['type_article'] as $id => $value){
        if($value > 0 && $id != 3){
            $flagFreOrd = 1;
        }
    }
 
    // Query en fonction de la gratuité ou non de la commande. 
    if($flagFreOrd != 0){
        $checkGratos = true;
        $newItem = $pdo->prepare('INSERT INTO commande(contact_id, statut_id, date_commande) VALUES (?,?,?)');
        $newItem->execute(array($maxId,0,date("Y-m-d h:i:s")));
    } else {
        $checkGratos = false;    
        $newItem = $pdo->prepare('INSERT INTO commande(contact_id, statut_id, date_commande) VALUES (?,?,?)');
        $newItem->execute(array($maxId,1,date("Y-m-d h:i:s")));
    }

    $maxId = $pdo->lastInsertId();

    foreach($reservationValues['type_article'] as $id => $value){
        $newItem = $pdo->prepare('INSERT INTO article (commande_id, type_article_id, quantite) VALUES (?,?,?)');
        $newItem->execute(array($maxId,$id,$value));
    }

    if(!$flagFreOrd){
        echo "index.php?page=page_finalisation&commande_id=" . $maxId;
    } else {

        $prix = 0;
        // Calculer le prix de la commande
        $query = "SELECT type_article.prix, article.quantite 
        FROM type_article, article 
        WHERE commande_id=". $maxId." AND type_article_id=type_article.id";
        $stmt = $pdo->query($query);

        foreach ( $stmt->fetchAll() as $article){
            $prix += $article['prix'] * $article['quantite'];
        }

        echo "index.php?page=page_paiement&commande_id=" . $maxId . "&montant=" . $prix;
    }

exit(0);

?>