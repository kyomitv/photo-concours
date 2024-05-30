<?php
// contrôleur présent uniquement pour réaliser des tests
require('../modeles/connect.php');
require('../modeles/photos.php');
require('../modeles/utilisateurs.php');
require('../modeles/votes.php');

$dbh=connect();
// var_dump($dbh);

// $photos=obtenirPhotos();
// //var_dump($photos);

// echo connexionOk("jean", "t");

// echo inscriptionOk("aline2", "a@a");

// echo "<br>";

//inscrireUtilisateur("simon", "s@mail", "123");

var_dump(ajoutVoteBDD(2, "simon",3));

?>

<form action="tests.php" id="myForm" method="POST" enctype="multipart/form-data">
    <input type="text" name="texte" id="">
    <input type="file" name="file" form="myForm">
    <br>
    <button type="submit">Envoyer</button>
</form>
<br>

<?php
echo ('<p>Oui</p>');

var_dump($_POST, $_FILES);
?>