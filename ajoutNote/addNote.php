<?php
include("../api/db_connect.php");
if(!empty($_POST['note'])) {
    session_start();
    
    if($_SESSION['username'] !== ""){
        $idUser = $_SESSION['id'];
        global $conn;
        $note = $_POST['note'];
        $idUser = $_SESSION['id'];
        //recupere la recette id grace a cantin (lui preciser qu'il faut qui l'a renvoie cet enculé)
        $recetteId = 1;

        $query="INSERT INTO notes(note, auteurId, recetteId) VALUES('".$note."', '".$idUser."', '".$recetteId."')";
        mysqli_query($conn, $query);
        //faire la requête proprement insert or update
        //https://webdevdesigner.com/q/insert-if-not-exists-else-update-29473/
    }
    else {
        header('location: index.php');
    }
    
}
?>