<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>Site de concours photo</title>
</head>

<body>
    <header>
          <!--A modifier plus tard -->
        <div>
            <a href="accueil.php"><i class="fa-solid fa-house"></i> Accueil</a>
            <?php
                if(isset($_SESSION["pseudo"])){
            ?>
                <a href="publication.php"><i class="fa-solid fa-cloud-arrow-up"></i> Publier</a>
                <a href="creation.php"><i class="fa-solid fa-plus"></i> Créer un concours</a>
                <a href="profil.php"><i class="fa-solid fa-user"></i> Connecté en tant que <span class="user-header"><?= $_SESSION["pseudo"]?></span></a>
                <a href="deconnexion.php"><i class="fa-solid fa-right-to-bracket"></i> Se déconnecter</a>
            <?php
                } else {
            ?>
                <a href="connexion.php">Se connecter</a>
                <a href="inscription.php">S'inscrire</a>
            <?php
                } 
            ?>
            
        </div>
    </header>