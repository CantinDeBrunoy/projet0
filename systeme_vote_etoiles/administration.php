<link rel="stylesheet" href="admin.css">
<?php

session_start();
if(!isset($_SESSION['username'])){
    setcookie('PHPSESSID', null, -1, '/');
    header('location: index.php?erreur=3');
}

if($_SESSION['role'] != 'admin') {
    setcookie('PHPSESSID', null, -1, '/');
    header('location: index.php?erreur=4');
}
//CODER ICI (car vérification de droits au dessus)
echo('<h1>PAGE ADMIN</h1><br />');
//Récupérer tous les commentaires avec l'état "signale" par le biais d'un service (pour l'instant requête SQL)
/*include("./db_connect.php");

$query="SELECT * FROM commentaires WHERE etat='signale'";
$exec = mysqli_query($conn, $query);
$res = array();

while($row = mysqli_fetch_array($exec, MYSQLI_ASSOC)) {
    $res[] = $row;
}*/

$get_content_json = file_get_contents("http://localhost/p/systeme_vote_etoiles/api/commentaires_etat?etat='signale'");
$res = json_decode($get_content_json);
?>

<table>
    <thead>
        <tr>
            <th colspan="5">Administration Commentaires</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ID</td>
            <td>ID de l'auteur</td>
            <td>Contenu</td>
            <td>Date de publication</td>
            <td>ID de la recette</td>
        </tr>
        <?php if(count($res) == 0) echo "<td colspan='5'> Aucune commentaire actuellement signalé. </td>";
        for($i = 0; $i < count($res); $i++) {?>
            <tr>
                <td><?php echo "<b>", $res[$i]->idCom; ?></b></td>
                <td><?php echo "<b>", $res[$i]->auteurId; ?></b></td>
                <td><?php echo "<b>", $res[$i]->contenu; ?></b></td>
                <td><?php echo "<b>", $res[$i]->dateC; ?></b></td>
                <td><?php echo "<b>", $res[$i]->recetteId; ?></b></td>
            </tr>  
        <?php } ?>
    </tbody>
</table>
<br />
<form action="./commentaire/suppression-validationCommentaire.php" method="POST">
    
    <select name="commentaires_signales" id="commentaires_signales">
        <option value="">--- Choisir un commentaire ---</option>
    <?php for($i = 0; $i < count($res); $i++) { ?>
        <option value="<?php echo $res[$i]->idCom; ?>"><?php echo "Commentaire avec id n°",$res[$i]->idCom; ?></option>
        <?php } ?>
    </select>
    <input type="submit" value="Valider" name="valider">
    <input type="submit" value="Supprimer" name="supprimer">
</form>
<a href="./commentaire/commentairesForm.php">Redirection vers la page de commentaires.</a><br />
<a href="./index.php?deconnexion=true">Deconnexion</a>
<?php
if(isset($_GET['success'])) {
    if($_GET['success'] == 1) {
        echo "<p style='color:green'>Commentaire validé avec succès.</p>";
    }
    else if($_GET['success'] == 2) {
        echo "<p style='color:green'>Commentaire supprimé avec succès.</p>";
    }
    else if($_GET['success'] == 3) {
        echo "<p style='color:red'>Rencontre d'un problème. Aucun changement dans la base de données.</p>";
    }
}
?>