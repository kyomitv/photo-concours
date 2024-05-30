<link rel="stylesheet" href="../../public/css/global.css">  
<?php
    if(isset($_SESSION["error"])){
        echo "<h5 class='errorMsg'>{$_SESSION['error']}</h5>";
        unset($_SESSION["error"]);
    }
?>