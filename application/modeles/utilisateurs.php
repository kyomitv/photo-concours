<?php
// fonction qui vérifie que la combinaison pseudo/mot de passe existe
function connexionOk($pseudo, $pw)
{
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
    
    // Requête SQL pour obtenir les photos, triées par date
    $sql = "SELECT * FROM utilisateur WHERE pseudo_utilisateur='$pseudo' AND mdp_utilisateur='$pw';";
    
    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();
    
    // Récupération des résultats sous forme de tableau associatif
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // A faire
    if (count($result)==0) {
        return false;
    }
    return true;
}


function inscriptionOk($pseudo, $mail){
    if(empty($pseudo) || empty($mail)){return false;}
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
    
    // Requête SQL pour obtenir les photos, triées par date
    $sql = "SELECT * FROM utilisateur WHERE pseudo_utilisateur='$pseudo' OR mail_utilisateur='$mail';";
    
    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();
    
    // Récupération des résultats sous forme de tableau associatif
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    // A faire
    if (count($result)==0) {
        return true;
    }
    return false;
}


function inscrireUtilisateur($pseudo,$mail,$mdp){
    // Connexion à la base de données
    $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
    
    // Requête SQL pour obtenir les photos, triées par date
    $sql = "INSERT INTO utilisateur(pseudo_utilisateur,mail_utilisateur,mdp_utilisateur) VALUES('$pseudo', '$mail', '$mdp');";
    
    // Préparation et exécution de la requête
    $sth = $dbh->prepare($sql);
    $sth->execute();
}

?>