<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
  /************************************************************/
  /* SERVICE API QUI SUPPRIME UN COMMENTAIRE SELON L'ID DONNÉ */
  /************************************************************/

  // Se connecter à la base de données
  include("./db_connect.php");
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
        deleteCommentaire($id);
      }
      break;
    default:
      // Requête invalide
      header("HTTP/1.0 405 Method Not Allowed");
      break;
  }

  function deleteCommentaire($id='')
  {
    global $conn;
    $query = "DELETE FROM `commentaires` WHERE idCom=$id";
    $result = mysqli_query($conn, $query);
    if($result) {
      $response=array(
        'status' => 1,
        'status_message' =>'Commentaire supprimé avec succès.'
      );
    }
    encodeJSON($response);
  }

  //Fonction pour encoder en JSON et récupérer le message de statut de la requête
  function encodeJSON($response) {
    header('Content-Type: application/json');
    //JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE : belle affichage dans le front, JSON_UNESCAPED_UNICODE : utf-8
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
  }
  
?>