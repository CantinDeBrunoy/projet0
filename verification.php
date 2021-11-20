<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    include("db_connect.php");
    global $conn;
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($conn,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($conn,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateurs where 
              login = '".$username."' and mdp = '".$password."' ";
        $exec_requete = mysqli_query($conn,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            $requete_user = "SELECT id, poste FROM utilisateurs where 
            login = '".$username."' and mdp = '".$password."' ";
            $exec_requete_user = mysqli_query($conn,$requete_user);
            $reponse_user = mysqli_fetch_array($exec_requete_user);
            var_dump($reponse_user);
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $reponse_user['id'];
            $_SESSION['role'] = $reponse_user['poste'];
            //a redirigé vers la page voulue
            header('Location: page_utilisateur.php');
        }
        else
        {
            //a redirigé vers la page voulue
           header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
        //a redirigé vers la page voulue
       header('Location: index.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
    //a redirigé vers la page voulue
   header('Location: index.php');
}
mysqli_close($conn); // fermer la connexion
?>