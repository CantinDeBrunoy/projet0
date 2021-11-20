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
  <b><i>post_commentaire_signale_by_ID.php</i></b> :<br/>
  -> <b>GET</b> id du commentaire<br />
  -> <b>RETURN</b> status(int), status_message(string)
  <i>Set etat='signale' dans la bdd</i>
</p>

<p>
  <h3>Service qui supprime un commentaire selon l'ID</h3>
  <b><i>post_commentaire_supprime_by_ID.php</i></b> :<br/>
  -> <b>GET</b> id du commentaire<br />
  -> <b>RETURN</b> status(int), status_message(string)
</p>

<p>
  <h3>Service qui valide/publie un commentaire selon l'ID</h3>
  <b><i>post_commentaire_signale_by_ID.php</i></b> :<br/>
  -> <b>GET</b> id du commentaire<br />
  -> <b>RETURN</b> status(int), status_message(string)<br />
  <i>Set etat='publie' dans la bdd</i>
</p>

<h2>Services pour les recettes</h2>
<p>
  <h3>Service qui recupère toutes les recettes en attente</h3>
  <b><i>recettes_attente.php</i></b> :<br/>
  -> <b>GET</b> void<br />
  -> <b>RETURN</b> id(int), auteurId(int), nom(string), ingredients(string), description(string), note(int), image(string), etat(string), categorieId(int), datePublication(date), nbCom(int)<br />
</p>

<p>
  <h3>Service qui recupère toutes les recettes ou une recette selon l'ID</h3>
  <b><i>recettes_ID.php</i></b> :<br/>
  -> <b>GET</b> id(int) ou void<br />
  -> <b>RETURN</b> id(int), auteurId(int), nom(string), ingredients(string), description(string), note(int), image(string), etat(string), categorieId(int), datePublication(date), nbCom(int)<br />
</p>

<p>
  <h3>Service qui recupère une recette aléatoirement</h3>
  <b><i>recettes_aleatoire.php</i></b> :<br/>
  -> <b>GET</b> void<br />
  -> <b>RETURN</b> id(int), auteurId(int), nom(string), ingredients(string), description(string), note(int), image(string), etat(string), categorieId(int), datePublication(date), nbCom(int)<br />
  <i>Retourne bien une recette, ne pas faire attention au 's' du nom de fichier. Je ne sais pas pourquoi il a renommé le fichier comme ça</i>
</p>

<p>
  <h3>Service qui recupère toutes les recettes selon l'ID de la catégorie ou toutes les recettes</h3>
  <b><i>recettes_categorieID.php</i></b> :<br/>
  -> <b>GET</b> id(int) ou void<br />
  -> <b>RETURN</b> id(int), auteurId(int), nom(string), ingredients(string), description(string), note(int), image(string), etat(string), categorieId(int), datePublication(date), nbCom(int)<br />
</p>

<p>
  <h3>Service qui ajoute/publie une recette selon l'ID</h3>
  <b><i>recetteAjoute.php</i></b> :<br/>
  -> <b>GET</b> id(int)<br />
  -> <b>RETURN</b> void<br />
</p>

<p>
  <h3>Service qui supprime une recette selon l'ID</h3>
  <b><i>recetteSupprime.php</i></b> :<br/>
  -> <b>GET</b> id(int)<br />
  -> <b>RETURN</b> void<br />
</p>
