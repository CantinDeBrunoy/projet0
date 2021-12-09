<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");

	// Se connecter à la base de données
	include("./db_connect.php");
	$dataDecoded = json_decode(file_get_contents('php://input'), true);
	if(empty($dataDecoded))
	{
		$response = array(
			'status'=> 0,
			'status_message'=> 'Aucune données récupérées !'
		);
		encodeJSON($response);
	}
	else {
		ajoutRecette($dataDecoded);
	}

	function ajoutRecette($dataDecoded)
	{
		$auteurId = $dataDecoded['requestParameters']['auteurId'];
		$nom = $dataDecoded['requestParameters']['nom'];
		$ingredients = $dataDecoded['requestParameters']['ingredients'];
		$description = $dataDecoded['requestParameters']['description'];
		$note = $dataDecoded['requestParameters']['note'];
		$etat = 'publie'
		$categorieId = $dataDecoded['requestParameters']['categorieId'];
		$difficulte = $dataDecoded['requestParameters']['difficulte'];

		global $conn;
		$query = "INSERT INTO `recettes`(`auteurId`, `nom`, `ingredients`, `description`, `note`, `etat`, `categorieId`, `datePublication`, `difficulte`) VALUES ( '$auteurId', '$nom', '$ingredients', '$description', '$note', '$etat', '$categorieId', NOW(), '$difficulte' )";
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
