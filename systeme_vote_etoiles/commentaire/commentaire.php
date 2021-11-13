<?php

if(isset($_POST['commentaire'])) {
    session_start();
    // connexion à la base de données
    include("../api/db_connect.php");
    global $conn;

    $auteurId = intval($_SESSION['id']);
    $contenu = addslashes($_POST['commentaire']);
    $date = date('Y-m-d H:i:s');
    $etat = 'publie';
    $recetteId = 1;

    $requete = "INSERT INTO commentaires(auteurId, contenu, etat, dateC, recetteId) VALUES('".$auteurId."', '".$contenu."', '".$etat."', '".$date."', '".$recetteId."')";
    mysqli_query($conn, $requete);
    header("Location: commentairesForm.php?send=true");

}
else {
    //
    echo "on ne rentre pas dans la boucle";
}

?>