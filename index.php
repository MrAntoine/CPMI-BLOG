<?php

include("config/db.php");
include("config/actions.php");
include("config/globals.php");
session_start();
ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées

?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <title>CPMI - BLOG</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />

   <!--  <link href="./css/style.css" rel="stylesheet"> -->

</head>

<body>

<?php
/*
if (isset($_SESSION['info'])) {
    echo "<div class='alert alert-info alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></button>
        <strong>Information : </strong> " . $_SESSION['info'] . "</div>";
    unset($_SESSION['info']);
}
*/
?>


<header id="header" class="alt">
    <div class="logo"><a href="index.php?action=list">CPMI - Blog <span>by Antoine Vanderbrecht</span></a></div>
    <a href="#menu">Menu</a>
</header>


<header >
    <?php
    include('vues/nav.php');
    ?>
</header>

<div class="contenu">
    <div>

        <div>
            <?php
            // Quelle est l'action à faire ?
            if (isset($_GET["action"])) {
                $action = $_GET["action"];
            } else {
                $action = "login";
            }

            // Est ce que cette action existe dans la liste des actions
            if (array_key_exists($action, $listeDesActions) == false) {
                include("vues/404.php"); // NON : page 404
            } else {
                include($listeDesActions[$action]); // Oui, on la charge
            }

            ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
            ?>


        </div>
    </div>
</div>


<!-- Footer -->
<footer id="footer">
    <div class="container">
        <ul class="icons">
            <li><a target="_blank" href="https://antoinevanderbrecht.fr/"><span class="label">VANDERBRECHT Antoine</span></a></li>
        </ul>
    </div>
    <div class="copyright">
        &copy; Tous droits réservés.
    </div>
</footer>


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>