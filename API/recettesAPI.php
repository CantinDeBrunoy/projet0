<?php

$json = array();

foreach($rece as $name){
	array_push($json, array(
		"idRec" => $name['id'],
		"auteurRec" => $name['auteurId'],
		"ingredientsRec" => $name['ingredients'],
		"descriptionRec" => $name['description'],
		"noteRec" => $name['note'],
		"imageRec" => $name['image'],
		"etatRec" => $name['etat'],
		"categorieRec" => $name['categorieId'],
		"dateRec" => $name['datePublication']
	)
	);
}
$json = json_encode($json);
file_put_contents('jsonRecettes.json', $json);

?>