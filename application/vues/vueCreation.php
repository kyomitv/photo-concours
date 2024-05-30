<!DOCTYPE html>
<html lang="fr">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../public/css/global.css">
        <link rel="stylesheet" href="../../public/css/publication.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

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
            <p class="title">Création de concours</p>
            <form action="creation.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="titre">Titre du concours</label>
                    <input type="text" name="titre" placeholder="Nom du concours..." id="titre" required >
                </div>
                <div class="input-group">
                    <label for="desc">Description du concours</label>
                    <textarea name="desc" id="desc" placeholder="Description..."></textarea>
                </div>
                <div class="dateContainer">
                    <div class="input-group">
                        <label for="startDateSelect">Début du concours</label>
                        <input name="startDateSelect" type="date" id="startDateSelect"><input  name="startTimeSelect" type="time">
                    </div>
                    <div class="input-group">
                        <label for="endDateSelect">Fin du concours</label>
                        <input type="date" name="endDateSelect" id="endDateSelect"><input type="time" name="endTimeSelect">
                    </div>
                </div>
                <div class="input-group">
                    <label for="concours">Séléctionner un thème</label>
                    <select name="themes" id="themes" required>
                        <option value="">Choisir un thème</option>
                        <option value="Animalier">Animalier</option>
                        <option value="Portrait">Portrait</option>
                        <option value="Paysage">Paysage</option>
                        <option value="Culinaire">Culinaire</option>
                        <option value="Nature Morte">Nature Morte</option>
                        <option value="Autre">Autre...</option>
                    </select>
                </div>
                <button class="sign">Créer</button>
            </form>
        </div>

        </main>


        <?php
        require('footer.php');
        ?>

        <script>
            document.getElementById('startDateSelect').value = new Date().toISOString().split('T')[0];
            document.getElementById('startDateSelect').min = new Date().toISOString().split('T')[0];

            document.getElementById('endDateSelect').min = new Date().toISOString().split('T')[0];
        </script>
    </body>
</html>