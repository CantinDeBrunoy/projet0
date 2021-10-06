<?php
if(!isset($_REQUEST['action']))
     $action = '';
else
	$action = $_REQUEST['action'];

switch($action)
{
	//sa sa devrait fonctionné
	//case 'category/$_REQUEST('id')':
	//{
		//$categ = $pdo -> getNom($_REQUEST('id'));
		//include("vue/test.php");
	//}
	case 'acceuil':
	{
		$categ = $pdo -> getCategorie();
		$comm = $pdo -> getCommentaires();
		$rece = $pdo -> getRecettes();
		$utili = $pdo -> getUtilisateurs();
		include("vue/acceuil.php");
		break;
	}
	
	case 'categories':
	{
		$categorie = $_REQUEST['nomCateg'];
		if (!empty($categorie)){
			$categ = $pdo -> getCategorieN($_REQUEST['nomCateg']);
			include("API/categorieAPI.php");
		}
		else {
			$categ = $pdo -> getCategorie();
			include("API/categorieAPI.php");
		}
		break;
	}

	case 'commentaires':
	{
		$commentaire = $_REQUEST['commIdAut'];
		if (!empty($commentaire)){
			$comm = $pdo -> getCommentairesA($_REQUEST['commIdAut']);
			include("API/commentairesAPI.php");
		}
		else {
			$comm = $pdo -> getCommentairesTT();
			include("API/commentairesAPI.php");
		}
		break;
	}

	case 'recettes':
	{
		$recette = $_REQUEST['nomRecette'];
		if (!empty($recette)){
			$rece = $pdo -> getRecettesN($_REQUEST['nomRecette']);
			include("API/recettesAPI.php");
		}
		else {
			$rece = $pdo -> getRecettesTT();
			include("API/recettesAPI.php");
		}
		break;
	}
	
	case 'utilisateurs':
	{
		$utilisateur = $_REQUEST['prenomUili'];
		if (!empty($utilisateur)){
			$utili = $pdo -> getUtilisateursPre($_REQUEST['prenomUili']);
			include("API/utilisateursAPI.php");
		}
		else {
			$utili = $pdo -> getUtilisateurs();
			include("API/utilisateursAPI.php");
		}
		break;
	}

	case 'connexion':
	{
		include("vue/connexion.php");
		break;
	}

	case 'connecter':
	{
		session_start();
		$utili = $pdo -> getUtilisateursLog($_REQUEST['login']);
		include("API/utilisateursAPI.php");

		/* On verifie si les champs ne sont pas vide */
		if(empty($_REQUEST['mdp']) || empty($_REQUEST['login']))
		{
			/* Si c'est le cas on reste sur la page "connexion.php" */
			include("vue/connexion.php");
			echo 'erreur: Veuillez remplir tout les champs';
		}
	
		else if (isset($_REQUEST['login']) && isset($_REQUEST['mdp']))
		{
			$api_url = 'jsonUtilisateurs.json';

			// Read JSON file
			$json_data = file_get_contents($api_url);

			// Decode JSON data into PHP array
			$response_data = json_decode($json_data,true);

			// All user data exists in 'data' object
			$user_data = $response_data[0];

			foreach ($user_data as $key => $value) {
				if($key == 'loginUtil') { 
					$_SESSION['login'] = "{$value}";
				}
				if($key == 'mdpUtil') { 
					$_SESSION['mdp'] = "{$value}";
				}
				if($key == 'nomUtil') { 
					$_SESSION['nom'] = "{$value}";
				}
				if($key == 'prenomUtil') { 
					$_SESSION['prenom'] = "{$value}";
				}
				if($key == 'roleUtil') { 
					$_SESSION['poste'] = "{$value}";
				}
				if($key == 'moyenneUtil') { 
					$_SESSION['moyenne'] = "{$value}";
				}
				if($key == 'nbRecUtil') { 
					$_SESSION['nbRec'] = "{$value}";
				}
			}
		}
	
		/* Si le mdp renseigner et différent de celui de la bdd on reste sur la page "connexion.php" */
		if($_REQUEST['mdp'] != $_SESSION['mdp'])
		{
			/* Si c'est le cas on reste sur la page "connexion.php" */
			include("vue/connexion.php");
			echo 'erreur: mot de passe incorrect';
		}
	
		/* Si l'utilisateur se connecte */
		else
		{
			echo "vous estes connectez en tant que ",$_SESSION['login']," ",$_SESSION['nom']," ",$_SESSION['prenom'];
			include("vue/acceuil.php");
		}
		break;
	}

	case 'inscription':
	{
		if (empty($_REQUEST['nom']) || empty($_REQUEST['prenom']) || empty($_REQUEST['loginI']) || empty($_REQUEST['mdpI']))
		{
			?><a id="Error"><?php echo "Une information n\'a pas été remplie";?><br></a><?php
			include("vue/connexion.php");
		}
		else {
			$name = $_REQUEST['name'];
			$loginI = $_REQUEST['loginI'];
			$prenom = $_REQUEST['prenom'];
			$mail = $_REQUEST['mail'];
			$numberI = $_REQUEST['numberI'];
			$mdpI = $_REQUEST['mdpI'];
		
			$pdo -> inscription($name,$prenom,$loginI,$mdpI,$numberI,$mail);
			//$_SESSION['nom'] = $pdo -> getNom($_REQUEST['loginI']);
			//$_SESSION['prenom'] = $pdo -> getPrenom($_REQUEST['loginI']);
			include("vue/membreAjouter.php");
		}
	
	break;
	}
}
?>