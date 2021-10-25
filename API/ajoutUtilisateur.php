<?php
  // Se connecter à la base de données
  include("./db_connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];

  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["loginI"]))
      {
        // Récupérer un seul produit
        $loginI = $_GET['loginI'];
	    $mdpI = $_GET['mdpI'];
	    $name = $_GET['name'];
	    $prenom = $_GET['prenom'];
        addUtilisateur($loginI,$mdpI,$name,$prenom);
      }
      break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }

  function addUtilisateur($loginI,$mdpI,$name,$prenom)
  {
    global $conn;
    $query = "INSERT INTO `utilisateurs`(`login`, `mdp`, `nomU`, `prenom`, `poste`) VALUES ( '$loginI', '$mdpI', '$name', '$prenom', 'visiteur')";
    $result = mysqli_query($conn, $query);
    header('Content-Type: application/json');
  }
?>