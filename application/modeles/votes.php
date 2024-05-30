<?php
function obtenirVote($photo, $utilisateur){
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
        
    // Requête SQL pour obtenir les photos, triées par date
    $sql = "SELECT * FROM vote WHERE photo_vote=$photo AND utilisateur_vote='$utilisateur';";
    
    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();
    
    // Récupération des résultats sous forme de tableau associatif
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourner les résultats
    if(count($results) > 0){
        return $results[0]["valeur_vote"];
    } else {
        return null;
    }
}

function obtenirNotePhoto($id_photo){
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
    
    // Requête SQL pour obtenir les photos, triées par date
    $sql = "SELECT AVG(valeur_vote) FROM vote WHERE photo_vote='$id_photo';";
    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();
    
    // Récupération des résultats sous forme de tableau associatif
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourner les résultats
    $moy=$results[0]["AVG(valeur_vote)"];
    if($moy!=""){
        return substr($moy, 0, 3);
    } else {
        return "0";
    }
    
}


//ajout d'un vote dans la base de données

function ajoutVoteBDD($id_photo, $evaluateur, $note) {

    $dbh = connect();

    // si une note est déjà présente pour ce couple photo/utilisateur

    // on commence par l'effacer

    if (obtenirVote($id_photo, $evaluateur) != null) {
        // Requête SQL pour obtenir les photos, triées par date
        $sql2 = "DELETE FROM vote WHERE photo_vote = $id_photo AND utilisateur_vote = '$evaluateur';";
        
        // Préparation et exécution de la requête
        $sth2 = $dbh->prepare($sql2);
        $sth2->execute();
    }

    // Requête SQL pour obtenir les photos, triées par date
    $sql = "INSERT INTO vote (photo_vote, utilisateur_vote, valeur_vote) VALUES ($id_photo, '$evaluateur', $note);";
    
    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();
}

?>