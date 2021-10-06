<form method="post"  action="index.php?uc=controleur&action=connecter">
    <h1>Connexion</h1>
    <p>
        <label for = "login">Login</label>
        <input type = "text"  name = "login" size = "30" maxlength = "45" placeholder = "Login">
     </p>
     <p>
        <label for = "mdp">Mot de passe</label>
        <input type = "password"  name = "mdp" size = "30" maxlength = "45" placeholder = "Mot de passe">
    </p>
    <input type = "submit" value = "Valider" name = "valider">
    <input type = "reset" value = "Annuler" name = "annuler"> 
</form>


<form method="post"  action="index.php?uc=controleur&action=inscription">
    <h1>Inscription</h1>
    <p>
        <label for = "loginI">Login</label>
        <input type = "text"  name = "login" size = "20" maxlength = "45" placeholder = "Login">
     </p>
     <p>
        <label for = "mdpI">Mot de passe</label>
        <input type = "password"  name = "mdp" size = "20" maxlength = "45" placeholder = "Mot de passe">
    </p>
    <p>
        <label for = "nom">Nom</label>
        <input type = "text"  name = "mdp" size = "30" maxlength = "45" placeholder = "Nom de famille">
    </p>
    <p>
        <label for = "prenom">Prenom</label>
        <input type = "text"  name = "mdp" size = "25" maxlength = "45" placeholder = "Prenom">
    </p>
    <input type = "submit" value = "Valider" name = "valider">
    <input type = "reset" value = "Annuler" name = "annuler"> 
</form>