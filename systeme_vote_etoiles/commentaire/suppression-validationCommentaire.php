<?php
include('../api/db_connect.php');
$commentaireSelectionne = $_POST['commentaires_signales'];

if(isset($_POST['supprimer'])) {
    $query="DELETE FROM commentaires WHERE idCom=$commentaireSelectionne";
    mysqli_query($conn, $query);
    header("location: ../administration.php?success=2");
}
else if(isset($_POST['valider'])) {
    $query = "UPDATE commentaires SET etat='publie' WHERE idCom=$commentaireSelectionne";
    mysqli_query($conn, $query);
    header("location: ../administration.php?success=1");
}
?>