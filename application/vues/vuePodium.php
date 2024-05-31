<!DOCTYPE html>
<html lang="fr">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../public/css/global.css">
        <link rel="stylesheet" href="../../public/css/podium.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <script src="../../public/js/podium.js" defer></script>   
        <title>Site de concours photo</title>
    </head>

    <body>
        <?php
        require('header.php');
        ?>

        <?php
        require('../vues/erreur.php');
        ?>



        <section>
            <h3><?=$concours["titre_concours"]?> (<?=$concours["theme_concours"]?>)</h3>
            <p><?=$concours["desc_concours"]?></p>
        
            <a href="./publication.php?concours=<?=$concours["id_concours"]?>">
                <button class="button" <?php if(strtotime($concours["dateFin_concours"]) - strtotime(date("Y-m-d H:i:s"))<0){echo 'style="display:none"';}?>>
                    <span class="button-content">Participer</span>
                </button>
            </a>
        </section>

            <hr>

        <section>
                <div class="container">
                    <?php foreach ($classement as $id=>$photo){?>
                        <input type="radio" name="slider" id="item-<?=$id+1?>" <?php if($id+1 == 1){echo "checked";}?>>
                    <?php }?>
                    <div class="cards">
                        <?php foreach ($classement as $id=>$photo){?>
                            <label class="card" for="item-<?=$id+1?>" id="song-<?=$id+1?>">
                                <img src="<?= '../../'.$photo["chemin_photo"]?>" alt="<?= $photo["titre_photo"]?>">
                            </label>
                        <?php }?>
                    </div>
                    <div class="player">
                        <div class="upper-part">
                        <div class="play-icon">
                            <i class="fa-solid fa-camera checked"></i>
                        </div>
                        <div class="info-area" id="test">
                            <?php foreach ($classement as $id=>$photo){?>                        
                                <label class="song-info" id="song-info-<?=$id+1?>">
                                    <div class="title"><?=$id+1?>. <?= $photo["titre_photo"]?> (<?= $photo["auteur_photo"]?>)</div>
                                    <div class="sub-line">
                                        <div class="subtitle"><?= $photo["description_photo"]?></div>
                                        <div class="time"><span class="fa-solid fa-star checked"></span> <?=obtenirNotePhoto($photo["id_photo"])?></div>
                                    </div>
                                </label>
                                
                            <?php }?>
                        </div>
                        </div>
                        <div class="progress-bar">
                            <span class="progress" style="width:<?php echo (1-$joursRestants/$joursTotal)*100;?>%"></span>
                        </div>
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
                    </div>
                </div>
        </section>

            <!-- Toutes les photos -->
        <section class="photos-container">
            <?php
            foreach ($listePhotos as $id=>$photo) {
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
                    <p>(<?=obtenirNotePhoto($photo["id_photo"])?>)</p>
                </div>
            <?php
                }
            ?>
        </section>

        <?php
        require('../vues/footer.php');
        ?>
    </body>
</html>