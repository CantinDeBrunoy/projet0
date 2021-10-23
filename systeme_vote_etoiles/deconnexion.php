<?php
    //Désactiver la session
    session_unset();
    
    //Désactiver le cookie (PHPSESSID par défaut comme name car je ne le set pas à la main mais automatiquement grâce à session_start())
    unset($_COOKIE['PHPSESSID']);
    //Mettre la durée du cookie à -1 pour qu'il se détruise
    setcookie('PHPSESSID', null, -1, '/');

    //Redirection vers la page de connexion avec un $_GET deconnexion à true pour afficher un msg dans celui-ci
    header("location:index.php?deconnexion=true");
?>