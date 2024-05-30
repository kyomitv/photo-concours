<!DOCTYPE html>
<html lang="fr">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../public/css/global.css">
        <link rel="stylesheet" href="../../public/css/publication.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <script src="../../public/js/publication.js" defer></script>
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
            <p class="title">Publication</p>
            <form action="publication.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="titre">Titre de la photo</label>
                    <input type="text" name="titre" id="titre" required placeholder="Titre...">
                </div>
                <div class="input-group">
                    <label for="desc">Description de la photo</label>
                    <textarea name="desc" id="desc" placeholder="Description..."></textarea>
                </div>
                <div class="input-group">
                    <label for="photo">Importer votre photo</label>
                    <input type="file" name="photo" id="photo">
                </div>
                <div class="input-group">
                    <label for="concours">Séléctionner un concours</label>
                    <select name="concours" id="concours" required>
                    <option value="">Choisir un concours</option>
                    <?php
                    foreach($listeConcours as $concours){
                        if($concours["dateDebut_concours"] < date("Y-m-d H:i:s")){
                    ?>
                    <option value="<?=$concours["id_concours"]?>" <?php if(isset($_GET["concours"]) && $concours["id_concours"] == $_GET["concours"]){echo "selected";} ?>><?=$concours["titre_concours"]?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                </div>
                <button class="sign">Publier</button>
            </form>
        </div>

        </main>

        <?php
        require('footer.php');
        ?>
    </body>
</html>