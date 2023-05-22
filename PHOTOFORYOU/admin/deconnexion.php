<?php
session_start();

if (isset($_SESSION['zWuppkgTT6o0Y44'])) {
    session_destroy();
    header("Location: ../");
} else {
    header("Location: ../login.php");
    exit; // arrêter l'exécution du script pour éviter toute exécution de code supplémentaire
}

 require(" ../config/commande.php");
 require("../login.php");

?>
