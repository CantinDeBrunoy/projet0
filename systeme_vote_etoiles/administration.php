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
                <?php $id = $res[$i]->idCom; ?>
                <td><?php echo "<b>", $id; ?></b></td>
                <td><?php echo "<b>", $res[$i]->auteurId; ?></b></td>
                <td><?php echo "<b>", $res[$i]->contenu; ?></b></td>
                <td><?php echo "<b>", $res[$i]->dateC; ?></b></td>
                <td><?php echo "<b>", $res[$i]->recetteId; ?></b></td>
                <td><a href="./api/post_commentaire_valide_by_id?id=<?php echo $id; ?>">Valider</td>
                <td><a href="./api/post_commentaire_supprime_by_id?id=<?php echo $id; ?>">Supprimer</td>
            </tr>  
        <?php } ?>
    </tbody>
</table>
<br />

<a href="./commentaire/commentairesForm.php">Redirection vers la page de commentaires.</a><br />
<a href="./index.php?deconnexion=true">Deconnexion</a>