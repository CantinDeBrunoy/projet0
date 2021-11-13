<?php
include("../api/db_connect.php");
if(!empty($_POST['note'])) {
    session_start();
    
    if($_SESSION['username'] !== ""){
        $idUser = $_SESSION['id'];
        global $conn;
        $note = $_POST['note'];
        $idUser = $_SESSION['id'];
        $idProduit = 1;

        $query="INSERT INTO note(note, idUser, idProduit) VALUES('".$note."', '".$idUser."', '".$idProduit."')";
        mysqli_query($conn, $query);
        //faire la requête proprement insert or update
        //https://webdevdesigner.com/q/insert-if-not-exists-else-update-29473/
    }
    else {
        header('location: index.php');
    }
    
}
?>