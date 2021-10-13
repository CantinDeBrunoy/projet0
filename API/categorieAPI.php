<?php

$json = array();

foreach($categ as $name){
	array_push($json, array(
		"idCat" => $name['id'],
		"nomCat" => $name['nomC']
	)
	);
}
$json = json_encode($json);
file_put_contents('jsonCategorie.json', $json);

?>