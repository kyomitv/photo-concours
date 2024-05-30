<?php
    session_start();
    require('../modeles/connect.php');
    require('../modeles/photos.php');
    require('../modeles/votes.php');
    require('../modeles/concours.php');

    if(isset($_GET['id'])){
        $concours = obtenirConcoursID($_GET['id']);
        $listePhotos = obtenirPhotosByID($_GET['id']);
        $formatDateFin = date('r', strtotime($concours["dateFin_concours"]));
        $classement = obtenirClassement($listePhotos);

        $DebutFinDiff = strtotime($concours["dateFin_concours"]) - strtotime($concours["dateDebut_concours"]);
        $joursTotal = floor($DebutFinDiff / (60 * 60 * 24));
        $AjdFinDiff = strtotime($concours["dateFin_concours"]) - strtotime(date("Y-m-d H:i:s"));
        $joursRestants = floor($AjdFinDiff / (60 * 60 * 24));


        require('../vues/vuePodium.php');
    } else {
        header('Location:accueil');
    }

    