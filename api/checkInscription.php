<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Accept, Accept-Language, Content-Language, Content-Type");
include("db_connect.php");
global $conn;

$data = json_decode(file_get_contents('php://input'), true);
$login = $data['requestParameters']['login'];
$password = $data['requestParameters']['password'];
$nom = $data['requestParameters']['nom'];
$prenom = $data['requestParameters']['prenom'];

if($login != "" && $password != "" && $nom != "" && $prenom != "")
{
    $requete = "INSERT INTO `utilisateurs`(`login`, `mdp`, `nomU`, `prenom`, `poste`) VALUES ('$login','$password','$nom','$prenom','visiteur')";
    $exec_requete = mysqli_query($conn,$requete);

	$response = array(
		'status_message' => 'Inscription réussi',
		'status' => 1
	);
}
else {
    $response = array(
        'status_message' => 'Champs vide(s)',
        'status' => 0
    );
}
encodeJSON($response);

function encodeJSON($response) {
    header('Content-Type: application/json');
    //JSON_PRETTY_PRINT : belle affichage dans le front, JSON_UNESCAPED_UNICODE : utf-8
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );
  }
mysqli_close($conn); // fermer la connexion
?>