<?php
session_start();
require('../modeles/connect.php');
require('../modeles/utilisateurs.php');

if(empty($_POST)){
    require('../vues/vueConnexion.php');
} else {
    if(isset($_POST["pseudo"]) && isset($_POST["pwd"])){
        if(connexionOk($_POST["pseudo"], $_POST["pwd"])){
            $_SESSION["pseudo"] = $_POST["pseudo"];
            header('Location:accueil.php');
        } else {
            $_POST=[];
            $_SESSION['error']="Le pseudo ou le mot de passe est incorrect.";
            header('Location:connexion.php');
        }
    }
}   
?>



