<?php
//check si l'utilisateur est connecté.
session_start();
if(!isset($_SESSION['username'])){
    setcookie('PHPSESSID', null, -1, '/');
    header('location: ../index.php?erreur=3');
}
?>
<link rel="stylesheet" href="commentaire.css">
<form action="addCommentaire.php" method="POST">
    <h1>Ajout d'un commentaire pour la recette 1 par défaut</h1>
    
    <label><b>Commentaire</b></label>
    <textarea placeholder="Entrer votre commentaire" name="commentaire" required></textarea>

    <input type="submit" id='submit' value='Envoyer' >
</form>

<?php 

if(isset($_GET['send'])) {
    if($_GET['send']) {
        echo "<p style='color:green'>Commentaire ajouté</p>";
    }
}

include('../db_connect.php');
global $conn;

$requete = "SELECT * FROM commentaires WHERE recetteId=1 AND etat='publie'";
$query = mysqli_query($conn, $requete);
$tabQuery = [];

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $tabQuery[] = $row;
}
?>
<div class="contentComm">
    <h2>LISTE DES COMMENTAIRES</h2>
    <?php
    for($i=0; $i < count($tabQuery); $i++) {

        $requeteAuteurName = "SELECT DISTINCT nomU, prenom FROM utilisateurs 
        INNER JOIN commentaires ON utilisateurs.id = commentaires.auteurId WHERE auteurId=".$tabQuery[$i]['auteurId'];
        $queryAuteurName = mysqli_query($conn, $requeteAuteurName);
        $tabNomPrenomAuteur = mysqli_fetch_array($queryAuteurName, MYSQLI_ASSOC);
        ?>
        <div class='singleComm'>
            <div class='contenuComm'>Contenu du commentaire : <?php echo $tabQuery[$i]['contenu']; ?> </div>
            <div class='dateComm'>Date de publication : <?php echo $tabQuery[$i]['dateC']; ?> </div>
            <div class='auteurComm'>Publié par : <?php echo $tabNomPrenomAuteur['prenom']." ".$tabNomPrenomAuteur['nomU']; ?> <br /><br />
            <form action="./signaleCommentaire.php" method="POST">
                <input type="hidden" name="commentaireSignale" value="<?php echo $tabQuery[$i]['idCom'];?>">
                <div class="signale"><a href="./api/post_commentaire_signale_by_id?id=<?php echo $tabQuery[$i]['idCom'];?>">Signaler</a></div>
    </form>
        </div>       
    </div><br />
    <?php
    }
    ?>
</div>
<a href="../index.php">Redirection vers la page d'accueil</a>