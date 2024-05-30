<!DOCTYPE html>
<html lang="fr">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../public/css/global.css">
        <link rel="stylesheet" href="../../public/css/connexion.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <script src="../../public/js/accueil.js" defer></script>   
        <title>Site de concours photo</title>
    </head>

    <body>
        <?php
        require('header.php');
        ?>

        <?php
        require('../vues/erreur.php');
        ?>

        <main>

        <div class="form-container">
            <p class="title">Connexion</p>
            <form class="form" action="../controleurs/connexion.php" method="post">
                <div class="input-group">
                    <label for="username">Pseudo</label>
                    <input type="text" name="pseudo" id="username" placeholder="Votre pseudo...">
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="pwd" id="password" placeholder="Votre mot de passe...">
                </div>
                <button class="sign">Se connecter</button>
            </form>
            <p class="signup">Pas encore de compte ?
                <a rel="noopener noreferrer" href="./inscription.php" class="">S'inscrire</a>
            </p>
        </div>

        </main>

        <?php
        require('footer.php');
        ?>
    </body>
</html>