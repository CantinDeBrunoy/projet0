<?php
require("pdo.php");
//include("vue/entete.php");

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$pdo = PdoProjet0::getPdo();
switch($uc)
{
	case 'accueil':
		{
			$categ = $pdo -> getCategorie();
			$comm = $pdo -> getCommentaires();
			$rece = $pdo -> getRecettes();
			$utili = $pdo -> getUtilisateurs();
		    include("vue/acceuil.php");
		    break;
		}
	case 'controleur':
		{
			include("controleur.php");
		    break;
		}
}
//include("vue/piedpage.php");
?>