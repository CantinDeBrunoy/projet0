<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	
	// Se connecter à la base de données
	include("./db_connect.php");

	$dataDecoded = json_decode(file_get_contents('php://input'), true);
	if($dataDecoded['requestParameters']['contenu'] == "")
	{
	$response = array[
		'status'=> 0,
		'status_message'=> 'Aucune données récupérées !'
	];
	encodeJSON($response);
	}
	else {
		addCommentaire($dataDecoded);
	}
	
	function addCommentaire($dataDecoded)
	{
		$auteurId = $dataDecoded['requestParameters']['auteurId'];
		$contenu = $dataDecoded['requestParameters']['contenu'];
		$etat = "publie";
		$recetteId = $dataDecoded['requestParameters']['recetteId'];

		global $conn;
		$query = "INSERT INTO `commentaires`(`auteurId`, `contenu`, `etat`, `date`, `recetteId`) VALUES ( '$auteurId', '$contenu', '$etat', NOW(), '$recetteId')";
		$result = mysqli_query($conn, $query);
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
