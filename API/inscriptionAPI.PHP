<?php


/* Exécute une requête préparée en passant un tableau de valeurs */
$sth = $pdo->prepare('INSERT INTO membre (login, mdp, nomU, prenom, poste, recetteNoteMoyenne, nbRecettePub) VALUES ( ?, ?, ?, ?, "visiteur", null, null)');
$sth->execute(array($loginI , $mdpI, $nom, $prenom));
?>