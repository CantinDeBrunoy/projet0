<h1> INFORMATIONS SUR LES API SERVICES </h1>

<h2>Services pour les commentaires</h2>
<p>
  <h3>Service qui recupère tous les commentaires selon l'état</h3>
  <b><i>commentaires_etat.php</i></b> :<br/>
  -> <b>GET</b> etat ('publie' ou 'signale')<br />
  -> <b>RETURN</b> idCom(int), auteurId(int), contenu(string), etat(string), dateC(date), recetteId(int)
</p>

<p>
  <h3>Service qui signale un commentaire selon l'ID</h3>
  <b><i>commentaire_signale_by_ID.php</i></b> :<br/>
  -> <b>GET</b> id du commentaire<br />
  -> <b>RETURN</b> status(int), status_message(string)
  <i>Set etat='signale' dans la bdd</i>
</p>

<p>
  <h3>Service qui supprime un commentaire selon l'ID</h3>
  <b><i>commentaire_supprime_by_ID.php</i></b> :<br/>
  -> <b>GET</b> id du commentaire<br />
  -> <b>RETURN</b> status(int), status_message(string)
</p>

<p>
  <h3>Service qui valide/publie un commentaire selon l'ID</h3>
  <b><i>commentaire_valide_by_ID.php</i></b> :<br/>
  -> <b>GET</b> id du commentaire<br />
  -> <b>RETURN</b> status(int), status_message(string)<br />
  <i>Set etat='publie' dans la bdd</i>
</p>

<p>
  <h3>Service qui récupère tout les commentaires selon l'ID d'une recette</h3>
  <b><i>commentaires_recetteID.php</i></b> :<br/>
  -> <b>GET</b> id de le recette (int)<br />
  -> <b>RETURN</b> idCom(int), auteurId(int), contenu(string), etat(string), dateC(date), recetteId(int)<br />
  <i>Récupère toutes les recettes, c'est-à-dire celles qui sont "en attente" et "publiées".</i>
</p>

<p>
  <h3>Service qui ajoute un commentaire</h3>
  <b><i>ajoutCommentaire.php</i></b> :<br/>
  -> <b>POST</b> json(auteurId(int), contenu(string), recetteId(int))<br />
  -> <b>RETURN</b> status(int), status_message(string)<br />
</p>

<h2>Services pour les recettes</h2>
<p>
  <h3>Service qui ajoute une recette</h3>
  <b><i>ajoutRecette.php</i></b> :<br/>
  -> <b>POST</b> json(auteurId(int), nom(string), ingredients(string), description(string), note(int : 0 à 10), categorieId(int), difficulte(string))<br />
  -> <b>RETURN</b> status(int), status_message(string)<br />
</p>

<p>
  <h3>Service qui recupère toutes les recettes en attente</h3>
  <b><i>recettes_attente.php</i></b> :<br/>
  -> <b>GET</b> void<br />
  -> <b>RETURN</b> id(int), auteurId(int), nom(string), ingredients(string), description(string), note(int), image(string), etat(string), categorieId(int), datePublication(date), nbCom(int), tps_prepa(timestamp), difficulte(string)<br />
</p>

<p>
  <h3>Service qui recupère toutes les recettes ou une recette selon l'ID</h3>
  <b><i>recettes_ID.php</i></b> :<br/>
  -> <b>GET</b> id(int) ou void<br />
  -> <b>RETURN</b> id(int), auteurId(int), nom(string), ingredients(string), description(string), note(int), image(string), etat(string), categorieId(int), nomCategorie(string) datePublication(date), nbCom(int), tps_prepa(timestamp), difficulte(string)<br />
</p>

<p>
  <h3>Service qui recupère 9 recettes aléatoirement</h3>
  <b><i>recettes_aleatoire.php</i></b> :<br/>
  -> <b>GET</b> void<br />
  -> <b>RETURN</b> id(int), auteurId(int), nom(string), ingredients(string), description(string), note(int), image(string), etat(string), categorieId(int), datePublication(date), nbCom(int), tps_prepa(timestamp), difficulte(string)<br />
</p>

