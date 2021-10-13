<?php

$json = array();
foreach($comm as $name){
	array_push($json, array(
		"idCom" => $name['idCom'],
		"auteurCom" => $name['auteurId'],
		"contenuCom" => $name['contenu'],
		"etatCom" => $name['etat'],
		"dateCom" => $name['date'],
		"recetteCom" => $name['recetteId']
	)
	);
}
$json = json_encode($json);
file_put_contents('jsonCommentaires.json', $json);

?>