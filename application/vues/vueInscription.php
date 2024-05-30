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
            <p class="title">Inscription</p>
            <form class="form" action="../controleurs/inscription.php" method="post">
                <div class="input-group">
                    <label for="username">Pseudo</label>
                    <input type="text" name="pseudo" id="username" placeholder="Votre pseudo...">
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="mail" id="email" placeholder="Votre email...">
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="pwd" id="password" placeholder="Votre mot de passe...">
                </div>
                <div class="input-group">
                    <label for="password">Confirmez votre mot de passe</label>
                    <input type="password" name="pwd_confirm" id="password" placeholder="Confirmez votre mot de passe...">
                </div>
                <button class="sign">S'Inscrire</button>
            </form>
            <p class="signup">Déjà un compte ?
                <a rel="noopener noreferrer" href="./connexion.php" class="">Se connecter</a>
            </p>
        </div>

        </main>

        <?php
        require('footer.php');
        ?>
    </body>
</html>