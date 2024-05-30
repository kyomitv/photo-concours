<?php

function obtenirConcoursUtilisateur($utilisateur){
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
        
    // Requête SQL pour obtenir les photos, triées par date
    $sql = "SELECT * FROM concours WHERE utilisateur_concours='$utilisateur';";
    
    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();
    
    // Récupération des résultats sous forme de tableau associatif
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourner les résultats
    return $results;
}

function obtenirConcoursID($id){
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
        
    // Requête SQL pour obtenir les photos, triées par date
    $sql = "SELECT * FROM concours WHERE id_concours=$id;";
    
    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();
    
    // Récupération des résultats sous forme de tableau associatif
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourner les résultats
    return $results[0];
}

function obtenirConcours(){
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
        
    // Requête SQL pour obtenir les photos, triées par date
    $sql = "SELECT * FROM concours ORDER BY dateFin_concours DESC;";
    
    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();
    
    // Récupération des résultats sous forme de tableau associatif
    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourner les résultats
    return $results;
}

function creerConcours($titre,$desc,$theme,$dateDebut,$dateFin,$createur){
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
    
    $dateDebut = date("Y-m-d H:i:s", strtotime($dateDebut));
    $dateFin = date("Y-m-d H:i:s", strtotime($dateFin));

    // Requête SQL pour obtenir les photos, triées par date
    $sql = "INSERT INTO concours(titre_concours,theme_concours,desc_concours,dateDebut_concours,dateFin_concours,utilisateur_concours) VALUES('$titre', '$theme', '$desc', '$dateDebut', '$dateFin', '$createur');";
    
    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();

    return true;
}


function DescSort($val1,$val2)
{
  #check if both the values are equal
    if ($val1['vote'] == $val2['vote']) return 0;
  #check if not equal, then compare values
    return ($val1['vote'] < $val2['vote']) ? 1 : -1;
}


function obtenirClassement($listePhotos){
    foreach($listePhotos as $id=>$photo){
        $vote = floatval(obtenirNotePhoto($photo["id_photo"]));
        $listePhotos[$id]["vote"]=$vote;
    }

    usort($listePhotos,'DescSort');
    return $listePhotos;
}
?>