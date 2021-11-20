<?php
  // Se connecter à la base de données
  include("./db_connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];

  switch($request_method)
  {
    case 'GET':
      if(!empty($_GET["id"]))
      {
        // Récupérer un seul produit
        $id = intval($_GET["id"]);
        getUtilisateur($id);
      }
      else
      {
        // Récupérer tous les produits
        getUtilisateurs();
      }
      break;
    default:
      // Requête invalide
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

  function getUtilisateur($id=0)
  {
    global $conn;
    $query = "SELECT * FROM utilisateurs";
    if($id != 0)
    {
      $query .= " WHERE id=".$id." LIMIT 1";
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