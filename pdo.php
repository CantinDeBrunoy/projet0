<?php

class PdoProjet0
{
	private static $serveur='mysql:host=localhost';
	private static $bdd='dbname=projet0';
	private static $user='root';
	private static $mdp='';
	private static $monPdo;
	private static $monPdoProjet0 = null;
	
	/* La fonction __construct  */
	private function __construct()
	{
		
		PdoProjet0::$monPdo = new PDO(PdoProjet0::$serveur.';'.PdoProjet0::$bdd, PdoProjet0::$user, PdoProjet0::$mdp);
		PdoProjet0::$monPdo->query("SET CHARACTER SET utf8");
	}

	/* La fonction _destruction  */
	public function _destruction(){
		PdoProjet0::$monPdo = null;
	}

	//public PDO::prepare(string $query, array $options = []): PDOStatement|false

	/* La fonction getPdo  */
	public static function getPdo()
	{
		if(PdoProjet0::$monPdoProjet0 == null)
		{
			PdoProjet0::$monPdoProjet0 = new PdoProjet0();
		}
		return PdoProjet0::$monPdoProjet0;
	}
	
	public function getCategorie()
	{
		$req = "SELECT * FROM categories;";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

		public function getCategorieN($nom)
	{
		$req = "SELECT * FROM categories WHERE id = '$nom';";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getCommentairesTT()
	{
		$req = "SELECT * FROM commentaires;";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getCommentaires()
	{
		$req = "SELECT DISTINCT recetteId, nom FROM commentaires 
		INNER JOIN recettes ON commentaires.recetteId = recettes.id
		WHERE nbCom IS NOT NULL;";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getCommentairesA($id)
	{
		$req = "SELECT * FROM commentaires WHERE recetteId = '$id';";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getRecettes()
	{
		$req = "SELECT DISTINCT nomC, categorieId FROM categories 
		INNER JOIN recettes ON categories.id = recettes.categorieId;";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getRecettesTT()
	{
		$req = "SELECT * FROM recettes;";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getRecettesN($nom)
	{
		$req = "SELECT * FROM recettes WHERE categorieId = '$nom';";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getUtilisateurs()
	{
		$req = "SELECT * FROM utilisateurs;";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getUtilisateursPre($prenom)
	{
		$req = "SELECT * FROM utilisateurs WHERE prenom = '$prenom';";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getUtilisateursLog($login)
	{
		$req = "SELECT * FROM utilisateurs WHERE login = '$login';";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	/*-------------------------------------------------------------------------------------------------*/
	public function getNom($login)
	{
		$req = "SELECT nomU FROM utilisateurs 
		WHERE login = '$login';";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes['nomU'];
	}

	/* La fonction getPrenom permet de récuperer le prenom d'un membre du site */
	public function getPrenom($login)
	{
		$req = "SELECT prenom FROM utilisateurs 
		WHERE login = '$login';";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes['prenom'];
	}

	/* La fonction getMdp sert a récuperer le mot de passe pour permettre la connexion */
	public function getMdp($login)
	{
		$req = "SELECT mdp FROM utilisateurs 
		WHERE login = '$login';";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes['mdp'];
	}
	
	public function getPoste($login)
	{
		$req = "SELECT poste FROM utilisateurs 
		WHERE login = '$login';";
		$res = PdoProjet0::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes['poste'];
	}

	public function inscription($login,$mdp,$name,$prenom)
	{
		$req = "INSERT INTO `utilisateurs`(`login`, `mdp`, `nomU`, `prenom`, `poste`, `recetteNoteMoyenne`, `nbRecettePub`) VALUES ( '$login', '$mdp', '$name', '$prenom', 'visiteur', null, null)";
		$res = PdoProjet0::$monPdo->query($req);
	}
}
?>