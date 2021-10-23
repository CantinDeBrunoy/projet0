<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div id="content">
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    $id = $_SESSION['id'];
                    $role = $_SESSION['role'];
                    // afficher un message
                    echo "Bonjour $user, vous êtes connecté";
                    echo "<br /> Votre id est : $id";
                    echo "<br /> Votre rôle est : $role";
                }
                //session_unset();
                //destroy la session, l'utiliser quand on veut déco
            ?>
            <br />
            <a href="./ajoutNote/note_etoile.php">Redirection vers le système de notation avec étoiles</a><br />
            <a href="deconnexion.php">Déconnexion</a><br />
            <a href="./commentaire/commentairesForm.php">Ajout Commentaire</a><br />
            <a href="./administration.php">Administration</a>
        </div>
    </body>
</html>