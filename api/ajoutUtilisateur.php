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
      addUtilisateur($dataDecoded);
    break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
    break;
  }

  function addUtilisateur($dataDecoded)
  {
    $login = $dataDecoded[0]['login'];
    $mdp = $dataDecoded[0]['mdp'];
    $nomU = $dataDecoded[0]['nomU'];
    $prenom = $dataDecoded[0]['prenom'];

    global $conn;
    $query = "INSERT INTO `utilisateurs`(`login`, `mdp`, `nomU`, `prenom`, `poste`) VALUES ( '$login', '$mdp', '$nomU', '$prenom', 'visiteur')";
    mysqli_query($conn, $query);
    $response = array(
        'status'=> 1,
        'status_message'=> 'Recette ajoutée avec succès !'
    );
    encodeJSON($response);
  }

  function encodeJSON($response) {
    header('Content-Type: application/json');
    //JSON_PRETTY_PRINT : belle affichage dans le front, JSON_UNESCAPED_UNICODE : utf-8
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }
?>