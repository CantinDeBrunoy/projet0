<?php
if(!isset($_REQUEST['action']))
     $action = '';
else
	$action = $_REQUEST['action'];

	//les cases qui seront exécuté depende de l'action qui est donné dans les balises <form> dans les vue (dossier vue)
switch($action)
{
	//initialisation des listes dans la vue accueil
	case 'acceuil':
	{
		$categ = $pdo -> getCategorie();
		$comm = $pdo -> getCommentaires();
		$rece = $pdo -> getRecettes();
		$receID = $pdo -> getRecettesTT();
		$utili = $pdo -> getUtilisateurs();
		include("vue/acceuil.php");
		include("vue/btnConnexion.php");
		break;
	}
	
	//afficher de l'API des categories en fonction du choix de l'Id de la categorie (si choix de l'ID vide affiche l'API pour toutes les categories)
	case 'categories':
	{
		//reception de l'id de la categorie
		$categorie = $_REQUEST['categId'];
		if (!empty($categorie))
		{
			//lien ci dessous préétablie dans le fichier .htaccess ligne 2
			$categ= trim(file_get_contents("http://127.0.0.1/Projet0/API/categories/?id=".$categorie));
			$categ_data = json_decode($categ);
		}

		else 
		{
			//affichage de l'API pour toutes les catégorie
			$categ= file_get_contents("http://127.0.0.1/Projet0/API/categories/");
			$categ_data = json_decode($categ);
		}
		break;
	}

	//afficher de l'API des commentaires en fonction du choix du plat sur lequels ils ont été publié (si choix du plat vide affiche l'API pour toutes les commentaires)
	case 'commentaires':
	{
		//réception du l'ID et du nom du plat séléctionné
		$commentaire = $_REQUEST['commIdAut'];
		if (!empty($commentaire))
		{
			//décomposition de la variable $commentaire pour séparé l'id et le nom par un - (dans un tableau)
			$tabComm = explode("-", $commentaire);
			//choix de $tabComm[0] qui correspond a l'ID + supression des éspace (avec trim())
			$idComm = trim($tabComm[0]);
			//lien ci dessous préétablie dans le fichier .htaccess ligne 6
			$comm = file_get_contents("http://127.0.0.1/Projet0/API/commentaires/?id=".$idComm);
			$comm_data = json_decode($comm);
		}

		else 
		{
			//reception de l'API pour tous les commentaires
			$comm= file_get_contents("http://127.0.0.1/Projet0/API/commentaires/");
			$comm_data = json_decode($comm);
		}
		break;
	}

	//afficher de l'API des plats en fonction du choix de leur categorie (si choix de la catégorie vide affiche l'API pour toutes les plats)
	case 'recettes':
	{
		//réception du l'ID et du nom de la categorie sélectionné
		$recette = $_REQUEST['nomRecette'];
		if (!empty($recette))
		{
			//décomposition de la variable $commentaire pour séparé l'id et le nom par un - (dans un tableau)
			$rece = explode("-", $recette);
			//choix de $rece[0] qui correspond a l'ID + supression des éspace (avec trim())
			$idReceCatId = trim($rece[0]);
			//lien ci dessous préétablie dans le fichier .htaccess ligne 8
			$rece = file_get_contents("http://127.0.0.1/Projet0/API/recettes/?id=".$idReceCatId);
			$rece_data = json_decode($rece);
		}

		else
		{
			//reception de l'API pour tous les plats
			$rece= file_get_contents("http://127.0.0.1/Projet0/API/recettes/");
			$rece_data = json_decode($rece);
		}
		break;
	}
	
	case 'recettesID':
	{
		//réception du l'ID et du nom de la categorie sélectionné
		$recette = $_REQUEST['nomRecetteID'];
		if (!empty($recette))
		{
			//lien ci dessous préétablie dans le fichier .htaccess ligne 8
			$rece = file_get_contents("http://127.0.0.1/Projet0/API/recettesID/?id=".$recette);
			$rece_data = json_decode($rece);
		}

		else
		{
			//reception de l'API pour tous les plats
			$rece= file_get_contents("http://127.0.0.1/Projet0/API/recettesID/");
			$rece_data = json_decode($rece);
		}
		break;
	}

	case 'utilisateurs':
	{
		//réception du prenom de li'utilisateur sélectionné
		$utilisateur = $_REQUEST['prenomUili'];
		if (!empty($utilisateur))
		{
			//lien ci dessous préétablie dans le fichier .htaccess ligne 10
			$prenomUtili= trim(file_get_contents("http://127.0.0.1/Projet0/API/utilisateursP/?prenom='".$utilisateur."'"));
			$prenomUtili_data = json_decode($prenomUtili);
		}

		else 
		{
			//reception de l'API pour tous les utilisateurs
			$prenomUtili= file_get_contents("http://127.0.0.1/Projet0/API/utilisateursP/");
			$prenomUtili_data = json_decode($prenomUtili);
		}
		break;
	}

	case 'tendance':
	{
		$rece= file_get_contents("http://127.0.0.1/Projet0/API/recettesTendance/");
		$rece_data = json_decode($rece);
		var_dump($rece);
	
		break;
	}

	case 'aleatoire':
	{
		$rece= file_get_contents("http://127.0.0.1/Projet0/API/recettesAleatoire/");
		$rece_data = json_decode($rece);
		var_dump($rece);

		break;
	}

	case 'connexion':
	{
		include("vue/connexion.php");
		break;
	}

	case 'connecter':
	{
		//ouvre une session pour l'utilisateur courant et sa crée le cookie
		session_start();
		//recupération de toutes les informations de l'utilisateur entré ($_REQUEST['login'] corrspond au login entré dans le formulaire)
		$utili = $pdo -> getUtilisateursLog($_REQUEST['login']);
		include("API/API_Old/utilisateursAPI.php");

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

			foreach ($user_data as $key => $value) 
			{
				switch($key)
				{
					case 'idUtil':
					{ 
						$_SESSION['id'] = "{$value}";
					}
					case 'loginUtil':
					{ 
						$_SESSION['login'] = "{$value}";
					}
					case 'mdpUtil':
					{ 
						$_SESSION['mdp'] = "{$value}";
					}
					case 'nomUtil':
					{ 
						$_SESSION['nom'] = "{$value}";
					}
					case 'prenomUtil':
					{ 
						$_SESSION['prenom'] = "{$value}";
					}
					case 'roleUtil':
					{ 
						$_SESSION['poste'] = "{$value}";
					}
					case 'moyenneUtil':
					{ 
						$_SESSION['moyenne'] = "{$value}";
					}
					case 'nbRecUtil':
					{ 
						$_SESSION['nbRec'] = "{$value}";
					}
				}
			}
		}
	
		/* Si le mdp renseigner et différent de celui de la bdd on reste sur la page "connexion.php" */
		if($_REQUEST['mdp'] != $_SESSION['mdp'])
		{
			include("vue/connexion.php");
			echo 'erreur: mot de passe incorrect';
		}
	
		/* Si l'utilisateur se connecte */
		else
		{
			echo "vous estes connectez en tant que ",$_SESSION['login']," ",$_SESSION['nom']," ",$_SESSION['prenom'];
			include("vue/acceuil.php");
			include("vue/ajoutRecette.php");
			if($_SESSION['poste'] == 'admin')
			{
				include("vue/confirmeRecette.php");
			}
		}
		break;
	}

	case 'inscription':
	{
		//verification que tous les champs d'entré de sot pas vide
		if (empty($_REQUEST['loginI']) || empty($_REQUEST['mdpI']) || empty($_REQUEST['nom']) || empty($_REQUEST['prenom']))
		{
			?><a id="Error"><?php echo "Une information n'a pas été remplie";?><br></a><?php
			include("vue/connexion.php");
		}

		else 
		{
			//association des champs d'entré a des variables
			$loginI = $_REQUEST['loginI'];
			$mdpI = $_REQUEST['mdpI'];
			$name = $_REQUEST['nom'];
			$prenom = $_REQUEST['prenom'];
		
			//inserssion de l'utilisateur dans la BDD
			file_get_contents("http://127.0.0.1/Projet0/API/ajoutUtilisateur/?loginI=".$loginI."&mdpI=".$mdpI."&name=".$name."&prenom=".$prenom."");
			include("vue/membreAjouter.php");
		}
	
	break;
	}

	case 'ajoutRecette':
	{
		session_start();
		if(!isset($_SESSION['prenom']))
		{
			setcookie('PHPSESSID', null, -1, '/');
			header('location: http://localhost/Projet0/index.php?uc=controleur&action=connexion');
		}
		$rec = $pdo -> getRecettes();
		include("vue/ajouterRecette.php");
		break;
	}

	case 'confirmeAjoutRecette':
	{
		session_start();
		$nom = $_REQUEST['nomRec'];
		$Type = $_REQUEST['typeRec'];
		$type = explode("-", $Type);
		$typeRecette = trim($type[0]);
		$ing = $_REQUEST['ingredients'];
		switch($_REQUEST['nombreEtape']){
			case'2':
			{
				$desc = $_REQUEST['etape1']+$_REQUEST['etape2'];
				break;
			}
			case'3':
			{
				$desc = $_REQUEST['etape1']+$_REQUEST['etape2']+$_REQUEST['etape3'];
				break;
			}
			case'4':
			{
				$desc = $_REQUEST['etape1']+$_REQUEST['etape2']+$_REQUEST['etape3']+$_REQUEST['etape4'];
				break;
			}
			case'5':
			{
				$desc = $_REQUEST['etape1']+$_REQUEST['etape2']+$_REQUEST['etape3']+$_REQUEST['etape4']+$_REQUEST['etape5'];
				break;
			}
		}
		//$desc = $_REQUEST['description'];
		$tps = $_REQUEST['temps'];
		$diff = $_REQUEST['difficulte'];
		$idAuteur = $_SESSION['id'];
		
		$nomOrigine = $_FILES['nomIMG']['name'];
		$elementsChemin = pathinfo($nomOrigine);
		$extensionFichier = $elementsChemin['extension'];
		$extensionsAutorisees = array("jpeg", "jpg", "pdf");

		if (!(in_array($extensionFichier, $extensionsAutorisees))) 
		{
			?><a id="ErrorExt"><?php echo "Le fichier n'a pas l'extension attendue (jpeg/jpg/pdf)";?><br></a><?php
			$rec = $pdo -> getRecettes();
			include("vue/ajouterRecette.php");
		}

		else
		{    
			// Copie dans le repertoire du script avec un nom incluant l'heure a la seconde pres 
			$repertoireDestination = dirname(__FILE__)."/img";
			$nomDestination = "/fichier_du_".date("YmdHis").".".$extensionFichier;

			if (move_uploaded_file($_FILES["nomIMG"]["tmp_name"],$repertoireDestination.$nomDestination)) 
			{
				if (isset($_REQUEST['nomRec'])&&isset($_REQUEST['typeRec'])&&isset($_REQUEST['ingredients'])&&isset($_REQUEST['description']))
				{	
					$pieces = explode("/", $repertoireDestination);
					$repertoireDestination = $pieces[1];
					$lienIMG = $repertoireDestination.$nomDestination;
					//$pdo -> ajouterRecette($idAuteur,$lienIMG,$nom,$typeRecette,$ing,$desc,$tps,$diff);
					?><br><a id="Error"><?php echo 'L\'ajout de la recette à bien été réaliser';?></a><br><?php
					$categ = $pdo -> getCategorie();
					var_dump($desc);
					$comm = $pdo -> getCommentaires();
					$rece = $pdo -> getRecettes();
					$utili = $pdo -> getUtilisateurs();
					include("vue/acceuil.php");
					if ($_SESSION['poste'] == 'admin' ){
						include("vue/confirmeRecette.php");
					}
				}
			}
		}
	break;
	}
	
	case 'Administration':
	{
		session_start();
		if($_SESSION['poste'] != "admin")
		{
			setcookie('PHPSESSID', null, -1, '/');
			header('location: http://localhost/Projet0/index.php?uc=controleur&action=connexion');
		}
		$rece = $pdo -> getRecettesTTAtt();
		include("vue/administration.php");
	break;
	}

	case 'confirmeRece':
	{
		$id = $_REQUEST['id'];
		file_get_contents("http://127.0.0.1/Projet0/API/recetteAjoute/?id=".$id);
		?><br><a id="Succes"><?php echo 'La confirmation de la recette à bien été réaliser';?></a><br><?php
		include("vue/recetteAjoute.php");
	break;
	}

	case 'SupprRece'.$_REQUEST['id']:
	{
		$id = $_REQUEST['id'];
		file_get_contents("http://127.0.0.1/Projet0/API/recetteSupprime/?id=".$id);
		?><br><a id="Delete"><?php echo 'Le refus de la recette à bien été réaliser';?></a><br><?php
		include("vue/recetteAjoute.php");
	break;
	}	
}
?>