<p>
  <h3>Service qui recupère toutes les recettes selon l'ID de la catégorie ou toutes les recettes</h3>
  <b><i>recettes_categorieID.php</i></b> :<br/>
  -> <b>GET</b> id(int) ou void<br />
  -> <b>RETURN</b> id(int), auteurId(int), nom(string), ingredients(string), description(string), note(int), image(string), etat(string), categorieId(int), datePublication(date), nbCom(int), tps_prepa(timestamp), difficulte(string)<br />
</p>

<p>
  <h3>Service qui supprime une recette selon l'ID</h3>
  <b><i>recetteSupprime.php</i></b> :<br/>
  -> <b>GET</b> id(int)<br />
  -> <b>RETURN</b> status(int), status_message(string)<br />
</p>

<p>
  <h3>Service qui publie une recette selon l'ID</h3>
  <b><i>recettePublie.php</i></b> :<br/>
  -> <b>GET</b> id(int)<br />
  -> <b>RETURN</b> status(int), status_message(string)<br />
</p>

<p>
  <h3>Service qui récupère 3 recettes qui ont une note supérieur à 7</h3>
  <b><i>recettes_tendance.php</i></b> :<br/>
  -> <b>GET</b> void<br />
  -> <b>RETURN</b> Données d'une recette x3<br />
</p>

<h2>Services pour les catégories</h2>
<p>
  <h3>Service qui recupère une catégorie selon l'ID</h3>
  <b><i>categories_ID.php</i></b> :<br/>
  -> <b>GET</b> id(int)<br />
  -> <b>RETURN</b> id(int), nomCategorie(string)<br />
</p>

<p>
  <h3>Service qui recupère les catégories qui ont au moins une recette</h3>
  <b><i>categories_utilisees.php</i></b> :<br/>
  -> <b>GET</b> void<br />
  -> <b>RETURN</b> nomCategorie(string), categorieId(int)<br />
</p>

<h2>Services pour les utilisateurs</h2>
<p>
  <h3>Service qui ajoute un utilisateur</h3>
  <b><i>ajoutUtilisateur.php</i></b> :<br/>
  -> <b>POST</b> json(login,mdp,nomU,prenom)<br />
  -> <b>RETURN</b> status(int), status_message(string)<br />
</p>

<p>
  <h3>Service qui récupère un utilisateur selon l'ID</h3>
  <b><i>utilisateurs_ID.php</i></b> :<br/>
  -> <b>GET</b> id(int)<br />
  -> <b>RETURN</b> id(int), login(string), mdp(string), nomU(string), prenom(string), poste(string), recetteNoteMoyenne(int), nbRecettePub(int)<br />
</p>

<p>
  <h3>Service qui récupère un utilisateur selon son login</h3>
  <b><i>ajoutUtilisateur.php</i></b> :<br/>
  -> <b>GET</b> login(string)<br />
  -> <b>RETURN</b> id(int), login(string), mdp(string), nomU(string), prenom(string), poste(string), recetteNoteMoyenne(int), nbRecettePub(int)<br />
</p>

<p>
  <h3>Service qui récupère un utilisateur selon son prénom</h3>
  <b><i>ajoutUtilisateur.php</i></b> :<br/>
  -> <b>GET</b> prenom(string)<br />
  -> <b>RETURN</b> id(int), login(string), mdp(string), nomU(string), prenom(string), poste(string), recetteNoteMoyenne(int), nbRecettePub(int)<br />
</p>

<h2>Services d'Inscription et de Connexion</h2>
<p>
  <h3>Service qui connecte un utilisateur</h3>
  <b><i>checkConnexion.php</i></b> :<br/>
  -> <b>POST</b> json(login(string),password(string))<br />
  -> <b>RETURN</b> status_message(string), login(string), role(string), id(string)<br />
</p>

<p>
  <h3>Service qui inscrit un utilisateur</h3>
  <b><i>checkInscription.php</i></b> :<br/>
  -> <b>POST</b> json(login(string), password(string), prenom(string), nom(string)<br />
  -> <b>RETURN</b> status_message(string), status(int)<br />
</p>
