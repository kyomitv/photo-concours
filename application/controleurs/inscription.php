<?php
session_start();
require('../modeles/connect.php');
require('../modeles/utilisateurs.php');

if(empty($_POST)){
    require('../vues/vueInscription.php');
} else {
    if(isset($_POST["pseudo"]) && isset($_POST["pwd"]) && isset($_POST["mail"])){
        // L'utilisateur est disponible
        if(inscriptionOk($_POST["pseudo"], $_POST["mail"])){

            // Les mots de passes concordent
            if($_POST["pwd"] == $_POST["pwd_confirm"]){
                inscrireUtilisateur($_POST["pseudo"], $_POST["mail"], $_POST["pwd"]);
                $_SESSION["pseudo"] = $_POST["pseudo"];
                header('Location:accueil.php');
            } else {
                $_POST=[];
                $_SESSION['error']="Les mots de passe ne correspondent pas.";
                header('Location:inscription.php');
            }
            
        } else {
            $_POST=[];
            $_SESSION['error']="Pseudo ou adresse email déjà utilisé.";
            header('Location:inscription.php');
        }
    }
}

?>