<body>
<?php
require("pdo.php");
//include("vue/entete.php");

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

	//instentiation de la variable $pdo qui correspond a la connexion dans le dossier pdo
$pdo = PdoProjet0::getPdo();

switch($uc)
{
	//initialisation des liste dans la vue accueil
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

</body>