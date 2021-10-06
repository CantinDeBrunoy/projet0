<?php

$json = array();

foreach($utili as $name){
	array_push($json, array(
		"idUtil" => $name['id'],
		"loginUtil" => $name['login'],
		"mdpUtil" => $name['mdp'],
		"nomUtil" => $name['nomU'],
		"prenomUtil" => $name['prenom'],
		"roleUtil" => $name['poste'],
		"moyenneUtil" => $name['recetteNoteMoyenne'],
		"nbRecUtil" => $name['nbRecettePub']
	)
	);
}
$json = json_encode($json);
file_put_contents('jsonUtilisateurs.json', $json);

?>