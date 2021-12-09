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
	  if(!empty($_GET["id"]))
	  {
		// Récupérer un seul produit
		$id = intval($_GET["id"]);
		supprRecette($id);
	  }
	  else {
		$response = array(
		'status' => 0,
		'status_message' => 'Aucune ID récupéré'
		);
		encodeJSON($response);
	  }
	  break;
	default:
	  // Requête invalide
	  header("HTTP/1.0 405 Method Not Allowed");
	  break;
	}

	function supprRecette($id=0)
	{
		global $conn;
		$query = "DELETE FROM recettes";
		if($id != 0)
		{
		  $query .= " WHERE id='".$id."'";
		}
		$result = mysqli_query($conn, $query);
		$response = array(
			'status' => 1,
			'status_message' => 'Recette supprimée avec succès.'
		);
		header('Content-Type: application/json');
		encodeJSON($response);
	}
	
	function encodeJSON($response) {
		header('Content-Type: application/json');
		//JSON_PRETTY_PRINT : belle affichage dans le front, JSON_UNESCAPED_UNICODE : utf-8
		echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	}
?>
