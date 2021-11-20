<?php
//check si l'utilisateur est connecté.
session_start();
if(!isset($_SESSION['username'])){
    setcookie('PHPSESSID', null, -1, '/');
    header('location: index.php?erreur=3');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/da098f5766.js" crossorigin="anonymous"></script><!-- Nécessaire au fonctionnement de nos étoiles-->
    <script src="./note_etoile.js" defer></script><!--defer pour que le script s'éxécute après la création de tout l'html-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./note_etoile.css">

    <title>Système de notation par étoile</title>
</head>
<body>
    <i class="fas fa-solid fa-star fa-2x" data-etoile="2"></i><!--icon d'étoile-->
    <i class="fas fa-solid fa-star fa-2x" data-etoile="4"></i>
    <i class="fas fa-solid fa-star fa-2x" data-etoile="6"></i>
    <i class="fas fa-solid fa-star fa-2x" data-etoile="8"></i>
    <i class="fas fa-solid fa-star fa-2x" data-etoile="10"></i>
    &nbsp; Note : <span class="note">-</span><!--span pour afficher la note, à remove si ce n'est pas nécessaire de l'afficher-->

</body>
</html>