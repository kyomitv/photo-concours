<?php
session_start();
require('../modeles/photos.php');
require('../modeles/connect.php');
require('../modeles/votes.php');
require('../modeles/concours.php');
// on récupère auprès du modéle les photos récemment ajoutées
// $listePhotos = compléter ...... puis décommenter la ligne
$listePhotos=obtenirPhotos(null);
$listeConcours = obtenirConcours();


require('../vues/vueAccueil.php');
