<?php
  // Se connecter à la base de données
  include("./db_connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];

  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["prenom"]))
      {
        // Récupérer un seul produit
        $prenom = $_GET["prenom"];
        getUtilisateur($prenom);
      }
      else
      {
        // Récupérer tous les produits
        getUtilisateurs();
      }
      break;
    default:
      // Requête invalprenome
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }

  function getUtilisateurs()
  {
    global $conn;
    $query = "SELECT * FROM utilisateurs";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

  function getUtilisateur($login)
  {
    global $conn;
    $query = "SELECT * FROM utilisateurs";
    if($login != '')
    {
      $query .= " WHERE login=".$login." LIMIT 1";
    }
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }
?>