<?php
session_start();
require('../modeles/connect.php');
require('../modeles/photos.php');
require('../modeles/concours.php');

//var_dump($_POST);

$listeConcours = obtenirConcours();


if(empty($_SESSION["pseudo"])){
    header("Location:connexion.php");
}

if(empty($_POST)){
    //echo "vide";
    require('../vues/vuePublication.php');
} else {

    //var_dump($_POST,$_SESSION,$_FILES);
    
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        if (importPhoto($_SESSION["pseudo"], $_POST["desc"], $_POST["titre"], $_FILES["photo"]["tmp_name"], $_POST["concours"])) {
            // Succès de l'envoi du fichier, vous pouvez maintenant enregistrer d'autres informations dans la base de données ou faire d'autres traitements nécessaires.
            // Par exemple, vous pouvez enregistrer le titre et la description dans la base de données en utilisant les valeurs de $_POST["titre"] et $_POST["desc"]
            // Puis rediriger l'utilisateur ou afficher un message de succès.
            header("Location:podium.php?id={$_POST["concours"]}");
        } else {
            // Erreur lors de l'envoi du fichier
            $_SESSION["error"] = "Erreur lors de l'envoi de la photo.";
            header("Location:publication.php");
        }
    } else {
        // Aucun fichier photo envoyé ou une erreur s'est produite lors de l'envoi
        $_SESSION["error"] = "Veuillez sélectionner une photo à télécharger.";
        header("Location:publication.php");
    }
}
?>