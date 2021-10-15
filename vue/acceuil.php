<form enctype="multipart/form-data" method="post" action="index.php?uc=controleur&action=categories">
	<h1>Accueil</h1>
	<p>Regarde les informations des catégories selon leur ID</p>
	<SELECT name="categId" id="nomCateg">
		<option value=''>----</option>
		<?php foreach($categ as $name):?>
			<option><?php echo $name['id'];?></option>
		<?php endforeach;?>
	<div id = "Button">
		<input type = "submit" value = "Categories" name = "valider">
	</div>
</form>


<form enctype="multipart/form-data" method="post" action="index.php?uc=controleur&action=commentaires">
	<p>Rechercher des commentaires selon la recette sur laquel ils ont été publié</p>
	<SELECT name="commIdAut">
		<option value=''>----</option>
		<?php foreach($comm as $name):?>
			<option><?php echo $name['recetteId'];?> - <?php echo $name['nom'];?></option>
		<?php endforeach;?>
	<div id = "Button">
		<input type = "submit" value = "Commentaires" name = "valider">
	</div>
</form>


<form enctype="multipart/form-data" method="post" action="index.php?uc=controleur&action=recettes">
	<p>Rechercher des plats selon la catégorie</p>
	<SELECT name="nomRecette">
		<option value=''>----</option>
		<?php foreach($rece as $name):?>
			<option><?php echo $name['categorieId'];?> - <?php echo $name['nomC'];?></option>
		<?php endforeach;?>
	<div id = "Button">
		<input type = "submit" value = "Recettes" name = "valider">
	</div>
</form>


<form enctype="multipart/form-data" method="post" action="index.php?uc=controleur&action=utilisateurs">
	<p>Rechercher les informations des utilisateurs selon leur prenom</p>
	<SELECT name="prenomUili">
		<option value=''>----</option>
		<?php foreach($utili as $name):?>
			<option><?php echo $name['prenom'];?></option>
		<?php endforeach;?>
	<div id = "Button">
		<input type = "submit" value = "Utilisateurs" name = "valider">
	</div>
</form>

<form enctype="multipart/form-data" method="post" action="index.php?uc=controleur&action=connexion">
	<h3>Connexion</h3>
	<div id = "Button">
		<input type = "submit" value = "Connexion" name = "valider">
	</div>
</form>