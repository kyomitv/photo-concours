<?php
session_start();
require('../modeles/connect.php');
require('../modeles/votes.php');

if(isset($_POST)){
    $data = file_get_contents("php://input");
    $obj = json_decode($data, true);

    echo $obj["vote"]."_".$obj["photo"];
    
    $vote = $obj["vote"];
    $photo_id = $obj["photo"];

    ajoutVoteBDD($photo_id, $_SESSION["pseudo"],$vote);
    header('Location:accueil.php');
}

?>