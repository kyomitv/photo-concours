<?php
session_start();
require('../modeles/connect.php');
require('../modeles/concours.php');

//var_dump($_POST);

if(empty($_SESSION["pseudo"])){
    header('Location:connexion.php');
}

if(empty($_POST)){
    //echo "vide";
    require('../vues/vueCreation.php');
} else {
    if($_POST["titre"] != "" && $_POST["desc"] && $_POST["themes"] != ""){
        if($_POST["startDateSelect"]!="" && $_POST["startTimeSelect"]!="" && $_POST["endDateSelect"]!="" && $_POST["endTimeSelect"]!=""){
            //
            //Verifier que la fin vient après le debut
            if(($_POST["startDateSelect"]>$_POST["endDateSelect"]) || ($_POST["startDateSelect"]==$_POST["endDateSelect"] && $_POST["startTimeSelect"]>$_POST["endTimeSelect"])){
                $_POST=[];
                $_SESSION['error']="Veuillez entrer des dates et heures correctes.";
                header('Location:creation.php');
            }

            if(creerConcours($_POST["titre"], $_POST["desc"], $_POST["themes"], $_POST["startDateSelect"]." ".$_POST["startTimeSelect"].":00", $_POST["endDateSelect"]." ".$_POST["endTimeSelect"].":00", $_SESSION["pseudo"])){
                header('Location:profil.php');
            }

        } else {
            $_POST=[];
            $_SESSION['error']="Veuillez entrer des dates et heures de début et de fin.";
            header('Location:creation.php');
        }
    }   else {
        $_POST=[];
        $_SESSION['error']="Veuillez entrer un titre, une description et choisir un thème.";
        header('Location:creation.php');
    }
}
?>