<!DOCTYPE html>
<html lang="fr">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../public/css/global.css">
        <link rel="stylesheet" href="../../public/css/profil.css">
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

        <!-- A compléter ici -->
        <div>
            <h2>Profil de <span><?=$_SESSION["pseudo"]?></span></h2>
            <p>Ici, vous pouvez retrouver vos informations et gérer vos publications.</p>
        </div>

        <hr>

        <section>
            <h3>Mes concours</h3>

            <div>
                <?php
                foreach($listeConcoursPerso as $concours){
                ?>
                    <div class="card">
                        <div class="card__content">
                            <h5><?=$concours["titre_concours"]?> - <i><?=$concours["theme_concours"]?></i></h5>
                            <p><?=$concours["desc_concours"]?></p>
                            <p><i><?php 
                            if(strtotime($concours["dateFin_concours"]) - strtotime(date("Y-m-d H:i:s"))>0){
                                echo "Fin dans ";
                                $ajd = new DateTime();
                                $diff = date_diff($ajd, date_create($concours["dateFin_concours"]));
                                if($diff->m){
                                    echo $diff->m." mois ";
                                }
                                if($diff->d){
                                    echo $diff->d." jours ";
                                }
                                if($diff->h){
                                    echo $diff->h." heures";
                                }
                            } else {
                                echo "Concours terminé.";
                            }
                            ?></i></p>
                            <br>
                            <a href="./podium.php?id=<?=$concours["id_concours"]?>">
                                <button class="button">
                                    <span class="button-content">Voir</span>
                                </button>
                            </a>
                            <button class="button button_del">
                                    <span class="button-content">Supprimer</span>
                            </button>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>

        <hr>

        <section>
            <h3>Mes photos</h3>
            <div>
                <?php
                foreach($listePhotosPerso as $photo){
                    $concoursThisPhoto = obtenirConcoursID($photo["concours_photo"]);
                ?>
                    <div class="cadre_photo">
                        <h4><?= $photo["titre_photo"]?></h4>
                        <p><?= $photo["description_photo"]?></p>
                        <form action="./profil.php" method="POST"><input type="hidden" name="delete" value="<?= $photo["id_photo"]?>">
                            <button class="button_del2"><i class="fa-solid fa-trash"></button></i>
                        </form>
                        <hr>
                        <p>Participe au concours : <a href="./podium.php?id=<?=$concoursThisPhoto["id_concours"]?>"><i><b><?= $concoursThisPhoto["titre_concours"]?></b></i></a></p>
                        <div>
                            <img src="<?= '../../'.$photo["chemin_photo"]?>" alt="<?= $photo["titre_photo"]?>">
                            <span class="avgNote"><span class="fa-solid fa-star checked"></span> <?=obtenirNotePhoto($photo["id_photo"])?></span>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>

        <?php require('footer.php') ?>
    </body>
</html>