<?php
  /******************************************************************************************************/
  /* SERVICE API QUI MODIFIE L'ETAT D'UN COMMENTAIRE EN 'publie' SELON L'ID DONNÉ (SQL -> etat='publie')*/
  /******************************************************************************************************/

  // Se connecter à la base de données
  include("../db_connect.php");
  $request_method = $_SERVER["REQUEST_METHOD"];

  switch($request_method)
  {
    case 'GET':
      if(empty($_GET["id"]))
      {
        // Retourne un message d'erreur si $_GET['id'] est vide
        $response=array(
          'status' => 0,
          'status_message' =>'Aucun commentaire spécifié.'
        );
        encodeJSON($response);
      }
      else
      {
        // Va à la fonction qui va update l'état du commentaire en "signale"
        $id = $_GET["id"];
        updateCommentaire($id);
      }
      break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }

  function updateCommentaire($id='')
  {
    global $conn;
    $query = "UPDATE commentaires SET etat='publie' WHERE idCom=$id";
    $result = mysqli_query($conn, $query);
    if($result) {
      $response=array(
        'status' => 1,
        'status_message' =>'Commentaire validé avec succès.'
      );
    }
    encodeJSON($response);
  }

  //Fonction pour encoder en JSON et récupérer le message de statut de la requête
  function encodeJSON($response) {
    header('Content-Type: application/json');
    //JSON_PRETTY_PRINT : belle affichage dans le front, JSON_UNESCAPED_UNICODE : utf-8
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }
  
?>