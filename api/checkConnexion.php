<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Accept, Accept-Language, Content-Language, Content-Type");
include("db_connect.php");
global $conn;

$data = json_decode(file_get_contents('php://input'), true);
$login = $data['requestParameters']['login'];
$password = $data['requestParameters']['password'];

$login = mysqli_real_escape_string($conn,htmlspecialchars($login)); 
$password = mysqli_real_escape_string($conn,htmlspecialchars($password));

if($login != "" && $password != "")
{
    $requete = "SELECT count(*) FROM utilisateurs where 
            login = '".$login."' and mdp = '".$password."' ";
    $exec_requete = mysqli_query($conn,$requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    if($count!=0) // nom d'utilisateur et mot de passe correctes
    {
        $requete_user = "SELECT id, poste FROM utilisateurs where 
        login = '".$login."' and mdp = '".$password."' ";
        $exec_requete_user = mysqli_query($conn,$requete_user);
        $reponse_user = mysqli_fetch_array($exec_requete_user);
        $response = array(
            'status_message' => 'Connexion réussi',
            'login' => $login,
            'role' => $reponse_user['poste'],
            'id' => $reponse_user['id']
        );
        // encodeJSON($response);
    }
    else
    {
        $response = array(
            'status_message' => 'Mot de passe ou Login incorrect',
            'status' => 400
        );
    }
}
else {
    $response = array(
        'status_message' => 'Mot de passe ou Login vide',
        'status' => 404
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