<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

  // Se connecter à la base de données
  include("./db_connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];

  switch($request_method)
  {
    case 'GET':
        getRecettesCategID();
      break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }

  function getRecettesCategID()
  {
    global $conn;
    $query = "SELECT DISTINCT nomC, categorieId FROM categories
              INNER JOIN recettes ON categories.id = recettes.categorieId;";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }
?>