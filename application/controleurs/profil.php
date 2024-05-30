<?php
    session_start();
    require('../modeles/connect.php');
    require('../modeles/photos.php');
    require('../modeles/concours.php');
    require('../modeles/votes.php');

    

    if(!isset($_SESSION["pseudo"])){
        header('Location:accueil.php');
    } else {
        if(isset($_POST["delete"])){
            supprimerPhoto($_POST["delete"], $_SESSION["pseudo"]);
        }

        $listePhotosPerso = obtenirPhotos($_SESSION["pseudo"]);
        $listeConcoursPerso = obtenirConcoursUtilisateur($_SESSION["pseudo"]);

        require('../vues/vueProfil.php');
    }
?>