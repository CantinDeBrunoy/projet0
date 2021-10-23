<?php

include("../db_connect.php");
if(isset($_POST['signaler'])) {
    $commentaireSignale = $_POST['commentaireSignale'];
    $query = "UPDATE commentaires SET etat='signale' WHERE idCom=$commentaireSignale";
    mysqli_query($conn, $query);
    header("location: ./commentairesForm?success=1");
}

?>