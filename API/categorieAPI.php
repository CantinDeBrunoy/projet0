<?php

//print_r($noms);
$json = array();
//$json = array(
	//"sucess" (verifie si sa c'est bien passé)
	//"message" (message en cas d'erreur)
	//"data" => array(contient les donné)
//);
foreach($categ as $name){
	array_push($json['categories'], array(
		"idCat" => $name['id'],
		"nomCat" => $name['nomC']
	)
	);
}
$json = json_encode($json);
file_put_contents('jsonCategorie.json', $json);
header('Content-Type: application/json');
echo $json;

?>