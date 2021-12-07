<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

  // Se connecter à la base de données
  include("./db_connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];

  switch($request_method)
  {
    case 'POST':
      $data = $_POST['data'];
      if(empty($data))
      {
        $response = array(
            'status'=> 0,
            'status_message'=> 'Aucune données récupérées !'
        );
        encodeJSON($response);
      }
      $dataDecoded = json_decode($data, true);
      ajoutRecette($dataDecoded);
    break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
    break;
  }

  function ajoutRecette($dataDecoded)
  {
    $auteurId = $dataDecoded[0]['auteurId'];
    $nom = $dataDecoded[0]['nom'];
    $ingredients = $dataDecoded[0]['ingredients'];
    $description = $dataDecoded[0]['description'];
    $note = $dataDecoded[0]['note'];
    $etat = $dataDecoded[0]['etat'];
    $categorieId = $dataDecoded[0]['categorieId'];
    $dateRec = $dataDecoded[0]['dateRec'];
    $difficulte = $dataDecoded[0]['difficulte'];

    global $conn;
    $query = "INSERT INTO `recettes`(`auteurId`, `nom`, `ingredients`, `description`, `note`, `etat`, `categorieId`, `datePublication`, `difficulte`) VALUES ( '$auteurId', '$nom', '$ingredients', '$description', '$note', '$etat', '$categorieId', '$dateRec', '$difficulte' )";
    mysqli_query($conn, $query);
    $response = array(
        'status'=> 1,
        'status_message'=> 'Recette ajoutée avec succès !'
    );
    encodeJSON($response);
  }

  //Fonction pour encoder en JSON et récupérer le message de statut de la requête
  function encodeJSON($response) {
    header('Content-Type: application/json');
    //JSON_PRETTY_PRINT : belle affichage dans le front, JSON_UNESCAPED_UNICODE : utf-8
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }
?>