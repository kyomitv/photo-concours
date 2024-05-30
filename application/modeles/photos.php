<!-- A faire -->
<?php
    function obtenirPhotos($pseudo) {
        // Connexion à la base de données
        $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
        
        // Requête SQL pour obtenir les photos, triées par date
        if($pseudo){
            $sql = "SELECT * FROM photo WHERE auteur_photo='$pseudo' ORDER BY date_photo DESC;";
        }   else {
            $sql = "SELECT * FROM photo ORDER BY date_photo DESC;";
        }
        // Préparation et exécution de la requête
        $sth = $dbh->prepare($sql);
        $sth->execute();
        
        // Récupération des résultats sous forme de tableau associatif
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        // Retourner les résultats
        return $results;
    }


    function obtenirPhotosByID($id) {
        // Connexion à la base de données
        $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
        
        // Requête SQL pour obtenir les photos, triées par date
        $sql = "SELECT * FROM photo WHERE concours_photo=$id ORDER BY date_photo DESC;";
        // Préparation et exécution de la requête
        $sth = $dbh->prepare($sql);
        $sth->execute();
        
        // Récupération des résultats sous forme de tableau associatif
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        // Retourner les résultats
        return $results;
    }

    function importPhoto($auteur, $description, $titre, $nomTemporaire, $concours) {
        //on supprime les espaces dans le titre
        $titre_compact = str_replace(' ', '_', $titre);
        //idem pour le nom de l'auteur
        $auteur_compact = str_replace(' ','_',$auteur);
        // on stocke la photo en l'enregistrant sous le nom auteur+titre
        // seuls les fichiers jpeg sont acceptés
        $chemin = 'public/media/images/'.$auteur_compact."_".$titre_compact.'.jpg';
        //Date
        $datePhoto = date("Y-m-d H:i:s");

        //------------
        //Resize Image (max 800)
        //stockage
        move_uploaded_file($nomTemporaire, '../../'.$chemin);

        //--------------
        // on stocke à présent les données de l'image dans la BDD
        // Connexion à la base de données
        $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
        
        // Requête SQL pour obtenir les photos, triées par date
        $sql = "INSERT INTO photo(auteur_photo,chemin_photo,description_photo,date_photo,titre_photo,concours_photo) VALUES('$auteur','$chemin','$description','$datePhoto','$titre',$concours);";
        
        // Préparation et exécution de la requête
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return true;
    }

    function supprimerPhoto($id_photo, $pseudo){
        // Connexion à la base de données
        $dbh = connect(); // avant la fonction, il faut avoir fait un require pour pouvoir utiliser la fonction connect
        
        // Requête SQL pour obtenir les photos, triées par date
        $sql = "DELETE FROM photo WHERE id_photo = $id_photo AND auteur_photo = '$pseudo';";

        // Préparation et exécution de la requête
        $sth = $dbh->prepare($sql);
        $sth->execute();
    }
?>