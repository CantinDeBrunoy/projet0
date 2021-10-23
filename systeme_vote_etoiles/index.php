<form action="verification.php" method="POST">
    <h1>Connexion</h1>
    
    <label><b>Nom d'utilisateur</b></label>
    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

    <label><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="password" required>

    <input type="submit" id='submit' value='LOGIN' >
    <?php
    if(isset($_GET['erreur'])){
        $err = $_GET['erreur'];
        if($err==1 || $err==2) {
            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
        }
        else if($err==3) {
            echo "<p style='color:red'>Veuillez vous connecter</p>";
        }
        else if($err==4) {
            echo "<p style='color:red'>Vous n'avez pas les droits pour accéder à cette page.</p>";
        }
    }
    if(isset($_GET['deconnexion'])){
        if($_GET['deconnexion']) {
            echo "<p style='color:green'>Vous vous êtes bien déconnecté.</p>";
        }
    }
    ?>
</form>
