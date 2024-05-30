<!DOCTYPE html>
<html lang="fr">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../public/css/global.css">
        <link rel="stylesheet" href="../../public/css/accueil.css">
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
            <h1>Site de concours photos</h1>
            <p>Ici, vous pouvez vous joindre à des concours de passionnés pour mettre en valeur votre talent de photographe. Ou alors, tout simplement profiter des oeuvres des gens.</p>
        </div>

        <hr>

        <section>
            <h3>Derniers concours</h3>
            <div>
                <?php
                foreach ($listeConcours as $concours) {
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
                </div>
            </div>
            
            <?php
                } 
            ?>
            </div>
            
        </section>
        
        <hr>

        <section>
            <h3>Dernières photos publiées</h3>
            
            <div>
                <?php
                foreach ($listePhotos as $photo) {
                    if(isset($_SESSION["pseudo"])){
                        $vote=obtenirVote($photo["id_photo"], $_SESSION["pseudo"]);
                    }
                ?>
                    <div id=<?= $photo["id_photo"]?>>
                        <h4><?= $photo["titre_photo"]?> (<?= $photo["auteur_photo"]?>)</h4>
                        <p><?= $photo["description_photo"]?></p>
                        <!--<form action="./gestionVotes.php" method="POST">
                            <select name="vote" id="vote">
                                <option value="1_<?= $photo["id_photo"]?>" <?php if($vote==1){echo "selected";}?>>1</option>
                                <option value="2_<?= $photo["id_photo"]?>" <?php if($vote==2){echo "selected";}?>>2</option>
                                <option value="3_<?= $photo["id_photo"]?>" <?php if($vote==3){echo "selected";}?>>3</option>
                                <option value="4_<?= $photo["id_photo"]?>" <?php if($vote==4){echo "selected";}?>>4</option>
                                <option value="5_<?= $photo["id_photo"]?>" <?php if($vote==5){echo "selected";}?>>5</option>
                            </select>
                            <button type="submit">Voter</button>
                        </form>-->
                        <img src="<?= '../../'.$photo["chemin_photo"]?>" alt="<?= $photo["titre_photo"]?>">
                        <?php
                            if(isset($_SESSION["pseudo"]) && $_SESSION["pseudo"]!=$photo["auteur_photo"]){
                        ?>
                        
                        <div class="rating">
                            <span class="fa-solid fa-star <?php if($vote>=1){echo "checked";}?>"></span>
                            <span class="fa-solid fa-star <?php if($vote>=2){echo "checked";}?>"></span>
                            <span class="fa-solid fa-star <?php if($vote>=3){echo "checked";}?>"></span>
                            <span class="fa-solid fa-star <?php if($vote>=4){echo "checked";}?>"></span>
                            <span class="fa-solid fa-star <?php if($vote>=5){echo "checked";}?>"></span>
                        </div>
                        <?php
                            } 
                        ?>
                        <span class="avgNote"><span class="fa-solid fa-star checked"></span> <?=obtenirNotePhoto($photo["id_photo"])?></span>

                    </div>
                <?php
                }
                ?>
            </div>
        </section>

        <?php require('footer.php') ?>

    </body>
</html>